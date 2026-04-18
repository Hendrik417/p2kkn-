<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Groups;
use App\Models\Report;

class ViewReportController extends Controller

{
    public function index()
    {
        $student = Auth::user();

        // Ambil kelompok mahasiswa
        $groups = Groups::with(['village', 'district', 'regency', 'period'])
            ->find($student->group_id);

        // Ambil laporan mahasiswa
        $laporans = Report::where('nim', $student->username)
            ->latest()
            ->get();

        return view('viewreport', compact('groups', 'laporans'));
    }
}

