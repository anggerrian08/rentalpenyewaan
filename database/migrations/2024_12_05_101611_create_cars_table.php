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
            $table->foreignId('merek_id')->constrained()->onUpdate('cascade');
            $table->string('name');
            $table->text('description');
            $table->enum('fuel_type', ['gasoline', 'diesel']);
            $table->date('manufacture_year'); 
            $table->string('plat')->unique();
            $table->integer('price');
            $table->integer('stock');
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
