<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;
    public $table = 'visitor';
    protected $guarded = [];

    public function chatSessions()
    {
        return $this->hasMany(ChatSession::class, 'visitor_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'visitor_id');
    }
} 