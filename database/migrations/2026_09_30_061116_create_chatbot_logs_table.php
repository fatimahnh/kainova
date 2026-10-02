<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_logs', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name');
            $table->string('guest_phone');
            $table->string('model_used')->default('gemini-2.5-flash');
            $table->text('user_message');
            $table->text('bot_response');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_logs');
    }
};