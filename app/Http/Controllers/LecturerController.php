<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LecturerController extends Controller
{

    public function index()
    {
        if(request()->ajax()){

            $query = Lecturer::query();

            return DataTables::of($query)

                ->addColumn('action', function($item){

                    return '
                        <a href="'.route('lecturer.show',$item->id_lecturer).'" class="bg-cyan-500 text-white px-2 py-1 rounded text-xs">Detail</a>

                        <a href="'.route('lecturer.edit',$item->id_lecturer).'" class="bg-gray-500 text-white px-2 py-1 rounded text-xs">Edit</a>

                        <form action="'.route('lecturer.destroy',$item->id_lecturer).'" method="POST" class="inline-block">
                            '.csrf_field().method_field('delete').'
                            <button onclick="return confirm(\'Yakin hapus?\')" class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>

                    ';

                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('lecturer.index');
    }


    public function create()
    {
        return view('lecturer.create');
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'groups' => 'required',
            'faculties' => 'required',
            'study_programs' => 'required',
            'number_of_groups' => 'required',
            'locations' => 'required'
        ]);

        Lecturer::create($data);

        return redirect()
            ->route('lecturer.index')
            ->with('success','Lecturer berhasil dibuat');
    }


    public function show($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        return view('lecturer.show',compact('lecturer'));
    }


    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        return view('lecturer.edit',compact('lecturer'));
    }


    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'groups' => 'required',
            'faculties' => 'required',
            'study_programs' => 'required',
            'number_of_groups' => 'required',
            'locations' => 'required'
        ]);

        $lecturer = Lecturer::findOrFail($id);

        $lecturer->update($data);

        return redirect()
            ->route('lecturer.index')
            ->with('success','Lecturer berhasil diupdate');
    }


    public function destroy($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $lecturer->delete();

        return redirect()
            ->route('lecturer.index')
            ->with('success','Lecturer berhasil dihapus');
    }

}
