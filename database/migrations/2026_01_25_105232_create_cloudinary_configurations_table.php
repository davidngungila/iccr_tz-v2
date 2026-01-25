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
        Schema::create('cloudinary_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Configuration name/identifier');
            $table->string('cloud_name');
            $table->string('api_key');
            $table->string('api_secret');
            $table->string('upload_preset')->nullable();
            $table->boolean('is_default')->default(false);
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloudinary_configurations');
    }
};
