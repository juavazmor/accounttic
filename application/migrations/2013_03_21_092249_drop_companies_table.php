<?php

class Drop_Companies_Table {    

	public function up()
    {
		Schema::drop('companies');
	}

	public function down()
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

}