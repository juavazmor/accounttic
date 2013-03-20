<?php

class Job extends Eloquent 
{

	public static $validation = array(
		'name'		=> 'required',
		'amount'	=> 'required|numeric',
		'deadline'  => 'required'
	);

	public static $messages   = array(
		'required' 	=> 'The :attribute field is required.',
		'numeric'	=> 'This value must be numeric.'
	);


	public function validate_post($input) 
	{
		$v = Validator::make($input, static::$validation, static::$messages);

		return $v->fails() 
				? $v
				: false;
	}

	public function client()
	{
		return $this->belongs_to('Client');
	}

	public function payments()
	{
		return $this->has_many('Payment');
	}
}