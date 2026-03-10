<?php

namespace App\Http\Controllers;

use App\Models\Gallery; // Pastikan model Gallery sudah ada
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Gallery::query();

            return DataTables::of($query)
                // Menampilkan Foto
                ->addColumn('picture', function ($item) {
                    if ($item->picture) {
                        return '<img src="' . asset('storage/' . $item->picture) . '" width="70" class="rounded shadow-sm">';
                    }
                    return '<span class="text-gray-400 italic">No Image</span>';
                })

                // Menampilkan Badge Status
                ->addColumn('status', function ($item) {
                    if ($item->status == 'publish') {
                        return '<span class="bg-green-500 text-white px-2 py-1 text-xs rounded shadow-sm">Publish</span>';
                    }
                    return '<span class="bg-gray-500 text-white px-2 py-1 text-xs rounded shadow-sm">Draft</span>';
                })

                // Menampilkan Tombol Aksi (Detail, Edit, Hapus)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="flex items-center">
                        <a href="' . route('gallery.show', $item->id_gallery) . '"
                            class="inline-block bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-1 px-2 rounded shadow-lg mr-1">
                            Detail
                        </a>
                        <a href="' . route('gallery.edit', $item->id_gallery) . '"
                            class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded shadow-lg mr-1">
                            Edit
                        </a>
                        <form class="inline-block" action="' . route('gallery.destroy', $item->id_gallery) . '" method="POST" onsubmit="return confirm(\'Yakin hapus data ini?\')">
                            ' . csrf_field() . method_field('delete') . '
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded shadow-lg">
                                Hapus
                            </button>
                        </form>
                    </div>
                    ';
                })
                // Izinkan kolom picture, status, dan action merender HTML
                ->rawColumns(['picture', 'status', 'action'])
                ->make(true);
        }

        return view('gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logika simpan data gallery di sini
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Gallery::findOrFail($id);
        return view('gallery.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Gallery::findOrFail($id);
        return view('gallery.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Logika update data gallery di sini
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery.index')->with('success', 'Data berhasil dihapus');
    }
}
