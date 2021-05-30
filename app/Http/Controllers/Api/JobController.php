<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Joblist;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Joblist::select('id', 'company', 'title', 'latitude', 'longitude')->get();

        return response()->json($jobs);
    }

    public function jobDetail($id)
    {
        $jobs = Joblist::select('id', 'company', 'latitude', 'longitude')
        ->where('id', $id)
        ->get();

        return response()->json($jobs);

    }
}
