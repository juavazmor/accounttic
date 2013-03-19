<?php

class Payment extends Eloquent 
{
	// public $includes = array('job', 'account', 'method');

	public function job()
	{
		return $this->belongs_to('Job');
	}



	public function account()
	{
		return $this->belongs_to('Account');
	}

	public function method()
	{
		return $this->belongs_to('Method', 'payment_method_id');
	}
}