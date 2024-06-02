<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::take(4)->get(); // Assuming Category model is used
        
        return view('index', compact('categories'));
    }

    public function about() {
        return view('front.about');
    }

    public function project() {
        return view('front.project');
    }

    public function service() {
        return view('front.service');
    }

    public function contact() {
        return view('front.contact');
    }

}
