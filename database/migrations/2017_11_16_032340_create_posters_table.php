<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posters', function (Blueprint $table) {
		    # Increments method will make a Primary, Auto-Incrementing field.
		    # Most tables start off this way
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
		    # keep track of changes to a row
            $table->timestamps();
            
            #my fields
            $table->string('title');
            $table->string('artist');
            $table->float('cost', 8 , 2);
            $table->string('image');
            $table->string('notes')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posters');
    }
}