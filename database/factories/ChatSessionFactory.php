<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Visitor;

class ChatSessionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'visitor_id' => Visitor::factory(),
            'current_state' => $this->faker->randomElement(['start','in_progress','finished']),
            'data' => json_encode(['step' => $this->faker->numberBetween(1,5)]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 