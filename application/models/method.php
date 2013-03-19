<?php

class Method extends Eloquent 
{
	public static $table = 'payment_methods';

	public function payments()
	{
		return $this->has_many('Payment', 'payment_id');
	}
}