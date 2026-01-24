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
        Schema::create('notification_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['sms', 'email'])->default('sms');
            $table->boolean('is_primary')->default(false);
            $table->boolean('is_active')->default(true);
            
            // SMS fields
            $table->string('sms_username')->nullable();
            $table->string('sms_password')->nullable();
            $table->string('sms_from')->nullable();
            $table->string('sms_url')->nullable();
            
            // Email fields
            $table->string('mail_host')->nullable();
            $table->integer('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_from_address')->nullable();
            $table->string('mail_from_name')->nullable();
            
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_providers');
    }
};
