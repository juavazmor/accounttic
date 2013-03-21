<?php

class Job extends Eloquent 
{

	public static $rules = array(
		'client_id' => 'required',
		'name'		=> 'required',
		'amount'	=> 'required|numeric',
		'deadline'  => 'required'
	);

	public static $messages   = array(
		'required' 	=> 'The :attribute field is required.',
		'numeric'	=> 'This value must be numeric.',
		'client_id_required' => 'You must provide a client.'
	);


	public static function validate_post($input) 
	{
		$v = Validator::make( $input, static::$rules, static::$messages );

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