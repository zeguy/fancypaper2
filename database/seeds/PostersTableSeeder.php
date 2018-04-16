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
            ['Alien', 'Durieux, Laurent', 192.12, 'https://cdn.shopify.com/s/files/1/0182/2915/products/tuxpi.com.1461588449_1024x1024.jpg?v=1461588461', "reg, mint"],
            ['Raiders of the Lost Ark', 'Durieux, Laurent', 192.12, 'https://cdn.shopify.com/s/files/1/0182/2915/files/unnamed_1_1024x1024.jpg?18023606251195222806', "reg, mint"],
            ['Pulp Fiction', 'Durieux, Laurent', 192.12, 'https://cdn.shopify.com/s/files/1/0558/2081/products/pulpfiction_reg_RVSD_grande_copy_03909b68-cfb2-4640-acd5-611ba206a018_1024x1024.jpg?v=1417194705', "reg, mint"],
            ['Psycho', 'Danger, Daniel', 125, 'http://dlp2gfjvaz867.cloudfront.net/product_photos/36993801/tumblr_mdyg0y1roH1rt9rulo1_1280_original.jpg', "reg, mint"],
            ['Rear Window', 'Durieux, Laurent', 100, 'https://static1.squarespace.com/static/51237ec3e4b0b5151b78f462/52fbb14ae4b03ff7dae51a0a/52fbb1abe4b03ff7dae51ada/1392226733035/REAR-WONDOW.jpg?format=2500w',"reg, mint"],
            ['Hateful Eight', 'Edmiston, Jason', 192.12, 'https://cdn.shopify.com/s/files/1/0558/2081/files/Edmiston_HatefulEight_FINALapproved_1500px_1024x1024.jpg?16398928749424667929',"reg, mint"],
            ['Thin Red Line', 'Ruas, Jao', 100, 'https://cdn.shopify.com/s/files/1/0558/2081/products/Ruas_TheThinRedLine_FINALforprint_1024x1024.jpg?v=1476811691',"reg, mint"],
            ['Liberte, Egalite, Fraternite', 'Fairey, Shepard', 600, 'https://obeygiant.com/images/2015/12/libertefraterniteobey01.jpeg',"reg, mint"],
            ['Power & Glory Day of the Dead', 'Fairey, Shepard', 200, 'https://obeygiant.com/images/2015/07/POWER-GLORY-Skull-red.jpg',"red variant, mint"],
            ['Power & Glory Day of the Dead var', 'Fairey, Shepard', 200, 'https://i0.wp.com/obeygiant.com/images/2015/07/Mail-Attachment.jpeg?fit=600%2C800&ssl=1',"black variant, mint"],
            ["Don't try to stop it", 'Deih', 200, 'https://cdn.shopify.com/s/files/1/0920/4880/products/DSC05018_1800x.JPG?v=1479271701',"black variant, mint"],
        ];
        
        $count = count($posters);
        
        foreach ($posters as $key => $poster) {
            Poster::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'title' => $poster[0],
                'artist' => $poster[1],
                'cost' => $poster[2],
                'image' => $poster[3],
                'notes' => $poster[4],
            ]);
            $count--;
        }
    }       
}
