<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\KknScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KknScoreController extends Controller
{
    public function create()
    {
        $students = Students::all();

        return view('dosen.nilai-create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'disiplin' => 'required|integer|min:0|max:100',
            'kerjasama' => 'required|integer|min:0|max:100',
            'inisiatif' => 'required|integer|min:0|max:100',
            'laporan' => 'required|integer|min:0|max:100',
        ]);

        $total = (
            $request->disiplin +
            $request->kerjasama +
            $request->inisiatif +
            $request->laporan
        ) / 4;

        KknScore::updateOrCreate(
            ['student_id' => $request->student_id],
            [
                'lecturer_id' => Auth::id(),
                'disiplin' => $request->disiplin,
                'kerjasama' => $request->kerjasama,
                'inisiatif' => $request->inisiatif,
                'laporan' => $request->laporan,
                'total_score' => $total,
            ]
        );

        return redirect()->back()->with('success', 'Nilai berhasil disimpan');
    }
}
