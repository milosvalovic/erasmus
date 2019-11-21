<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('reviews_ID');;
            $table->string('url', 150);
            $table->string('thumb_url', 150);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('reviews_ID')
                ->references('ID')
                ->on('reviews')
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
        Schema::dropIfExists('images');
    }
}
