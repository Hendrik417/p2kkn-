<?php

// app/Http/Controllers/LaporanController.php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReportsController extends Controller
{
    public function index()
{
    $laporans = Report::where('nim', Auth::user()->username)
        ->latest()
        ->get();

    return view('report.index', compact('laporans'));
}

   public function store(Request $request)
{
    $request->validate([
        'file_name'      => 'required|string|max:255',
        'jenis_laporan'  => 'required|string',
        'tanggal_upload' => 'required|date',
        'file'           => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);
// dd($request->hasFile('file'));
if ($request->hasFile('file')) {
    $file = $request->file('file');
    $filename = time().'_'.$file->getClientOriginalName();

    // Gunakan disk 'public' secara eksplisit
    // Ini akan menyimpan file di: storage/app/public/laporans/
    $path = $file->storeAs('laporans', $filename, 'public');

    // DEBUG: Cek apakah file benar-benar ada segera setelah disimpan
    if (Storage::disk('public')->exists('laporans/' . $filename)) {
        $fullPath = storage_path('app/public/laporans/' . $filename);
        // dump("File TERDETEKSI ada di: " . $fullPath);
    }

     Report::create([
            'nama_file'      => $request->file_name,
            'nim'            => Auth::user()->username, // FIX
            'jenis_laporan'  => $request->jenis_laporan,
            'tanggal_upload' => $request->tanggal_upload,
            'file_path'      => $filename,
            'status'         => 'Pending',
        ]);

return back()->with('error', 'File gagal diupload!');
}}

    public function destroy($id)
{
    $laporan = Report::findOrFail($id);
    $filePath = 'laporans/'. $laporan->file_path;
    // dd(Storage::disk($file_path));
    // dd((Storage::exists($file_path)));

   if (Storage::disk('public')->exists($filePath)) {
        Storage::disk('public')->delete($filePath);
    }
    $laporan->delete();

    return redirect()->back()->with('success', 'Laporan berhasil dihapus!');
}
}
