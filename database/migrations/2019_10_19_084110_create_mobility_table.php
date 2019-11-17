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
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('mobility_types_ID');
            $table->unsignedBigInteger('partner_university_ID');
            $table->unsignedBigInteger('category_ID');
            $table->smallInteger('grant');
            $table->text('info')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mobility_types_ID')
                ->references('ID')
                ->on('mobility_types')
                ->onDelete('cascade');

            $table->foreign('partner_university_ID')
                ->references('ID')
                ->on('partner_university')
                ->onDelete('cascade');

            $table->foreign('category_ID')
                ->references('ID')
                ->on('category')
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
        Schema::dropIfExists('mobility');
    }
}
