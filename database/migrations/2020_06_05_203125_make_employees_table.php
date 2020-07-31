<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
          $table->id();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('bsn_number')->nullable();
          $table->string('email')->unique();
          $table->string('password');
          $table->string('gender')->nullable();
          $table->integer('role_id');
          $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('employees');
    }
}
