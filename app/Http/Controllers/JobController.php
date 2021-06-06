<?php

namespace App\Http\Controllers;

use App\Models\Joblist;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Image;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs = Joblist::latest()->get();
        return view('interfaces.dashboard.job')->withJobs($jobs);
    }

    public function add()
    {
        $kecamatans = Kecamatan::all();
        return view('interfaces.dashboard.add-job')->withKecamatans($kecamatans);
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'image'  => 'mimes:jpg,png,jpeg|max:5000'
        ]);

        $fields = [
            'title'        => $request->title,
            'company'      => $request->company,
            'description'  => $request->description,
            'address'      => $request->address,
            'latitude'     => $request->latitude,
            'longitude'    => $request->longitude,
            'kecamatan_id' => $request->kecamatan_id,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $fields['image'] = $filename;
        }

        Joblist::create($fields);
        return redirect()->route('index.job')->with('success', 'Job berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jobs       = Joblist::find($id);
        $kecamatans = Kecamatan::all();

        return view('interfaces.dashboard.edit-job')
            ->withJobs($jobs)
            ->withKecamatans($kecamatans);
    }

    public function update(Request $request, $id)
    {
        $jobs = Joblist::find($id);

        // validate
        $this->validate($request, [
            'image'  => 'mimes:jpg,png,jpeg|max:5000'
        ]);

        $fields = [
            'title'        => $request->title,
            'company'      => $request->company,
            'description'  => $request->description,
            'address'      => $request->address,
            'latitude'     => $request->latitude,
            'longitude'    => $request->longitude,
            'kecamatan_id' => $request->kecamatan_id,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $fields['image'] = $filename;
        }

        $jobs->update($fields);
        return redirect()->route('index.job')->with('success', 'Job berhasil diubah');
    }

    public function destroy($id)
    {
        $jobs = Joblist::find($id);
        $jobs->delete();

        return redirect()->route('index.job')->with('success', 'Loker berhasil dihapus');
    }
}
