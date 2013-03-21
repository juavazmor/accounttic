<?php

class Delete_Company_Id_Column_On_Clients_Table {    

	public function up()
    {
		Schema::table('clients', function($table) {
			$table->drop_column('company_id');
	});

    }    

	public function down()
    {
		Schema::table('clients', function($table) 
		{
			$table->integer('company_id');
		});
	}

}