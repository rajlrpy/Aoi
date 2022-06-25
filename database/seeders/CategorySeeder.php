<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $faker = Faker::create();

        $arr_rand = array('Electronics','Books','Furnitures','Sports');
        foreach ($arr_rand as $value) {
            $category = new Category();
            $category->name = $value;
            $category->icon = $faker->name;
            $category->save();
        }
    }
}
