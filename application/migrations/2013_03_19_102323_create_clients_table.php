<?php

class Create_Clients_Table {    

	public function up()
    {
		Schema::create('clients', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->int('company_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('clients');

    }

}