<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupplierProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('supplier_products', function(Blueprint $table)
		{
			$table->foreign('product_id', 'fk_supplier_products_products1')->references('id')->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('supplier_id', 'fk_supplier_products_suppliers1')->references('id')->on('suppliers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('supplier_products', function(Blueprint $table)
		{
			$table->dropForeign('fk_supplier_products_products1');
			$table->dropForeign('fk_supplier_products_suppliers1');
		});
	}

}
