<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prints', function (Blueprint $table) {
		    # Increments method will make a Primary, Auto-Incrementing field.
		    # Most tables start off this way
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
		    # keep track of changes to a row
            $table->timestamps();
            
            #my fields
            $table->string('title');
            $table->string('author');
            $table->boolean('variant'); 
            $table->float('cost', 8 , 2);
            $table->float('ebay', 8, 2);
            $table->float('shopify', 8, 2);
            $table->float('ebans', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prints');
    }
}
