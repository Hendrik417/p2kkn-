<?php

namespace App\Http\Controllers;

use App\Http\Requests\VillageStoreRequest;
use App\Http\Requests\VillageUpdateRequest;
use App\Models\Village;
use App\Models\District;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class VillageController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $query = Village::with('district');

            return DataTables::of($query)
                ->addColumn('district_name', function ($item) {
                    return $item->district->name ?? '-';
                })
                ->addColumn('type', function ($item) {
                    return $item->type;
                })
                ->addColumn('is_active', function ($item) {
                    return $item->is_active
                        ? '<span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Aktif</span>'
                        : '<span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Tidak Aktif</span>';
                })
                ->addColumn('action', function ($item) {
                    return '
                        <a href="'.route('village.show',$item->id).'" class="bg-cyan-500 text-white px-2 py-1 rounded text-xs">Detail</a>
                        <a href="'.route('village.edit',$item->id).'" class="bg-gray-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                        <form action="'.route('village.destroy',$item->id).'" method="POST" class="inline-block">
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

        return view('village.index');
    }

   public function create()
{
    $districts = District::where('is_active',1)
                    ->pluck('name','id');

    return view('village.create',[
        'districts' => $districts
    ]);
}

    public function store(VillageStoreRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        Village::create($data);

        return redirect()
            ->route('village.index')
            ->with('success','Village berhasil dibuat');
    }

    public function show(Village $village)
    {
        return view('village.show', compact('village'));
    }

    public function edit(Village $village)
    {
        $districts = District::where('is_active',1)->get();

        return view('village.edit', compact('village','districts'));
    }

    public function update(VillageUpdateRequest $request, Village $village)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        $village->update($data);

        return redirect()
            ->route('village.index')
            ->with('success','Village berhasil diupdate');
    }

    public function destroy(Village $village)
    {
        $village->delete();

        return redirect()
            ->route('village.index')
            ->with('success','Village berhasil dihapus');
    }
}
