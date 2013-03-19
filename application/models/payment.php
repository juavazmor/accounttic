<?php

class Payment extends Eloquent 
{
	public function job()
	{
		return $this->belongs_to('Job');
	}

	public function payment_method()
	{
		return $this->has_one('Payment_Methods');
	}

	public function account()
	{
		return $this->belongs_to('Account');
	}
}