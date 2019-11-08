<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_season', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('season_status_ID');
            $table->unsignedBigInteger('users_season_ID');
            $table->unsignedBigInteger('users_ID');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('season_status_ID')
                ->references('ID')
                ->on('season_status')
                ->onDelete('restrict');

            $table->foreign('users_season_ID')
                ->references('ID')
                ->on('users_season')
                ->onDelete('cascade');

            $table->foreign('users_ID')
                ->references('ID')
                ->on('users')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_season');
    }
}
