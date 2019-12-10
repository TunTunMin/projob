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
            $table->string('current_resident');
            $table->string('permanent_resident');
            $table->string('monthly_salary');
            $table->string('prefer_specialization');
            $table->string('prefer_worklocation');
            $table->string('working_since');
            $table->string('institute_university');
            $table->string('insuni_location');
            $table->string('qualification');
            $table->string('field_of_study');
            $table->string('graduation_date');
            $table->string('position_title');
            $table->string('company_name');
            $table->string('job_duration_from');
            $table->string('job_duration_to');
            $table->string('specialization');
            $table->string('role');
            $table->string('industry');
            $table->string('position_level');
            $table->string('phone_no');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('nationality_id');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');

            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');

            $table->unsignedBigInteger('race_id');
            $table->foreign('race_id')->references('id')->on('races');

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
