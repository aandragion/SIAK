<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $count_mhs =Mahasiswa::where('status', 'Aktif')
        ->count('id_mhs');
        return view('admin.dashboard', compact("count_mhs"));
    }
}
