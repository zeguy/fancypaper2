<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poster;
use App\Tag;
use App\Sale;

class PosterController extends Controller
{
    /**
    * GET /posters/index
    */
    public function index(Request $request)
    {
        $user = $request->user();
        $tagsForCheckboxes = Tag::getForCheckboxes();
        
        if ($user) {
            $posters= $user->posters()->orderBy('title')->get();    
        } else {
            $posters = [];
        }

        return view('posters.index')->with([
            'posters' => $posters,
            'tagsForCheckboxes' => $tagsForCheckboxes
        ]);
    }

    /**
    * GET /posters/art
    */
    public function tagSort(Request $request, $tag)
    {
        $user = $request->user();
        $tagsForCheckboxes = Tag::getForCheckboxes();
        
        if ($tag == 'index')
        {
            $posters= $user->posters()->orderBy('title')->get();
        } else {
            $posters = Poster::whereHas('tags', function ($query) use ($tag)
            {
                $query->where('name', '=', $tag);
            })->get();
        }

        return view('posters.art')->with([
            'posters' => $posters,
            'tagsForCheckboxes' => $tagsForCheckboxes
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
        $tagsForCheckboxes = Tag::getForCheckboxes();
        return view('posters.create')->with([
            'tagsForCheckboxes' => $tagsForCheckboxes,
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
            'cost' => 'required|numeric',
            'image' => 'required|url',
            'notes' => 'string|nullable'
        ]);

        $title = $request->input('title');

        # Add new poster to the database
        $poster = new Poster();
        $poster->title = $request->input('title');
        $poster->artist = $request->input('artist');
        $poster->cost = $request->input('cost');
        $poster->image = $request->input('image');
        $poster->notes = $request->input('notes');
        $poster->user_id = $request->user()->id;
        $poster->save();

        return redirect('/posters/index')->with('alert', 'the poster '.$request->input('title').' was added.');
    }

    /**
    * PUT /posters/{id}
    */
    public function edit($id)
    {
        $poster = Poster::with('tags')->find($id);

        if (!$poster) {
            return redirect('/posters')->with('alert', 'Poster not found');
        }

        # Get all the possible tags so we can include them with checkboxes in the view
        $tagsForCheckboxes = Tag::getForCheckboxes();
    
        # Create a simple array of just the tag names for tags associated with this book;
        # will be used in the view to decide which tags should be checked off
        $tagsForThisPoster = [];
        foreach ($poster->tags as $tag) {
            $tagsForThisPoster[] = $tag->name;
        }
        # Results in an array like this: $tagsForThisBook => ['novel', 'fiction', 'classic'];        
        return view('posters.edit')
            ->with([
                'poster' => $poster,
                'tagsForCheckboxes' => $tagsForCheckboxes,
                'tagsForThisPoster' => $tagsForThisPoster,
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'artist' => 'required',
            'cost' => 'required',
            'image' => 'required',
        ]);

        $poster = Poster::find($id);       
        
        $poster->tags()->sync($request->input('tags'));

        $poster->title = $request->input('title');
        $poster->artist = $request->input('artist');
        $poster->cost = $request->input('cost');
        $poster->image = $request->input('image');
        $poster->save();

        return redirect('/posters/index');
    }

    /**
    *GET /posters/{id}/delete
    */
    public function delete($id)
    {
        $poster = Poster::find($id);

        if (!$poster) {
            return redirect('/posters/index')->with('alert', 'poster not found');
        }

        $poster->tags()->detach();

        return view('posters.delete')->with(['poster' => $poster]);
    }

    public function confirm(Request $request, $id)
    {
        $poster = Poster::find($id);
        $poster->delete();

        return redirect('/posters/index')->with('alert', 'Your poster was deleted.');
    }

    /**
    *GET /posters/{id}/sell
    */
    public function sell($id)
    {
        $poster = Poster::find($id);

        if (!$poster) {
            return redirect('/posters/index')->with('alert', 'poster not found');
        }

        return view('posters.sell')->with([
            'poster' => $poster
        ]);
        }

    public function sold(Request $request, $id) 
    {
        $poster = Poster::find($id);
        
        $this->validate($request, [
            'price' => 'required|min:0|numeric',
            'platform' => 'required'
        ]);

        #
        $sale = new Sale();
        $sale->title = $poster->title;
        $sale->artist = $poster->artist;
        $sale->cost = $poster->cost;
        $sale->notes = $poster->notes;
        
        if ($request->has('shipping')) {
			$sale->price = $request->input('price') - 25;
		} else {
			$sale->price = $request->input('price');
        }
        
		$sale->platform = $request->input('platform');
        
        if ($sale->platform == 'ebay') {
			$sale->profit = $sale->price - round(($poster->cost + 0.3)/0.871);
		} elseif ($sale->platform =='expresso') {
			$sale->profit = $sale->price - round(($poster->cost + 0.3)/0.971);
		} else {
			$sale->profit = $sale->cost - round(($poster->cost + 0.6)/0.942);
        }
        
        $sale->user_id = $request->user()->id;
        $sale->save();
        $poster->tags()->detach();
        $poster->delete();

        return redirect('/posters/sold')->with('alert', 'Your poster was deleted.');
    }

    /**
    * GET /posters/sold
    */
    public function record(Request $request)
    {
        $user = $request->user();
        
        if ($user) {
            $sales = $user->sales()->get();
        } else {
            $sales = [];
        }
        return view('posters.record')->with([
            'sales' => $sales
        ]);
    }

} 