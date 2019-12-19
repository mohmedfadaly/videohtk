<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $images = [
            'cover_image_15737488251.jpg',
            'cover_image_1573748825.jpg',
            'cover_image_1573640108.jpg'
        ];
        $youtube = [
            'https://www.youtube.com/watch?v=FAPYh9ZxqQ4',
            'https://www.youtube.com/watch?v=46etje5Q5fY',
            'https://www.youtube.com/watch?v=kh5-a4G7Vr4',
            'https://www.youtube.com/watch?v=VR0vsWuO3GM'
        ];
        $ids = [1,2,3,4,5,6,7,8,9];
        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'name' => $faker->word,
                'meta_keywords' => $faker->name,
                'meta_des' => $faker->name,
                'cat_id' => 1,
                'youtube' => $youtube[rand(0,3)],
                'published' => rand(0,1),
                'image' => $images[rand(0,1)],
                'des' => $faker->paragraph,
                'user_id' => 1
            ];
            $video = \App\models\video::create($array);
            $video->skills()->sync(array_rand($ids , 2));
            $video->tags()->sync(array_rand($ids , 3));
        }
    }
}
