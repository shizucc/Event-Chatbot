<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;
    public $table = 'registrations';
    protected $guarded = [];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'registration_id');
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'registration_id');
    }
} 