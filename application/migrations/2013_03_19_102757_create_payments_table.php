<?php

class Create_Payments_Table {    

	public function up()
    {
		Schema::create('payments', function($table) {
			$table->increments('id');
			$table->string('concept');
			$table->float('amount');
			$table->boolean('is_paid');
			$table->date('payment_date');
			$table->integer('job_id');
			$table->integer('payment_method');
			$table->integer('account_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('payments');

    }

}