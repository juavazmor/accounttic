<?php

class User extends Eloquent 
{
	public static $rules = array(
		'name' 		=> 'required|alpha|min:3',
		'email' 	=> 'required|email|unique:users',
		'password' 	=> 'required'
		);

	public static $messages = array(
		'unique'	=> 'The :attribute already exists',
		'required' 	=> 'The :attribute field is required',
		'alpha'		=> 'The name only can have leters',
		'email'		=> 'The email must be a valid one',
		'min'		=> 'The :attribute must be greather than :min'
		);

	public static function validate($input)
	{
		$v = Validator::make( $input, static::$rules, static::$messages );

		return $v->fails()
					? $v
					: false;
	}

	public function account()
	{
		return $this->has_one('Account');
	}
}