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
        Schema::create('ikm_typeproduct', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ikm_id')->constrained()->onDelete('cascade');
            $table->foreignId('typeproduct_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikm_typeproduct');
    }
};
