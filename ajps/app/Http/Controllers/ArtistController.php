<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $artists = Artist::with('pages')->get(); // ✅ kasama na agad yung artworks
    return view('partials.artist', compact('artists'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|unique:artists,email',
        ]);

        Artist::create($request->all());

        return redirect()->back()->with('success', 'Artist added successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);

        $request->validate([
            'fullname' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|unique:artists,email,' . $artist->id,
        ]);

        $artist->update($request->all());

        return redirect()->back()->with('success', 'Artist updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return redirect()->back()->with('success', 'Artist deleted successfully!');
    }
}
