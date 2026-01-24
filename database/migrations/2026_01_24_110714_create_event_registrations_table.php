<?php

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
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('campus')->nullable();
            $table->string('institution')->nullable();
            $table->string('year_of_study')->nullable();
            $table->string('course')->nullable();
            $table->text('special_requirements')->nullable();
            $table->text('dietary_restrictions')->nullable();
            $table->enum('accommodation_needed', ['yes', 'no'])->default('no');
            $table->enum('transportation_needed', ['yes', 'no'])->default('no');
            $table->text('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->boolean('sms_sent')->default(false);
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
