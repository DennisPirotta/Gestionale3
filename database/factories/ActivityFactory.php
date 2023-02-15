<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $actions = [
            'created','updated','deleted'
        ];
        $objects = [
            'the hour','the order','the customer'
        ];
        return [
            'user_id' => User::all()->random()->id,
            'object' => $objects[rand(0,count($objects) - 1)],
            'action' => $actions[rand(0,count($actions) - 1)],
            'datetime' => fake()->dateTimeThisMonth,
            'symbolic_id' => fake()->randomNumber(),
            'url' => '#'
        ];
    }
}
