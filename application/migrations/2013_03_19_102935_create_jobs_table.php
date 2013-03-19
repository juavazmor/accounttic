<?php

class Create_Jobs_Table {    

	public function up()
    {
		Schema::create('jobs', function($table) {
			$table->increments('id');
			$table->string('job');
			$table->date('deadline');
			$table->int('client_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('jobs');

    }

}