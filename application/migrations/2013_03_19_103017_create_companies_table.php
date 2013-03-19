<?php

class Create_Companies_Table {    

	public function up()
    {
		Schema::create('companies', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('CIF')->unique();
			$table->string('address');
			$table->string('phone');
			$table->integer('client_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('company');

    }

}