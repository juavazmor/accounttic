<?php

class Payment extends Eloquent 
{
	public static $rules = array(
		"concept" => "required",
		"amount" => "required|numeric",
		);

	public static $messages = array(
		"required" => "The :attribute field is required",
		"numeric" => "The :attribute field only accepts numeric input"
		);

	public function job()
	{
		return $this->belongs_to('Job');
	}

	public static function validate_post( $input )
	{
		$v = Validator::make($input, static::$rules, static::$messages);

		return $v->fails()
				? $v
				: false;
	} 

	public function account()
	{
		return $this->belongs_to('Account');
	}

	public function method()
	{
		return $this->belongs_to('Method', 'payment_method_id');
	}
}