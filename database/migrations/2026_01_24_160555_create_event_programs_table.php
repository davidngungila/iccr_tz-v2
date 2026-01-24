<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->date('program_date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('session_type')->nullable(); // worship, teaching, workshop, break, etc.
            $table->string('speaker_name')->nullable();
            $table->text('speaker_bio')->nullable();
            $table->string('location')->nullable(); // Room/venue for this session
            $table->integer('order')->default(0);
            $table->boolean('is_break')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_programs');
    }
};
