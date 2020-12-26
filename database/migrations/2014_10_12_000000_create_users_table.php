<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_first')->comment('苗字');
            $table->string('name_second')->comment('名前');
            $table->string('kana_first')->comment('カナ苗字');
            $table->string('kana_second')->comment('カナ名前');
            $table->integer('gender')->comment('1:男性　2:女性');
            $table->dateTime('birthday')->comment('生年月日');
            $table->string('phone')->comment('電話番号');
            $table->integer('role_id')->default(1)->comment('会員種別:権限');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
