<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_name',
        'guest_phone',
        'model_used',
        'user_message',
        'bot_response',
    ];
}