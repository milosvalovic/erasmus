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
            $table->bigIncrements('ID');
            $table->string('title', 200);
            $table->longText('article');
            $table->date('publish_date');
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('users_ID');
            $table->unsignedBigInteger('users_season_ID');
            $table->unsignedBigInteger('confirm_by')->nullable()->default(null);
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
