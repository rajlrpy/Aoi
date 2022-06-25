<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $arr_rand = array('Accountant','CEO','Software Engineer','President','Marketing Manager', 'Accountant');
        foreach ($arr_rand as $value) {
            $group = new Group;
            $group->name = $value;
            $group->save();
        }
    }
}
