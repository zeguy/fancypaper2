<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poster;

class PosterController extends Controller
{
    public function index()
    {
        $posters = Poster::all();

        return view('posters.index')->with([
            'posters' => $posters
        ]);
    }

    /**
    * GET /posters/{$title}
    */
    public function show($id)
    {
        $poster = Poster::find($id);

        if (!$poster) {
            return redirect('/posters')->with('alert','poster not found');
        }
        
        return view('posters.show')->with([
            'poster' => $poster
        ]);
    }

    /**
    *
    */
    public function create()
    {
        return view('posters.create')->with([
            'title' => session('title')
        ]);
    }

    /**
    *
    */
    public function store(Request $request)
    {
        // $messages = [
        //     'required' => 'Don\'t forget the :attribute field',
        // ];

        $this->validate($request, [
            'title' => 'required|min:3',
            'artist' => 'required',
            'cost' => 'required',
            'image' => 'required',
        ]);

        $title = $request->input('title');

        # Add new poster to the database
        $poster = new Poster();
        $poster->title = $request->input('title');
        $poster->artist = $request->input('artist');
        $poster->variant = $request->input('variant');
        $poster->cost = $request->input('cost');
        $poster->image = $request->input('image');
        $poster->save();

        return redirect('/posters/index')->with('alert', 'the poster '.$request->input('title').' was added.');
    }

    public function edit($id)
    {
        $poster = Poster::find($id);

        if (!$poster) {
            return redirect('/posters')->with('alert', 'Poster not found');
        }

        return view('posters.edit')->with(['poster' => $poster]);
    }

    public function delete($id)
    {
        $poster = Poster::find($id);

        if (!$poster) {
            return redirect('/posters/index')->with('alert', 'Book not found');
        }

        return view('posters.delete')->with(['poster' => $poster]);
    }

    public function confirm(Request $request, $id)
    {
        $poster = Poster::find($id);
        $poster->delete();

        return redirect('/posters/index')->with('alert', 'Your book was deleted.');
    }
} 