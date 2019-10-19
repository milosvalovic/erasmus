<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobility', function (Blueprint $table) {
            $table->increments('ID');
            $table->foreign('mobility_types_ID')
                ->references('ID')->on('partner_university')
                ->onDelete('cascade');
            $table->tinyInteger('deleted');
            $table->foreign('partner_university_ID')
                ->references('ID')->on('mobility_types')
                ->onDelete('cascade');
            $table->smallInteger('grant');
            $table->increments('info')->nullable();
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
        Schema::dropIfExists('mobility');
    }
}
