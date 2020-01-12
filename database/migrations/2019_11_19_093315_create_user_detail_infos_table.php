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
            $table->string('current_resident')->nullable(true);
            $table->string('permanent_resident')->nullable(true);
            $table->string('monthly_salary')->nullable(true);
            $table->string('currency_unit')->nullable(true);
            $table->string('working_since')->nullable(true);
            $table->string('institute_university')->nullable(true);

            $table->string('graduation_date')->nullable(true);
            $table->string('position_title')->nullable(true);
            $table->string('company_name')->nullable(true);
            $table->string('job_duration_from')->nullable(true);
            $table->string('job_duration_to')->nullable(true);
            $table->string('specialization')->nullable(true);


            $table->string('position_level')->nullable(true);
            $table->string('phone_no')->nullable(true);
            $table->string('qualification_id')->nullable(true);
            // township
            $table->unsignedBigInteger('preferwork_location_id')->nullable(true);
            $table->foreign('preferwork_location_id')->references('id')->on('townships')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('prefer_specializations_id')->nullable(true);
            $table->foreign('prefer_specializations_id')->references('id')->on('prefer_specializations')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('field_studies_id')->nullable(true);
            $table->foreign('field_studies_id')->references('id')->on('field_studies')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('institute_locations_id')->nullable(true);
            $table->foreign('institute_locations_id')->references('id')->on('townships')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('nationality_id')->nullable(true);
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');;

            $table->unsignedBigInteger('type_id')->nullable(true);
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');;

            $table->unsignedBigInteger('address_id')->nullable(true);
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');;

            $table->unsignedBigInteger('race_id')->nullable(true);
            $table->foreign('race_id')->references('id')->on('races')->onUpdate('cascade')->onDelete('cascade');;

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
