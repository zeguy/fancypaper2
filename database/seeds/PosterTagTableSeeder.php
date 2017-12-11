<?php

use Illuminate\Database\Seeder;
use App\Poster;
use App\Tag;

class PosterTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    # First, create an array of all the books we want to associate tags with
    # The *key* will be the book title, and the *value* will be an array of tags.
    # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
    $posters =[
        'Alien' => ['collection', 'film'],
        'Psycho' => ['collection', 'film'],
        'Rear Window' => ['collection', 'film'],
        'The Birds' => ['collection', 'film'],
        'Thin Red Line' => ['inventory', 'film'],
        'Liberte, Egalite, Fraternite' => ['inventory', 'art'],

    ];

    # Now loop through the above array, creating a new pivot for each book to tag
    foreach ($posters as $title => $tags) {

        # First get the book
        $poster = Poster::where('title', 'like', $title)->first();

        # Now loop through each tag for this book, adding the pivot
        foreach ($tags as $tagName) {
            $tag = Tag::where('name', 'LIKE', $tagName)->first();

            # Connect this tag to this book
            $poster->tags()->save($tag);
        }
    }
    }
}
