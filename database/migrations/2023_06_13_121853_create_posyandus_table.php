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
            $table->decimal('tinggi_badan', 10, 2)->default(0);
            $table->integer('lingkaran_kepala');
            $table->string("status_gizi");
            // $table->enum('status_gizi', ['O', 'K', 'H', 'BKM']);
            $table->decimal('kalkulasi_bbu', 10, 2)->default(0);
            $table->decimal('kalkulasi_imt', 10, 2)->default(0);
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
