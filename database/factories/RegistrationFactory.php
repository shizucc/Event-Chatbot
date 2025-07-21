<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Visitor;
use App\Models\Event;

class RegistrationFactory extends Factory
{
    public function definition(): array
    {
        $status = $this->faker->randomElement(['Pending','Confirmed','Cancelled']);
        $payment_status = $this->faker->randomElement(['Unpaid','Paid','Failed']);
        return [
            'visitor_id' => Visitor::factory(),
            'event_id' => Event::factory(),
            'status' => $status,
            'payment_status' => $payment_status,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 