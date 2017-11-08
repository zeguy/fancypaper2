<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
		    # Increments method will make a Primary, Auto-Incrementing field.
		    # Most tables start off this way
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
		    # keep track of changes to a row
            $table->timestamps();
            
            #my fields
            $table->string('artist');
            $table->string('title');
            $table->boolean('variant'); 
            $table->float('sold', 8 , 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
