<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0 ;$i< 10 ;$i++){
            $array = [
                'name' => $faker->word,
                'meta_keywords' => $faker->name,
                'meta_des' => $faker->name,
            ];
            \App\models\category::create($array);
        }
    }
}
