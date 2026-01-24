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
        if (Schema::hasTable('carousel_slides')) {
            return;
        }

        Schema::create('carousel_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url');
            $table->string('cloudinary_public_id')->nullable();
            $table->string('animation_type')->default('slide-fade'); // slide-fade, slide-left, slide-right, slide-zoom
            $table->string('button_1_text')->nullable();
            $table->string('button_1_url')->nullable();
            $table->string('button_2_text')->nullable();
            $table->string('button_2_url')->nullable();
            $table->string('gradient_from')->default('green-600');
            $table->string('gradient_via')->default('blue-600');
            $table->string('gradient_to')->default('green-800');
            $table->boolean('is_urgent')->default(false);
            $table->string('urgent_badge_text')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousel_slides');
    }
};
