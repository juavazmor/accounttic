<?php

class Add_File_Field_To_Costs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('costs', function( $table )
			{
				$table->string('file');
			});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop_column('costs');
	}

}