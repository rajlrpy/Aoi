<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // $faker = Faker::create();
        // for($i=0; $i<500; $i++){
        //     $employee = new Employee;
        //     $employee->name = $faker->name;
        //     $arr_rand = array('Accountant','CEO','Software Engineer');
        //     $employee->position = $arr_rand[array_rand($arr_rand,1)];
        //     $employee->office = $faker->state;
        //     $employee->start_date = $faker->date;
        //     $employee->salary = $faker->numberBetween($min = 10000, $max = 90000);
        //     $employee->save();
        // }

     }
}
