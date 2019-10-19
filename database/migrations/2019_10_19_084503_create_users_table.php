<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('email', 45);
            $table->string('password', 128);
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->smallInteger('deleted');
            $table->unsignedBigInteger('roles_ID');
            $table->smallInteger('newsletter');
            $table->timestamps();

            $table->foreign('roles_ID')
                ->references('ID')
                ->on('roles')
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
        Schema::dropIfExists('users');
    }
}
