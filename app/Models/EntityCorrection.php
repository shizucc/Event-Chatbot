<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntityCorrection extends Model
{
    use HasFactory;
    public $table = 'entity_corrections';
    protected $guarded = [];

    public function chatSession()
    {
        return $this->belongsTo(ChatSession::class, 'chat_session_id');
    }
} 