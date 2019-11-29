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
            $table->bigIncrements('id');
            $table->string('email', 45)->unique();
            $table->string('password', 128);
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->boolean('verified')->default(false);
            $table->smallInteger('newsletter')->default(1);
            $table->string('hash', 128)->nullable();
            $table->integer('roles_ID');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

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
