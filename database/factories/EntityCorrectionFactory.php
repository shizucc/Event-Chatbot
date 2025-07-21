<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChatSession;

class EntityCorrectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'chat_session_id' => ChatSession::factory(),
            'entity_name' => $this->faker->word(),
            'old_value' => $this->faker->word(),
            'new_value' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 