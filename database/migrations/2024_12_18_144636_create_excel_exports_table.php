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
        Schema::create('iris', function (Blueprint $table) {
            $table->id()->autoIncrement();
      
            $table->float('sepal_length');
            $table->float('sepal_width');
            $table->float('petal_length');
            $table->float('petal_width');
            $table->string('species');
            $table->timestamps();
        });
        Schema::create('mtcars', function (Blueprint $table) {
            $table->id();
            $table->float('name');
            $table->float('mpg');
            $table->integer('cyl');
            $table->float('disp');
            $table->integer('hp');
            $table->float('drat');
            $table->float('wt');
            $table->float('qsec');
            $table->boolean('vs');
            $table->boolean('am');
            $table->integer('gear');
            $table->integer('carb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iris');
        Schema::dropIfExists('mtcars');
    }
};
