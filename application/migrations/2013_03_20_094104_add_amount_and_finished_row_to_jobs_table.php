<?php

class Add_Amount_And_Finished_Row_To_Jobs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("jobs", function($table) {
			$table->boolean('finished')->default(0);
			$table->float('amount');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("jobs", function($table) {
			$table->drop_column('finished');
			$table->drop_column('amount');
		});
	}

}