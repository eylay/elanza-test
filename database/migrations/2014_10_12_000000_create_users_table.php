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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        /*
        میتونیم به جای اینکه تو این قسمت اضافه کردن کاربر رو انجام بدیم از
        seeder یا factory
        هم استفاده کنیم
        اما از اونجایی که پروژه کوچیک هستش و ما فقط به 1 کاربر برای شروع نیاز داریم ترجیح دادم همینجا 1 کاربر تعریف کنم
        */
        \DB::table('users')->insert([
            'name' => 'elanza',
            'email' => 'test@elanza.com',
            'password' => bcrypt('elanza'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
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
