<?php

class Add_Budget_Column_To_Jobs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("jobs", function($table) {
			$table->string("budget");
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
			$table->drop_column("budget");
		});
	}

}