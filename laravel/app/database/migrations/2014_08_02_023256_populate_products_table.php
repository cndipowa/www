<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			DB::table('products')->insert(array(

			'product_code'=>'PD1001',
			'product_name'=>'Android Phone FX1',
			'product_img_name'=>'Di sertakan secara rambang yang lansung tidak munasabah. Jika anda ingin menggunakan Lorem Ipsum, anda perlu memastikan bahwa tiada apa yang',
			'product_desc'=>'android-phone.jpg',
			'price'=>200.50,
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')

		));

			DB::table('products')->insert(array(

			'product_code'=>'PD1002',
			'product_name'=>'Android Phone FX1',
			'product_img_name'=>'Di sertakan secara rambang yang lansung tidak munasabah. Jika anda ingin menggunakan Lorem Ipsum, anda perlu memastikan bahwa tiada apa yang',
			'product_desc'=>'android-phone.jpg',
			'price'=>200.50,
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')

		));

			DB::table('products')->insert(array(

			'product_code'=>'PD1003',
			'product_name'=>'External Hard Disk',
			'product_img_name'=>'Di sertakan secara rambang yang lansung tidak munasabah. Jika anda ingin menggunakan Lorem Ipsum, anda perlu memastikan bahwa tiada apa yang',
			'product_desc'=>'external-hard-disk.jpg',
			'price'=>2100.50,
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')

		));


			DB::table('products')->insert(array(

			'product_code'=>'PD1004',
			'product_name'=>'Wrist Watch GE2',
			'product_img_name'=>'Di sertakan secara rambang yang lansung tidak munasabah. Jika anda ingin menggunakan Lorem Ipsum, anda perlu memastikan bahwa tiada apa yang',
			'product_desc'=>'wrist-watch.jpg',
			'price'=>450.50,
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')

		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('products')->delete(1);
		DB::table('authors')->delete(2);
		DB::table('authors')->delete(3);
	    DB::table('authors')->delete(4);
	}

}
