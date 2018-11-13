<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('customers_id')->unsigned();
			$table->integer('products_id')->unsigned();
			$table->integer('quantity');
			$table->timestamps();
		});

		Schema::table('orders', function($table){
			$table->foreign('customers_id')->references('id')->on('customers');
			$table->foreign('products_id')->references('id')->on('products');
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
