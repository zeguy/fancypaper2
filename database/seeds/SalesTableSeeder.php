<?php

use Illuminate\Database\Seeder;
use App\Sale;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales = [
            ['Alien', 'Durieux, Laurent', 1, 90, 199, 'ebay', 63],
            ['Psycho', 'Danger, Daniel', 1, 140, 400, 'ebay', 238.1],
            ['Rear Window', 'Durieux, Laurent', 1, 445, 600, 'ebay', 57.3],
        ];
        
        $count = count($sales);
        
        foreach ($sales as $key => $sale) {
            Sale::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $sale[0],
                'artist' => $sale[1],
                'variant' => $sale[2],
                'cost' => $sale[3],
                'price' => $sale[4],
                'platform' => $sale[5],
                'profit' => $sale[6],
                'user_id' => 1,
            ]);
            $count--;
        }
    }       
}

