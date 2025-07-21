<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Visitor::factory(10)->create();
        \App\Models\Event::factory(10)->create();
        \App\Models\EventDay::factory(20)->create();
        \App\Models\Registration::factory(20)->create();
        \App\Models\ChatSession::factory(20)->create();
        \App\Models\Payment::factory(20)->create();
        \App\Models\Ticket::factory(30)->create();
        \App\Models\EntityCorrection::factory(30)->create();
    }
}
