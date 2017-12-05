<?php

use Illuminate\Database\Seeder;
use App\Poster;

class PostersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posters = [
            ['Alien', 'Durieux, Laurent', 1, 192.12, 'https://cdn.shopify.com/s/files/1/0182/2915/products/tuxpi.com.1461588449_1024x1024.jpg?v=1461588461'],
            ['Thin Red Line', 'Hanuka, Tomer', 1, 100, 'https://cdn.shopify.com/s/files/1/0558/2081/products/thinredlinereg_1024x1024.jpg?v=1453327874'],
            ['Thin Red Line', 'Hanuka, Tomer', 1, 100, 'https://cdn.shopify.com/s/files/1/0558/2081/products/thinredlinereg_1024x1024.jpg?v=1453327874'],
            ['Alien', 'Durieux, Laurent', 1, 192.12, 'https://cdn.shopify.com/s/files/1/0182/2915/products/tuxpi.com.1461588449_1024x1024.jpg?v=1461588461'],
            ['Thin Red Line', 'Hanuka, Tomer', 1, 100, 'https://cdn.shopify.com/s/files/1/0558/2081/products/thinredlinereg_1024x1024.jpg?v=1453327874'],
            ['Thin Red Line', 'Hanuka, Tomer', 1, 100, 'https://cdn.shopify.com/s/files/1/0558/2081/products/thinredlinereg_1024x1024.jpg?v=1453327874'],
            ['Alien', 'Durieux, Laurent', 1, 192.12, 'https://cdn.shopify.com/s/files/1/0182/2915/products/tuxpi.com.1461588449_1024x1024.jpg?v=1461588461'],
            ['Thin Red Line', 'Hanuka, Tomer', 1, 100, 'https://cdn.shopify.com/s/files/1/0558/2081/products/thinredlinereg_1024x1024.jpg?v=1453327874'],
            ['Thin Red Line', 'Hanuka, Tomer', 1, 100, 'https://cdn.shopify.com/s/files/1/0558/2081/products/thinredlinereg_1024x1024.jpg?v=1453327874'],
        ];
        
        $count = count($posters);
        
        foreach ($posters as $key => $poster) {
            Poster::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $poster[0],
                'artist' => $poster[1],
                'variant' => $poster[2],
                'cost' => $poster[3],
                'image' => $poster[4],
            ]);
            $count--;
        }
    }       
}
