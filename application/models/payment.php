<?php

class Payment extends Eloquent 
{
	public function job()
	{
		return $this->belongs_to('Job');
	}

	public function payment_method()
	{
		return $this->belongs_to('Payment_Methods', 'payment_method_id');
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