<?php

namespace App\Http\Controllers;

use App\Models\Joblist;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $jobs       = Joblist::all();
        $kecamatans = Kecamatan::orderBy('nama_kecamatan', 'asc')->get();
        return view('welcome')
            ->withjobs($jobs)
            ->withKecamatans($kecamatans);
    }

    public function jobDetail($id)
    {
        $jobs = Joblist::find($id);
        return view('interfaces.detail.index')->withJobs($jobs);
    }
}
