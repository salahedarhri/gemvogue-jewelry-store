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
        Schema::create('jewelry_products', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('prix', 10, 2);
            $table->string('slug')->unique();

            $table->string('type');
            $table->text('description');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('collection');

            $table->unsignedInteger('qte_stock');
            
            $table->string('type_metal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jewelry_products');
    }
};
