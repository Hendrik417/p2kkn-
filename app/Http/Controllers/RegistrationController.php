<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran KKN.
     */
    public function index()
    {
        // Mengambil data user yang login
        $user = Auth::user();


        return view('registration', compact('user'));
    }

    /**
     * Menyimpan data pendaftaran mahasiswa ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'jk' => 'required|in:L,P',
            'fakultas' => 'required',
            'prodi' => 'required',
            'jenis_kkn' => 'required',
            'no_hp' => 'required|numeric',
            'surat_pernyataan' => 'required|file|mimes:pdf|max:2048',
            'khs' => 'required|file|mimes:pdf|max:2048',
        ]);

        // 2. Simpan Path File
        $pathSurat = null;
        $pathKhs = null;

        if ($request->hasFile('surat_pernyataan')) {
            $pathSurat = $request->file('surat_pernyataan')->store('pendaftaran/surat', 'public');
        }

        if ($request->hasFile('khs')) {
            $pathKhs = $request->file('khs')->store('pendaftaran/khs', 'public');
        }

        // 3. Redirect (Gunakan with success untuk notifikasi)
        return redirect()->route('student.dashboard')->with('success', 'Pendaftaran Anda berhasil dikirim!');
    }
}
