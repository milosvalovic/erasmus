<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('users_season_ID');
            $table->text('review');
            $table->tinyInteger('rating')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('users_season_ID')
                ->references('ID')
                ->on('users_season')
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
        Schema::dropIfExists('reviews');
    }
}
