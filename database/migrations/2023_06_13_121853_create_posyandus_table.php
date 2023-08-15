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
        Schema::create('posyandus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('child_id')->nullable();
            $table->decimal('berat_badan', 10, 1)->default(0);
            $table->integer('tinggi_badan');
            $table->integer('lingkaran_kepala');
            $table->enum('status', ['N', 'B', 'T', 'TP', 'O']);
            $table->integer('kalkulasi_bmi');
            $table->enum('bmi', ['Stunting', 'Normal', 'Obisitas']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posyandus');
    }
};
