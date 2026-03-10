<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictStoreRequest;
use App\Http\Requests\DistrictUpdateRequest;
use App\Models\District;
use App\Models\Regency;
use Yajra\DataTables\Facades\DataTables;

class DistrictController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $query = District::with('regency');

            return DataTables::of($query)
                ->addColumn('regency_name', function ($item) {
                    return $item->regency->regency_name ?? '-';
                })
                ->addColumn('is_active', function ($item) {
                    return $item->is_active
                        ? '<span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Aktif</span>'
                        : '<span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Tidak Aktif</span>';
                })
                ->addColumn('action', function ($item) {
                    return '
                        <a href="'.route('district.show',$item->id).'" class="bg-cyan-500 text-white px-2 py-1 rounded text-xs">Detail</a>
                        <a href="'.route('district.edit',$item->id).'" class="bg-gray-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                        <form action="'.route('district.destroy',$item->id).'" method="POST" class="inline-block">
                            '.csrf_field().method_field('delete').'
                            <button onclick="return confirm(\'Yakin hapus?\')" class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    ';
                })
                ->rawColumns(['is_active','action'])
                ->make(true);
        }

        return view('district.index');
    }

    public function create()
    {
        $regencies = Regency::pluck('regency_name', 'id');

        return view(
            'district.create',
            [
                'regencies' => $regencies,
            ]
        );
    }

    public function store(DistrictStoreRequest $request)
    {
        $data = $request->validated();

        $data['type'] = 'Kecamatan';

        District::create($data);

        return redirect()
            ->route('district.index')
            ->with('success','District berhasil dibuat');
    }

    public function show(District $district)
    {
        return view('district.show', compact('district'));
    }

    public function edit(District $district)
    {
        $regencies = Regency::where('is_active',1)->get();
        return view('district.edit', compact('district','regencies'));
    }

    public function update(DistrictUpdateRequest $request, District $district)
    {
        $data = $request->validated();

        $district->update($data);

        return redirect()
            ->route('district.index')
            ->with('success','District berhasil diupdate');
    }

    public function destroy(District $district)
    {
        $district->delete();

        return redirect()
            ->route('district.index')
            ->with('success','District berhasil dihapus');
    }
}
