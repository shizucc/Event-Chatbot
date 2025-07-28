<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventDay extends Model
{
    use HasFactory;
    public $table = 'event_days';
    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_day_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'event_day_id');
    }
} 