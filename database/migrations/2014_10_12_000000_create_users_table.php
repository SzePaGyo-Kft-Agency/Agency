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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('permission')->default(1);
            $table->boolean('vip')->default(0);
            $table->timestamps();
        });

        User::create(['name' => 'Alig Elek' , 'email'=> 'aelek@mail.com', 'password' => Hash::make('Aa123451@'),'vip'=>0]);
        User::create(['name' => 'Winch Eszter' , 'email'=> 'weszter@mail.com', 'password' => Hash::make('Aa123452@'),'vip'=>0]);
        User::create(['name' => 'Szerep Elek' , 'email'=> 'szepelek@mail.com', 'password' => Hash::make('Aa123453@'),'vip'=>0]);
        User::create(['name' => 'Kis Károly' , 'email'=> 'karcsika@mail.com', 'password' => Hash::make('Aa123454@'),'vip'=>1]);
        User::create(['name' => 'Nagy Barnabás' , 'email'=> 'barnika@mail.com', 'password' => Hash::make('Aa123455@'),'vip'=>0]);
        User::create(['name' => 'Füty Imre' , 'email'=> 'imruska@mail.com', 'password' => Hash::make('Aa123456@'),'vip'=>1]);

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
};
