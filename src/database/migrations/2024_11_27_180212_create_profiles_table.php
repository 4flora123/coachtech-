<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // 外部キー
            $table->string('profile_name', 100)->nullable(); //プロフィールの名前
            $table->string('postal', 8)->nullable(); // 郵便番号
            $table->string('address', 100)->nullable(); // 住所
            $table->string('payment_info')->nullable(); // 決済情報
            $table->string('building', 100)->nullable(); // 建物名
            $table->string('profile_image_url')->nullable(); // プロフィール画像のURL
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
        Schema::dropIfExists('profiles');
    }
}
