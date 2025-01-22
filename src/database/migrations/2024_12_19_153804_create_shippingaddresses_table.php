<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingaddresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // 外部キー
            $table->string('shipping_name', 100); // 宛先の名前
            $table->string('shipping_postal', 8); // 郵便番号
            $table->string('shipping_address', 100); // 住所
            $table->string('shipping_building', 100)->nullable(); // 建物名 (任意)
            $table->timestamps();

             // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippingaddresses');
    }
}
