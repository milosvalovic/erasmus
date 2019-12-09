<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('season', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->date('date_start_reg');
            $table->date('date_end_reg');
            $table->integer('count_students');
            $table->integer('count_registrations');
            $table->unsignedBigInteger('mobility_ID');
            $table->date('date_start_mobility');
            $table->date('date_end_mobility');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mobility_ID')
                ->references('ID')
                ->on('mobility')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('season');
    }
}
