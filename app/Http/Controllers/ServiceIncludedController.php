<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicesIncluded;

class ServiceIncludedController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
        ]);

        ServicesIncluded::create($request->all());

        return redirect()->back()->with('success', 'Service Included added successfully!');
    }

    public function destroy($id)
    {
        $included = ServicesIncluded::findOrFail($id);
        $included->delete();

        return redirect()->back()->with('success', 'Service Included deleted successfully!');
    }
}
