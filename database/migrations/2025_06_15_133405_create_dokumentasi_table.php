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
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('tahap_id')->constrained()->onDelete('cascade');
            $table->string('judul')->nullable();
            $table->string('kegiatan');
            $table->enum('kendala',['tidak ada', 'ada'])->default('tidak ada');
            $table->string('deskripsi_kendala')->nullable();
            $table->timestamp('tanggal')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi');
    }
};
