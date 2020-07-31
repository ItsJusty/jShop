<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('products', function (Blueprint $table) {
         $table->id();
         $table->integer('category_id')->nullable();
         $table->bigInteger('ean13')->nullable();
         $table->string('intern_referention')->nullable();
         $table->string('title');
         $table->longText('description_short')->default('Voor dit artikel is geen beschrijving opgegeven');
         $table->longText('description')->default('Voor dit artikel is geen beschrijving opgegeven');
         $table->boolean('is_active')->default(true);
         $table->float('price');
         $table->integer('stock')->default('0');
         $table->integer('tax_id');
         $table->integer('label_id')->nullable();
         $table->longText('thumbnail');
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
        Schema::dropIfExists('products');
    }
}
