<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Merchandises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
            $table->string('merchandise_name', 100);
            $table->string('merchandise_img', 255);
            $table->string('brand', 100);
            $table->integer('price');
            $table->string('explanation', 1000);
            $table->string('categories', 20);
            $table->string('condition', 20);
            $table->string('comment', 1000)->nullable();
            $table->timestamps();
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandises');
    }
}
