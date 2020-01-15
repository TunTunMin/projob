<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position_title');
            $table->string('company_name');
            $table->string('job_duration_from');
            $table->string('job_duration_to')->nullable(true);
            $table->unsignedBigInteger('specializations_id')->nullable(true);
            // specializations
            $table->foreign('specializations_id')->references('id')->on('specializations')->onUpdate('cascade')->onDelete('cascade');

            // role
            $table->unsignedBigInteger('role_id')->nullable(true);
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            // industry
            $table->unsignedBigInteger('industries_id')->nullable(true);
            $table->foreign('industries_id')->references('id')->on('industries')->onUpdate('cascade')->onDelete('cascade');
            // position level
            $table->string('position_level');
            // currency unit
            $table->string('currency_unit');
            // monthly salary
            $table->string('monthly_salary')->nullable(true);
            // experience description
            $table->string('experience_description')->nullable(true);
            // user
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('experiences');
    }
}
