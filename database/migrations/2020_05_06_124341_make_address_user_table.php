<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeAddressUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('address_user', function (Blueprint $table) {
          $table->id();
          $table->integer('address_id');
          $table->integer('user_id');
      });

      // Schema::table('addresses', function (Blueprint $table) {
      //     $table->foreign('user_id')->references('id')->on('users');
      // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_user');
    }
}
