<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kecamatans = Kecamatan::orderBy('nama_kecamatan', 'asc')->get();
        return view('interfaces.dashboard.index')
            ->withKecamatans($kecamatans);
    }
}
