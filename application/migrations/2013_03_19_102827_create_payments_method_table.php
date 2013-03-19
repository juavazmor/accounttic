<?php

class Create_Payments_Method_Table {    

	public function up()
    {
		Schema::create('method', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('method');

    }

}