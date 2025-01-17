<?php

use App\Enums\EmailStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id()->from(1001);
            $table->uuid('uuid')->unique();
            $table->timestamps();
            $table->string('value');
            $table->foreignId('user_id')->constrained();
            $table->string('status')->default(EmailStatusEnum::pending->value);
            $table->string('code', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
