<?php

namespace App\Http\Controllers;

class AdController extends Controller
{
    public function index()
    {
        return view('ads.index');
    }

    public function single()
    {
        return view('ads.single');
    }
}
