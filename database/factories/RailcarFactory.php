<?php

namespace Database\Factories;

use App\Models\Railcar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RailcarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->name,
            'area'         => Arr::random(Railcar::areas()),
            'arrival_date' => $this->faker->dateTimeBetween('+0 days', '+2 years'),
            'due_date'     => $this->faker->dateTimeBetween('+0 days', '+2 years'),
            'status'       => Arr::random(Railcar::statuses()),
        ];
    }
}
