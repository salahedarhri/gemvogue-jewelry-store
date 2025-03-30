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
        Schema::create('jewelry_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bijou')->constrained()->onDelete('cascade'); 
            $table->string('taille');
            $table->integer('qte'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jewelry_sizes');
    }
};
