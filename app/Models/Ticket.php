<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    public $table = 'tickets';
    protected $guarded = [];

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id');
    }

    public function eventDay()
    {
        return $this->belongsTo(EventDay::class, 'event_day_id');
    }
} 