<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_detail_infos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('nationality_id')->nullable(true);
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('current_resident_id')->nullable(true);
            $table->foreign('current_resident_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');
            // permanent resident of
            $table->unsignedBigInteger('permanent_resident_id')->nullable(true);
            $table->foreign('permanent_resident_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');

            $table->string('monthly_salary')->nullable(true);
            $table->string('currency_unit')->nullable(true);
            $table->string('working_since')->nullable(true);
            // prefer specialization
            $table->unsignedBigInteger('specializations_id')->nullable(true);
            $table->foreign('specializations_id')->references('id')->on('specializations')->onUpdate('cascade')->onDelete('cascade');
            // township
            $table->unsignedBigInteger('preferwork_location_id')->nullable(true);
            $table->foreign('preferwork_location_id')->references('id')->on('townships')->onUpdate('cascade')->onDelete('cascade');
            // user
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // Address
            $table->unsignedBigInteger('address_id')->nullable(true);
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            // Race
            $table->unsignedBigInteger('race_id')->nullable(true);
            $table->foreign('race_id')->references('id')->on('races')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('user_detail_infos');
    }
}
