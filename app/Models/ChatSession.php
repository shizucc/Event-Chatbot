<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatSession extends Model
{
    use HasFactory;
    public $table = 'chat_sessions';
    protected $guarded = [];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }

    public function entityCorrections()
    {
        return $this->hasMany(EntityCorrection::class, 'chat_session_id');
    }
} 