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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jabatan', ['Kepala', 'Staff']);
            $table->string('foto')->nullable();
            $table->year('tahun_mulai')->default(2022);
            $table->year('tahun_selesai')->nullable();
            $table->foreignId('departemen_biro_id')->constrained('departemen_biros')->onDelete('cascade');
            $table->timestamps();

            // Index untuk foreign key dan pencarian
            $table->index('departemen_biro_id');
            $table->index('jabatan');
            $table->index(['tahun_mulai', 'tahun_selesai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
