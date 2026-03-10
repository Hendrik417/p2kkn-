<?php

namespace App\Http\Controllers;

use App\Models\Infographis; // Pastikan nama model sesuai
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InfographisController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Infographis::query();

            return DataTables::of($query)
                // ID Column (Sesuai data: 'id_infographis' di JS)
                ->addColumn('id_infographis', function ($item) {
                    return $item->id; // atau $item->id_infographis jika di DB namanya itu
                })
                // Gambar
                ->addColumn('picture', function ($item) {
                    if ($item->picture) {
                        return '<img src="' . asset('storage/' . $item->picture) . '" width="70" class="rounded">';
                    }
                    return '-';
                })
                // Status Badge
                ->addColumn('status', function ($item) {
                    if ($item->status == 'publish') {
                        return '<span class="bg-green-500 text-white px-2 py-1 text-xs rounded">Publish</span>';
                    }
                    return '<span class="bg-gray-500 text-white px-2 py-1 text-xs rounded">Draft</span>';
                })
                // Action Buttons
                ->addColumn('action', function ($item) {
                    return '
                    <div class="flex space-x-2">
                        <a href="' . route('infographis.edit', $item->id) . '" class="bg-gray-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                        <form action="' . route('infographis.destroy', $item->id) . '" method="POST" onsubmit="return confirm(\'Yakin hapus?\')">
                            ' . csrf_field() . method_field('delete') . '
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Hapus</button>
                        </form>
                    </div>';
                })
                ->rawColumns(['picture', 'status', 'action'])
                ->make(true);
        }

        return view('infographis.index'); // Pastikan file ini ada!
    }

    public function create()
    {
        // Supaya tidak error baris 70 (Screenshot kamu), buat file ini:
        // resources/views/infographis/create.blade.php
        return view('infographis.create');
    }
}
