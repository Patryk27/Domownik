<?php

use Illuminate\Database\Schema\Blueprint;

class CreateTransactionCategoriesTable
	extends Migration {

	/**
	 * @return void
	 */
	public function up() {
		$this->schemaBuilder->create('transaction_categories', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('parent_category_id')->nullable();
			$table->char('name', 128);
			$table->timestamps();

			$table->foreign('parent_category_id')->references('id')->on('transaction_categories')->onDelete('cascade');
		});
	}

	/**
	 * @return void
	 */
	public function down() {
		$this->schemaBuilder->disableForeignKeyConstraints();
		$this->schemaBuilder->dropIfExists('transaction_categories');
		$this->schemaBuilder->enableForeignKeyConstraints();
	}

}
