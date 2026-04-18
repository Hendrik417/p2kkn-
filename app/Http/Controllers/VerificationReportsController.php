<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class VerificationReportsController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Report::latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('file_name', fn($item) => $item->file_name)
                ->addColumn('tanggal_upload', function ($item) {
                    return date('d-m-Y', strtotime($item->tanggal_upload));
                })
                ->addColumn('jenis_laporan', fn($item) => $item->jenis_laporan)
                ->addColumn('status', function ($item) {
                    return match ($item->status) {
                        'Pending' => '<span class="bg-yellow-400 text-white px-2 py-1 rounded text-xs font-semibold">Pending</span>',
                        'Approved' => '<span class="bg-green-500 text-white px-2 py-1 rounded text-xs font-semibold">Approved</span>',
                        'Rejected' => '<span class="bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">Rejected</span>',
                        default => '<span class="bg-gray-500 text-white px-2 py-1 rounded text-xs font-semibold">Unknown</span>',
                    };
                })
                ->addColumn('catatan', fn($item) => $item->catatan ?? '-')
                ->addColumn('action', function ($item) {
                    if ($item->status !== 'Pending') {
                        return '<span class="text-gray-400 text-sm italic">Selesai</span>';
                    }

                    return '
                        <div class="flex gap-1 justify-center">
                            <a href="' . asset('storage/' . $item->file) . '" target="_blank"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-2 rounded text-xs transition">
                                Lihat
                            </a>
                            <button onclick="approve(' . $item->id . ')"
                                class="bg-green-500 hover:bg-green-600 text-white py-1 px-2 rounded text-xs transition">
                                Approve
                            </button>
                            <button onclick="reject(' . $item->id . ')"
                                class="bg-red-500 hover:bg-red-600 text-white py-1 px-2 rounded text-xs transition">
                                Reject
                            </button>
                        </div>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('verification.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_laporan' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'jenis_laporan' => 'required|string',
        ]);

        $userId = Auth::id();

        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Sesi login tidak ditemukan. Silakan login kembali.'
            ], 401);
        }

        try {
            if ($request->hasFile('file_laporan')) {
                $file = $request->file('file_laporan');
                $path = $file->store('reports', 'public');

                Report::create([
                    'user_id'        => $userId,
                    'file_name'      => $file->getClientOriginalName(),
                    'file'           => $path,
                    'tanggal_upload' => now(),
                    'jenis_laporan'  => $request->jenis_laporan,
                    'status'         => 'Pending',
                    'catatan'        => '-',
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Laporan berhasil dikirim.'
                ]);
            }

            return response()->json(['success' => false, 'message' => 'File tidak ditemukan.'], 400);

        } catch (\Exception $e) {
            // Debugging mode: Menampilkan error spesifik
            return response()->json([
                'success' => false,
                'message' => 'Detail Error: ' . $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }

    public function approve(Request $request, $id)
    {
        try {
            $report = Report::findOrFail($id);
            $report->update([
                'status' => 'Approved',
                'catatan' => $request->catatan ?? 'Disetujui oleh Admin',
            ]);

            return response()->json(['success' => true, 'message' => 'Laporan berhasil disetujui.']);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Detail Error: ' . $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required|string|min:3'
        ]);

        try {
            $report = Report::findOrFail($id);
            $report->update([
                'status' => 'Rejected',
                'catatan' => $request->catatan,
            ]);

            return response()->json(['success' => true, 'message' => 'Laporan berhasil ditolak.']);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Detail Error: ' . $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }
}
