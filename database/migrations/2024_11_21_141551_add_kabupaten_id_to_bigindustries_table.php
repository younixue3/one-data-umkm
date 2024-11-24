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
        Schema::table('bigindustries', function (Blueprint $table) {
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bigindustries', function (Blueprint $table) {
            $table->dropForeign(['kabupaten_id']);
            $table->dropColumn('kabupaten_id');
        });
    }
};
