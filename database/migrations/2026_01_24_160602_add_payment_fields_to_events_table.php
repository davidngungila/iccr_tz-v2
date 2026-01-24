<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->enum('event_type', ['physical', 'online', 'hybrid'])->default('physical')->after('status');
            $table->string('theme')->nullable()->after('description');
            $table->string('scripture')->nullable()->after('theme');
            $table->text('gallery')->nullable()->after('banner_image'); // JSON array of image URLs
            $table->string('google_maps_link')->nullable()->after('location');
            $table->text('organizing_team')->nullable()->after('google_maps_link'); // JSON array
            $table->text('contacts')->nullable()->after('organizing_team'); // JSON array
            $table->enum('fee_type', ['free', 'paid'])->default('free')->after('contacts');
            $table->decimal('fee_amount', 10, 2)->nullable()->after('fee_type');
            $table->string('fee_currency', 3)->default('TZS')->after('fee_amount');
            $table->integer('max_attendees')->nullable()->after('fee_currency');
            $table->enum('registration_type', ['individual', 'group', 'both'])->default('individual')->after('max_attendees');
            $table->boolean('auto_confirm')->default(false)->after('registration_type');
            $table->boolean('require_payment')->default(false)->after('auto_confirm');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'event_type', 'theme', 'scripture', 'gallery', 'google_maps_link',
                'organizing_team', 'contacts', 'fee_type', 'fee_amount', 'fee_currency',
                'max_attendees', 'registration_type', 'auto_confirm', 'require_payment'
            ]);
        });
    }
};
