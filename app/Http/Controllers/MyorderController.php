<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyorderController extends Controller
{
    public function index()
    {
        return view('myOrder.index');
    }
}
