<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['super_admin', 'event_coordinator', 'registration_officer', 'finance_officer', 'volunteer', 'leader', 'viewer'])->default('viewer')->after('is_admin');
            $table->json('permissions')->nullable()->after('role'); // Custom permissions JSON
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'permissions']);
        });
    }
};
