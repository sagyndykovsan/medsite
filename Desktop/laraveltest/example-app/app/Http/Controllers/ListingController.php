<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    // Show all listings
    public function index(Request $request) {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(8)
        ]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create() {
        return view('listings.create');
    }

    // Store Listing Data   
    public function store(Request $request) {

        $validated = $request->validate([
            'company' => 'required|unique:listings,company',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $validated['user_id'] = auth()->id();

        Listing::create($validated);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing) {
        $validated = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        // Check if User is owner
        if (auth()->id() != $listing->user->id) {
            return abort(403, 'Unauthorized action');
        }

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($validated);

        return back()->with('message', 'Listing updated successfully!');
    }

    public function delete(Listing $listing) {

        // Check if User is owner
        if (auth()->id() != $listing->user->id) {
            return abort(403, 'Unauthorized action');
        }
        
        $listing->delete();

        return redirect('')->with('message', 'Listing delete successfully!');
    }

    public function download() {
        return view('download');
    }

    public function upload(Request $request) {
        $request->lec->store('lection');

        return back()->with('message', 'Файл загружен');
    }

    public function manage() {
        Listing::where('name', 'John');

        $l = Listing::all(3)->where('name', 's');

        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }
}
