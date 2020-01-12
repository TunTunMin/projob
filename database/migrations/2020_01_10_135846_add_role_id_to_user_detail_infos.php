<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleIdToUserDetailInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_detail_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable(true);
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropIfExists('role_id');
            $table->dropForeign('role_id');
            $table->dropColumn('role_id');
        });
    }
}
