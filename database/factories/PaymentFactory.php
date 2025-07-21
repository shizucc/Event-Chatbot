<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Registration;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        $status = $this->faker->randomElement(['unpaid','paid','failed']);
        return [
            'registration_id' => Registration::factory(),
            'amount' => $this->faker->randomFloat(6, 10, 1000),
            'status' => $status,
            'payment_time' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 