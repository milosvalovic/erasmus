<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_hours', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('day', 2);
            $table->time('from')->nullable();
            $table->time('to')->nullable();
            $table->tinyInteger('off');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('office_hours');
    }
}
