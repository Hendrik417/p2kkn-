<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardStudentController extends Controller
{
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Mengirim data user ke view
        return view('dashboardstudent', compact('user'));
    }
}
