<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChangenameindustryToUserDetailInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_detail_infos', function (Blueprint $table) {

            $table->unsignedBigInteger('industries_id')->nullable(true);
            $table->foreign('industries_id')->references('id')->on('industries')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_detail_infos', function (Blueprint $table) {
            $table->dropForeign('industries_id');
            $table->dropColumn(['industries_id']);
        });
    }
}
