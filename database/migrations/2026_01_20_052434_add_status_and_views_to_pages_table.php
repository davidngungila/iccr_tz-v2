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
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'status')) {
                $table->enum('status', ['draft', 'published'])->default('draft');
            }
            if (!Schema::hasColumn('pages', 'views')) {
                $table->integer('views')->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (Schema::hasColumn('pages', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('pages', 'views')) {
                $table->dropColumn('views');
            }
        });
    }
};
