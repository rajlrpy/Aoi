<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr_rand = array('Accountant','CEO','Software Engineer','President','Marketing Manager', 'Accountant');

        return [
            'name' => $arr_rand[array_rand($arr_rand,1)],
        ];
    }
}
