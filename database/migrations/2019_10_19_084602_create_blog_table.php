<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('ID');
            $table->text('article');
            $table->string('title',200);
            $table->tinyInteger('status');
            $table->unsignedBigInteger('users_ID');
            $table->unsignedBigInteger('users_season_ID');
            $table->unsignedBigInteger('confirm_by');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('users_ID')
                ->references('ID')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('users_season_ID')
                ->references('ID')
                ->on('users_season')
                ->onDelete('cascade');

            $table->foreign('confirm_by')
                ->references('ID')
                ->on('users')
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
        Schema::dropIfExists('blog');
    }
}
