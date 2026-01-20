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
        Schema::table('events', function (Blueprint $table) {
            $table->text('title_sw')->nullable()->after('title');
            $table->text('description_sw')->nullable()->after('description');
            $table->text('content_sw')->nullable()->after('content');
            $table->text('full_details')->nullable()->after('content_sw');
            $table->text('full_details_sw')->nullable()->after('full_details');
            $table->text('payment_info')->nullable()->after('full_details_sw');
            $table->text('payment_info_sw')->nullable()->after('payment_info');
            $table->string('prayer_meeting_link')->nullable()->after('payment_info_sw');
            $table->string('prayer_meeting_code')->nullable()->after('prayer_meeting_link');
            $table->text('prayer_schedule')->nullable()->after('prayer_meeting_code');
            $table->text('prayer_schedule_sw')->nullable()->after('prayer_schedule');
            $table->text('registration_info')->nullable()->after('prayer_schedule_sw');
            $table->text('registration_info_sw')->nullable()->after('registration_info');
            $table->string('contact_phone')->nullable()->after('registration_info_sw');
            $table->string('contact_email')->nullable()->after('contact_phone');
            $table->text('schedule')->nullable()->after('contact_email');
            $table->text('schedule_sw')->nullable()->after('schedule');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'title_sw', 'description_sw', 'content_sw', 'full_details', 'full_details_sw',
                'payment_info', 'payment_info_sw', 'prayer_meeting_link', 'prayer_meeting_code',
                'prayer_schedule', 'prayer_schedule_sw', 'registration_info', 'registration_info_sw',
                'contact_phone', 'contact_email', 'schedule', 'schedule_sw'
            ]);
        });
    }
};
