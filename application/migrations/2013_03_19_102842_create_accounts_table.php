<?php

class Create_Accounts_Table {    

	public function up()
    {
		Schema::create('accounts', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('accounts');

    }

}