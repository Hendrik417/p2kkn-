<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentsController extends Controller
{

    public function index()
    {
        if(request()->ajax()){

            $query = Students::query();

            return DataTables::of($query)

                ->addColumn('status', function($item){

                    return $item->status == 1
                    ? '<span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Aktif</span>'
                    : '<span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Tidak Aktif</span>';

                })

                ->addColumn('action', function($item){

                    return '
                        <a href="'.route('student.show',$item->id_students).'" class="bg-cyan-500 text-white px-2 py-1 rounded text-xs">Detail</a>

                        <a href="'.route('student.edit',$item->id_students).'" class="bg-gray-500 text-white px-2 py-1 rounded text-xs">Edit</a>

                        <form action="'.route('student.destroy',$item->id_students).'" method="POST" class="inline-block">
                            '.csrf_field().method_field('delete').'
                            <button onclick="return confirm(\'Yakin hapus?\')" class="bg-red-500 text-white px-2 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>

                    ';

                })

                ->rawColumns(['status','action'])
                ->make(true);
        }

        return view('student.index');
    }


    public function create()
    {
        return view('student.create');
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'groups' => 'required',
            'faculties' => 'required',
            'bacth' => 'required',
            'locations' => 'required',
            'status' => 'required'
        ]);

        Students::create($data);

        return redirect()
            ->route('student')
            ->with('success','Student berhasil dibuat');
    }


    public function show($id)
    {
        $student = Students::findOrFail($id);

        return view('student.show',compact('student'));
    }


    public function edit($id)
    {
        $student = Students::findOrFail($id);

        return view('student.edit',compact('student'));
    }


    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'groups' => 'required',
            'faculties' => 'required',
            'bacth' => 'required',
            'locations' => 'required',
            'status' => 'required'
        ]);

        $student = Students::findOrFail($id);

        $student->update($data);

        return redirect()
            ->route('students')
            ->with('success','Student berhasil diupdate');
    }


    public function destroy($id)
    {

        $student = Students::findOrFail($id);

        $student->delete();

        return redirect()
            ->route('student')
            ->with('success','Student berhasil dihapus');
    }

}
