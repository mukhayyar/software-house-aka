<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with('user');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('price')) {
            $price = (int) $request->price;
            $query->where('price', '<=', $price);
        }

        $services = $query->paginate(6);
        $categories = Category::all(); // Assuming Category model is used

        return view('services.index', compact('services', 'categories'));
    }

    public function show($id)
    {
        $service = Service::with('faqs', 'servicesIncluded', 'user')->findOrFail($id);

        return view('services.details', compact('service'));
    }
}
