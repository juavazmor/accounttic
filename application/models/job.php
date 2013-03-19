<?php

class Job extends Eloquent 
{
	public function client()
	{
		return $this->belongs_to('Client');
	}

	public function payments()
	{
		return $this->has_many('Payment');
	}
}