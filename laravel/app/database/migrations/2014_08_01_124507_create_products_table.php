<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table){
			$table->increments('id');
			$table->string('product_code');
			$table->string('product_name');
			$table->string('product_img_name');
			$table->text('product_desc');
			$table->decimal('price');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations....
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
