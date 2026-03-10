<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegencyStoreRequest;
use App\Models\Regency;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RegencyController extends Controller
{
       public function index()

    {
        if (request()->ajax()) {
            $query = Regency::query();

            return DataTables::of($query)
            ->addColumn('is_active', function ($item) {
                    if ($item->is_active == 1) {
                        return '<span class="bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">
                        Aktif
                    </span>';
                    } else {
                        return '<span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">
                        Tidak Aktif
                    </span>';
                    }
                })
                ->addColumn('action', function ($item) {
                    return '
                    <a href="' . route('regency.show', $item->id) . '"
                        class="inline-block bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-1 px-2 rounded shadow-lg">
                        Detail
                    </a>
                    <a href="' . route('regency.edit', $item->id) . '"
                        class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded shadow-lg">
                        Edit
                    </a>
                    <form class="inline-block" action="' . route('regency.destroy', $item->id) . '" method="POST" onsubmit="return confirm(\'Yakin hapus data ini?\')">
                        ' . csrf_field() . method_field('delete') . '
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mx-3 rounded shadow-lg">
                            Hapus
                        </button>
                    </form>
                ';
                })
                ->rawColumns(['is_active','action'])
                ->make(true);
        }
        return view('regency.index');
    }

    public function create()
    {
        return view('regency.create');
    }

    public function store(RegencyStoreRequest $request)
    {
        $data = $request->validated();

        Regency::create($data);

        return redirect()->route('regency.index')->with('success','provinsi berhasi dibuat');
    }


}
