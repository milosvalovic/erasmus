<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_season', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('users_ID')->nullable();
            $table->unsignedBigInteger('season_ID')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('users_ID')
                ->references('ID')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('season_ID')
                ->references('ID')
                ->on('season')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_season');
    }
}
