<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('institute_university');
            $table->string('graduate_date');
            // qualification
            $table->unsignedBigInteger('qualification_id')->nullable(true);
            $table->foreign('qualification_id')->references('id')->on('qualifications')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            // Institute / Location
            $table->unsignedBigInteger('institute_location_id')->nullable(true);
            $table->foreign('institute_location_id')->references('id')->on('townships')->onUpdate('cascade')->onDelete('cascade');
            // Field of study
            $table->unsignedBigInteger('field_study_id')->nullable(true);
            $table->foreign('field_study_id')->references('id')->on('field_studies')->onUpdate('cascade')->onDelete('cascade');

            $table->string('major')->nullable(true);
            $table->integer('grade')->nullable(true);
            $table->string('additional_info')->nullable(true);

            // User
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('educations');
    }
}
