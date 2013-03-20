<?php

class Delete_Account_Id_Column_On_User_Table {    

	public function up()
    {
		Schema::table('users', function($table) {
			$table->drop_column('account_id');
	});

    }

	public function down()
    {
		Schema::table('users', function($table)
		{
			$table->integer('account_id');
		});

	}
}