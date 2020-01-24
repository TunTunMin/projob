<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('company_overview');
            $table->string('register_no')->nullable(true);
            $table->string('ea_no');
            $table->longText('company_size');
            $table->string('industry');
            $table->string('location');
            $table->string('average_processtime');
            $table->longText('benefit_other')->nullable(true);
            $table->string('gallery');
            $table->string('cover_photo');
            $table->string('logo');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
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
        Schema::dropIfExists('companies');
    }
}
