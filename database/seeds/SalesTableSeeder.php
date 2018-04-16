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
            ['Alien', 'Durieux, Laurent',90, 199, 'ebay', 63, 'reg, mint'],
            ['Psycho', 'Danger, Daniel', 140, 400, 'ebay', 238.1, 'reg, NM'],
            ['Rear Window', 'Durieux, Laurent', 445, 600, 'ebay', 57.3, 'reg, mint'],
        ];
        
        $count = count($sales);
        
        foreach ($sales as $key => $sale) {
            Sale::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $sale[0],
                'artist' => $sale[1],
                'cost' => $sale[2],
                'price' => $sale[3],
                'platform' => $sale[4],
                'profit' => $sale[5],
                'notes' => $sale[6],
                #'user_id' => 1,
            ]);
            $count--;
        }
    }       
}

