<?php

class Client extends Eloquent 
{
	public function company()
	{
		return $this->has_one('Company', 'company_id');
	}

	public function jobs()
	{
		return $this->has_many('Job');
	}
}