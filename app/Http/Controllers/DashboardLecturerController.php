<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardLecturerController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        // Mengirim data user ke view
        return view('dashboardlecturer', compact('user'));
    }
}
