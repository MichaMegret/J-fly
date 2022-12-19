<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bird_category', function (Blueprint $table) {
            $table->id();
        });

        Schema::table('bird_category', function (Blueprint $table) {
            $table->foreignId('bird_id')
            ->constrained('birds')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
        });

        Schema::table('bird_category', function (Blueprint $table) {
            $table->foreignId('category_id')
            ->constrained('categories')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bird_category');
    }
};
