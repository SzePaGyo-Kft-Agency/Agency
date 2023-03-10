<?php

use App\Models\Agency;
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
        Schema::create('agencies', function (Blueprint $table) {
            $table->id('agency_id');
            $table->string('name', 255);
            $table->string('country', 255);
            $table->string('type', 255);
        });

        Agency::create(['name' => 'SzePaGyoKFT', 'country' => 'Hungary', 'type' => 'IT organization']);
        Agency::create(['name' => 'Namzor', 'country' => 'Czech Republic', 'type' => 'Work mediation organization']);
        Agency::create(['name' => 'BigL', 'country' => 'USA', 'type' => 'School cooperative']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencies');
    }
};
