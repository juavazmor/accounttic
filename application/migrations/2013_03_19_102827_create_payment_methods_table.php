<?php

class Create_Payment_Methods_Table {    

	public function up()
    {
		Schema::create('payment_methods', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('payment_methods');

    }

}