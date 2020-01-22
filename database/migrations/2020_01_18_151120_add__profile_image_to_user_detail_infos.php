<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileImageToUserDetailInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_detail_infos', function (Blueprint $table) {
            $table->string('profile')->nullable(true);
            $table->string('resume')->nullable(true);
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
            $table->dropColumn(['profile', 'resume']);
        });
    }
}
