<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersAcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users_acess', function (Blueprint $table) {
            $table->id();
            $table->dateTime('last_login')->default(DB::raw('current_timestamp()'));
            $table->foreignId('Users_id');

            $table->foreign('Users_id')->references('id')->on('Users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users_acess');
    }
}
