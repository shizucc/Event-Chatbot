<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_datetime' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'end_datetime' => $this->faker->dateTimeBetween('+1 day', '+2 years'),
            'location' => $this->faker->address(),
            'form_flow' => json_encode(['step1' => 'input', 'step2' => 'confirm']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 