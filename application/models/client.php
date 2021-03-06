<?php

class Client extends Eloquent 
{
	public static $rules = array(
		'name' 		=> 'required|min:3',
		'email' 	=> 'email|unique:clients'
		);

	public static $messages = array(
		'unique'		=> 'The :attribute already exists',
		'required' 		=> 'The :attribute field is required',
		'email'			=> 'The email must be a valid one',
		);

	public static function validate_post($input)
	{
		$v = Validator::make( $input, static::$rules, static::$messages );

		return $v->fails()
					? $v
					: false;
	}

	public static function validate_put($input, $id)
	{

		$rules_put = static::$rules;
		$rules_put['email'] = $rules_put['email'] . ',email,' . $id;

		$v = Validator::make( $input, $rules_put, static::$messages );

		return $v->fails()
					? $v
					: false;
	}

	public function jobs()
	{
		return $this->has_many('Job');
	}
}