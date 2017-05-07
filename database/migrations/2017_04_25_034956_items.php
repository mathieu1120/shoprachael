<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('cost', 15, 8)->default(0);
            $table->double('price', 15, 8)->default(0);
            $table->boolean('sold')->default(0);
            $table->double('sold_price', 15, 8)->default(0);
            $table->double('shipping_cost', 15, 8)->default(0);
            $table->double('shipping_price', 15, 8)->default(0);
            $table->timestamp('shipping_at')->nullable();
            $table->timestamp('sold_at')->nullable();
            $table->string('country_code')->default('');
            $table->string('city')->default('');
            $table->string('state')->default('');
            $table->string('zipcode')->default('');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('items');
    }
}
