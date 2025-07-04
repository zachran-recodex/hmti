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
        Schema::create('fungsis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('departemen_biro_id')->constrained('departemen_biros')->onDelete('cascade');
            $table->timestamps();

            // Index untuk foreign key
            $table->index('departemen_biro_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fungsis');
    }
};
