<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    public $table = 'payments';
    protected $guarded = [];

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id');
    }
} 