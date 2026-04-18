<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VelueController extends Controller
{
    public function index()
    {
        // Data dummy (nanti bisa ambil dari database)
        $data = [
            'nama'       => 'HENDRIK',
            'nim'        => 'D0220417',
            'semester'   => '12',
            'kode_mk'    => 'USB1444',
            'matakuliah' => 'Kuliah Kerja Nyata',
            'nilai'      => 'A',
        ];

        return view('velue.index', compact('data'));
    }
}
