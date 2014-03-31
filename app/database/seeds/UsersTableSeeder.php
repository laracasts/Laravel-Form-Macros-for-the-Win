<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 12) as $index)
        {
            User::create([
                'name' => $faker->word,
                'age' => $faker->randomNumber(10, 90)
            ]);
            
            DB::table('orders')->insert([
                'title' => 'Some Order',
                'description' => 'Some description',
                'purchase_date' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]);
        }
    }

}