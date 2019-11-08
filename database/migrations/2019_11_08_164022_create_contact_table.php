<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('firstname', 45);
            $table->string('lastname', 45);
            $table->string('title_before_name', 5)->nullable();
            $table->string('title_after_name', 5)->nullable();
            $table->string('workplace', 10)->nullable();
            $table->string('telephone_work', 64);
            $table->string('phone', 64)->nullable();
            $table->string('room', 255)->nullable();
            $table->string('email', 45);
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
        Schema::dropIfExists('contact');
    }
}
