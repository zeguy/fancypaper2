<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posters() {
        return $this->belongsToMany('App\Poster')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $tags = Tag::orderBy('name')->get();
    
        $tagsForCheckboxes = [];
    
        foreach ($tags as $tag) {
            $tagsForCheckboxes[$tag['id']] = $tag->name;
        }
    
        return $tagsForCheckboxes;
    }
}
