<?php

class User extends Eloquent 
{
	
	public function account()
	{
		return $this->has_one('Account');
	}
}