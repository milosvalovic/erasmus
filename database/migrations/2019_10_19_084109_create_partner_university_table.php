<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerUniversityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_university', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('country_ID');
            $table->string('city', 45);
            $table->string('address',100);
            $table->string('name', 100);
            $table->string('acronym', 10);
            $table->text('info')->nullable();
            $table->string('img_url', 128)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_ID')
                ->references('ID')
                ->on('countries')
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
        Schema::dropIfExists('partner_university');
    }
}
