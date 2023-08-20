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
        Schema::create('imt_umurs', function (Blueprint $table) {
            $table->id();
            $table->integer('umur');
            $table->enum('jk', ['L', 'P']);
            $table->decimal('mines_tiga_sd', 10, 1)->default(0);
            $table->decimal('mines_dua_sd', 10, 1)->default(0);
            $table->decimal('mines_satu_sd', 10, 1)->default(0);
            $table->decimal('median', 10, 1)->default(0);
            $table->decimal('plus_satu_sd', 10, 1)->default(0);
            $table->decimal('plus_dua_sd', 10, 1)->default(0);
            $table->decimal('plus_tiga_sd', 10, 1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imt_umurs');
    }
};
