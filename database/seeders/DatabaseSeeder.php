<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index ) {
        	DB::table('users')->insert([
        		'name'=>$faker->text(10),
        		'email'=>$faker->text(10),
				'password'=>$faker->text(10)
        	]);
        }
    }
}
