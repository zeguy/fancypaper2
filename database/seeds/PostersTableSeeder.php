<?php

use Illuminate\Database\Seeder;

class PostersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posters')->insert([
            'title' => str_random(10),
            'artist' => str_random(10),
            'variant' => 1,
            'cost' => 100,
            'ebay' => 110.10,
            'shopify' => 120.10,
            'ebans' => 130.10,
        ]);
    }
}
