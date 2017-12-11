<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosterTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poster_tag', function (Blueprint $table) {
    
            $table->increments('id');
            $table->timestamps();
    
            # `poster_id` and `tag_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `poster_id` will reference the `books table` and `tag_id` will reference the `tags` table.
            $table->integer('poster_id')->unsigned();
            $table->integer('tag_id')->unsigned();
    
            # Make foreign keys
            $table->foreign('poster_id')->references('id')->on('posters');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('poster_tag');
    }
}
