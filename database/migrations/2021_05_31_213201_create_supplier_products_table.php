<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('product_id')->index('fk_supplier_products_products1_idx');
			$table->integer('supplier_id')->index('fk_supplier_products_suppliers1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supplier_products');
	}

}
