<?php

class Account extends Eloquent 
{
	public function payments()
	{
		return $this->has_many('Payment');
	}
}