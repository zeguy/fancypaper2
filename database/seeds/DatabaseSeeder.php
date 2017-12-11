<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PostersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PosterTagTableSeeder::class);
        $this->call(SalesTableSeeder::class);
    }
}
