<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quakes', function (Blueprint $table) {
            $table->id();
            $table->double('lat');
            $table->double('lng');
            $table->double('mag');
            $table->double('depth');
            $table->text('time');
            $table->text('location_name');
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
        Schema::dropIfExists('quakes');
    }
}
