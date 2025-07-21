<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    public $table = 'events';
    protected $guarded = [];

    public function eventDays()
    {
        return $this->hasMany(EventDay::class, 'event_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'event_id');
    }
} 