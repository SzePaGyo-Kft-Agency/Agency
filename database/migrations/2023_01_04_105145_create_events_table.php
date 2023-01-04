<?php

use App\Models\Event;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('name');
            $table->foreignId('agency_id')->references('agency_id')->on('agencies');
            $table->integer('limit')->default(100);
            $table->date('date');
            $table->string('location');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        Event::create(['name' => 'Meglepetés Parti Krisztián részére', 'agency_id' => 1, 'limit' => 600, 'date' => '2023-02-02', 'location' => 'Bikás Park', 'status' => 1]);
        Event::create(['name' => 'Évzáró buli', 'agency_id' => 1, 'limit' => 60, 'date' => '2023-04-23', 'location' => 'Bikás Park']);
        Event::create(['name' => 'Várakozás a 100E buszjáratra', 'agency_id' => 2, 'limit' => 25, 'date' => '2023-01-02', 'location' => 'Kőbánya-Kispest', 'status' => 2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
