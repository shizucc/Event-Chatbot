<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

class EventDayFactory extends Factory
{
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'day_date' => $this->faker->date(),
            'description' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 