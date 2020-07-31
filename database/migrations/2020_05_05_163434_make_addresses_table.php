<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function(Blueprint $table) {
          $table->id();
          $table->string('alias');
          $table->string('company_name')->nullable();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('address');
          $table->string('postal_code');
          $table->string('city');
          $table->boolean('is_active')->default('1');
          $table->string('phone_number')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
