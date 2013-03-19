<?php

class Create_Company_Table {    

	public function up()
    {
		Schema::create('company', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('CIF')->unique();
			$table->string('address');
			$table->string('phone');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('company');

    }

}