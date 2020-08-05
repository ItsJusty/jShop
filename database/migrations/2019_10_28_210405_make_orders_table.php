<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
          $table->id();
          $table->string('number');
          $table->integer('status');
          $table->bigInteger('customer_id');
          $table->string('address_alias');
          $table->string('company_name')->nullable();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('address_street');
          $table->string('phone_number')->nullable();
          $table->string('postal_code');
          $table->string('city');
          $table->string('total_price');
          $table->string('tax_low');
          $table->string('tax_high');
          $table->string('shipping_costs')->nullable();
          $table->boolean('is_paid')->default('0');
          $table->string('payment_id')->nullable();
          $table->longText('note')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
