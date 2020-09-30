<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScoreToAppUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_users', function (Blueprint $table) {
            $table->integer('score')->default(0)->after('password');
            $table->integer('status')->default(1)->after('score');
            $table->string('estado', 30)->after('municipio')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_users', function (Blueprint $table) {
            //
        });
    }
}
