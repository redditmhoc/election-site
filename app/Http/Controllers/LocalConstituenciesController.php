<?php

namespace App\Http\Controllers;

use App\Models\Constituencies\LocalConstituency;

class LocalConstituenciesController extends Controller
{
    public function index()
    {
        $groups = LocalConstituency::all()->groupBy('region');
        return view('local-constituencies.index', [
            'groups' => $groups
        ]);
    }

    public function view(LocalConstituency $localConstituency)
    {
        return view('local-constituencies.view', [
            'constituency' => $localConstituency
        ]);
    }
}
