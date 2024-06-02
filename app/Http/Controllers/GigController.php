<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Service as Gig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GigController extends Controller
{
    public function index()
    {
        $gigs = Gig::where('seller_id', Auth::id())->paginate(6);
        $categories = Category::all();

        return view('gigs.index', compact('gigs', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required',
            'price' => 'required|numeric|min:200000|max:150000000',
            'time_delivery' => 'nullable|numeric|min:1|max:365',
            'revision_time' => 'nullable|numeric|min:0|max:10',
            'image' => 'nullable|image|max:2048',
        ]);

        $gig = new Gig();
        $gig->title = $request->title;
        $gig->description = $request->description;
        $gig->category_id = $request->category;
        $gig->price = $request->price;
        $gig->time_delivery = $request->time_delivery;
        $gig->revision_time = $request->revision_time;
        $gig->seller_id = Auth::id();
        if ($request->hasFile('image')) {
            $file = request('image');
            $filename = $file->getClientOriginalName();

            $file->storeAs('thumbnail/'. Auth::id(), $filename, 's3');
           
            $gig->thumbnail = $filename;
        }

        $gig->save();

        return redirect()->route('gigs.index')->with('success', 'Gig posted successfully!');
    }

    public function edit($id) {
        $gig = Gig::findOrFail($id);
        $categories = Category::all();

        return view('gigs.edit', compact('gig', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:200000|max:150000000',
            'time_delivery' => 'required|numeric|min:1',
            'revision_time' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $gig = Gig::findOrFail($id);
        $gig->title = $request->title;
        $gig->description = $request->description;
        $gig->category_id = $request->category;
        $gig->price = $request->price;
        $gig->time_delivery = $request->time_delivery;
        $gig->revision_time = $request->revision_time;

        if ($request->hasFile('image')) {
            if ($gig->image_url) {
                Storage::disk('s3')->delete($gig->image_url);
            }
            $file = request('image');
            $filename = $file->getClientOriginalName();

            $file->storeAs('thumbnail/'. Auth::id(), $filename, 's3');
           
            $gig->thumbnail = $filename;
        }

        $gig->save();

        return redirect()->route('services.show', $id)->with('success', 'Service updated successfully!');
    }

    public function destroy($id)
    {
        $service = Gig::findOrFail($id);
        if ($service->image_url) {
            Storage::disk('s3')->delete($service->image_url);
        }
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
