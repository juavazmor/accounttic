<?php

class Create_Jobs_Table {    

	public function up()
    {
		Schema::create('jobs', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->date('deadline');
			$table->boolean('finished')->default(0);
			$table->float('amount');
			$table->integer('client_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('jobs');

    }

}