<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->dateTime('post_date');
            $table->longText('job_highlights');
            $table->longText('job_description');
            $table->string('career_level');
            $table->string('qualification');
            $table->string('employee_type');
            $table->string('salary_unit');
            $table->integer('salary_from');
            $table->integer('salary_to');

            $table->unsignedBigInteger('job_specification_id');
            $table->foreign('job_specification_id')->references('id')->on('job_specifications');

            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id')->references('id')->on('job_types');

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            
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
        Schema::dropIfExists('jobs');
    }
}
