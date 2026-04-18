<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use Illuminate\Support\Facades\Auth; 

class GroupsController extends Controller
{

    // ✅ DASHBOARD DOSEN (WAJIB untuk Blade kamu)
    public function dashboard()
    {
        $groups = Groups::with('students')->get();

        return view('lecturer.dashboard', [
            'groups' => $groups,
            'user' => Auth::user()
        ]);
    }

    // menampilkan data
    public function index()
    {
        $groups = Groups::all();
        return view('groups.index', compact('groups'));
    }

    // form tambah
    public function create()
    {
        return view('groups.create');
    }

    // simpan data
    public function store(Request $request)
    {
        $request->validate([
            'periods' => 'required',
            'groups_names' => 'required',
            'villages' => 'required',
            'districts' => 'required',
            'regency' => 'required',
            'survising_lectures' => 'required'
        ]);

        Groups::create([
            'periods' => $request->periods,
            'groups_names' => $request->groups_names,
            'villages' => $request->villages,
            'districts' => $request->districts,
            'regency' => $request->regency,
            'survising_lectures' => $request->survising_lectures
        ]);

        return redirect()->route('groups.index')
            ->with('success', 'Data group berhasil ditambahkan');
    }

    // form edit
    public function edit($id)
    {
        $group = Groups::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'periods' => 'required',
            'groups_names' => 'required',
            'villages' => 'required',
            'districts' => 'required',
            'regency' => 'required',
            'survising_lectures' => 'required'
        ]);

        $group = Groups::findOrFail($id);

        $group->update([
            'periods' => $request->periods,
            'groups_names' => $request->groups_names,
            'villages' => $request->villages,
            'districts' => $request->districts,
            'regency' => $request->regency,
            'survising_lectures' => $request->survising_lectures
        ]);

        return redirect()->route('groups.index')
            ->with('success', 'Data group berhasil diupdate');
    }

    // hapus data
    public function destroy($id)
    {
        $group = Groups::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index')
            ->with('success', 'Data group berhasil dihapus');
    }
}
