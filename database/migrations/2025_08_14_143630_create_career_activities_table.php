<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('career_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('nama_role');
            $table->string('unitSub')->nullable();
            $table->string('direktorat')->nullable();
            $table->string('posisi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('statusPJ')->nullable();
            $table->date('tanggalKDMP')->nullable();
            $table->date('tanggalBand')->nullable();
            $table->date('tanggalTKWT')->nullable();
            $table->date('tanggalAkhirTKWT')->nullable();
            $table->date('tanggalMutasi')->nullable();
            $table->date('tanggalPJ')->nullable();
            $table->date('tanggalLepasPJ')->nullable();
            $table->date('tanggalPensiun')->nullable();
            $table->date('tanggalAkhirKontrak')->nullable();
            $table->string('dokumenNotaDinas')->nullable();
            $table->string('dokumenLainnya')->nullable();
            $table->string('dokumenSK')->nullable(); // untuk file path
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_activities');
    }
};
