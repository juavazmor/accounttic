<?php

class Account extends Eloquent 
{
	public static $rules = array(
		'name' 		=> 'required|min:3'
		);

	public static $messages = array(
		'required' 	=> 'The :attribute field is required',
		'min'		=> 'The :attribute must be greater than :min'
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
		$rules_put['name'] = $rules_put['name'] . ',name,' . $id;

		$v = Validator::make( $input, $rules_put, static::$messages );

		return $v->fails()
					? $v
					: false;
	}

	public function payments()
	{
		return $this->has_many('Payment');
	}
}