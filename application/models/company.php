<?php

class Company extends Eloquent 
{
	public static $table = 'companies';

	public function owner()
	{
		return $this->belongs_to('Client');
	}
}