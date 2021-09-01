<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 10; $i++){
            $array = [
                'name' => $faker->word,
                'meta_keyword' => $faker->name,
                'meta_description' => $faker->name,
            ];
            \App\Models\Category::create($array);
        }
    }
}
