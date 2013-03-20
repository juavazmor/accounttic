<?php

class Change_Job_Name_In_Jobs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobs', function($table) {
			$table->drop_column('job');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobs', function($table) {
			$table->string('name');
		});
	}

}