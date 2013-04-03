<?php

class Create_Costs_Table {    

	public function up()
    {
		Schema::create('costs', function($table) {
			$table->increments('id');
			$table->string('concept');
			$table->float('amount');
			$table->integer('user_id');
			$table->date('paydate');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('costs');

    }

}