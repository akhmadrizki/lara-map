<?php

namespace App\Http\Controllers;

use App\Models\Joblist;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $jobs = Joblist::all();
        return view('welcome')->withjobs($jobs);
    }

    public function jobDetail($id)
    {
        $jobs = Joblist::find($id);
        return view('interfaces.detail.index')->withJobs($jobs);
    }
}
