<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('institution')->nullable();
            $table->string('team')->nullable(); // ushers, choir, media, security, etc.
            $table->text('duties')->nullable();
            $table->date('duty_date')->nullable();
            $table->time('duty_start_time')->nullable();
            $table->time('duty_end_time')->nullable();
            $table->enum('status', ['registered', 'confirmed', 'active', 'completed'])->default('registered');
            $table->boolean('attendance_taken')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
