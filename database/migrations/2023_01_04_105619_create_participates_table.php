<?php

use App\Models\Participate;
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
        Schema::create('participates', function (Blueprint $table) {
            $table->primary(['user_id', 'event_id']);
            $table->foreignId('user_id')->references('user_id')->on('users');
            $table->foreignId('event_id')->references('event_id')->on('events');
            $table->tinyint('present');
            $table->timestamps();
        });
        Participate::create(['user_id' => 1, 'event_id' => 2, 'present' => 1]);
        Participate::create(['user_id' => 2, 'event_id' => 1, 'present' => 0]);
        Participate::create(['user_id' => 3, 'event_id' => 3, 'present' => 1]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participates');
    }
};
