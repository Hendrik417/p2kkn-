<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periods;

class PeriodsController extends Controller
{

    // menampilkan data
    public function index()
    {
        $periods = Periods::all();
        return view('periods.index', compact('periods'));
    }

    // form tambah
    public function create()
    {
        return view('periods.create');
    }

    // simpan data
    public function store(Request $request)
    {
        $request->validate([
            'periods' => 'required',
            'active_dates' => 'required',
            'status' => 'required'
        ]);

        Periods::create([
            'periods' => $request->periods,
            'active_dates' => $request->active_dates,
            'status' => $request->status
        ]);

        return redirect()->route('periods.index')
            ->with('success','Data period berhasil ditambahkan');
    }

    // form edit
    public function edit($id)
    {
        $period = Periods::findOrFail($id);
        return view('periods.edit', compact('period'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'periods' => 'required',
            'active_dates' => 'required',
            'status' => 'required'
        ]);

        $period = Periods::findOrFail($id);

        $period->update([
            'periods' => $request->periods,
            'active_dates' => $request->active_dates,
            'status' => $request->status
        ]);

        return redirect()->route('periods.index')
            ->with('success','Data period berhasil diupdate');
    }

    // hapus data
    public function destroy($id)
    {
        $period = Periods::findOrFail($id);
        $period->delete();

        return redirect()->route('periods.index')
            ->with('success','Data period berhasil dihapus');
    }

}
