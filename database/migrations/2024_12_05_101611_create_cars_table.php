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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merek_id')->constrained()->cascadeOnUpdate();
            $table->string('name');
            $table->text('description');
            $table->enum('type_transmisi', ['Transmisi Manual', 'Otomatis Konvensional',  'Otomatis CVT','DCT', 'AMT']);
            $table->enum('fuel_type', ['bensin','solar', 'bio solar', 'cng', 'kendaraan listrik']);
            $table->date('manufacture_year');
            $table->string('plat')->unique();
            $table->integer('price');
            $table->integer('stock');
            $table->enum('best_choice', [1,2]);
            $table->integer('passenger_capacity');
            $table->integer('luggage_capacity');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
