<?php

class Method extends Eloquent 
{
	public static $table = 'payment_methods';

	public static $rules = array(
		'name' => 'required'
		);

	public static $message = array(
		'required' => 'The :attribute field is required'
		);

	public static function validate_post($input) {
		$v = Validator::make( $input, static::$rules, static::$message);

		return $v->fails()
				? $v
				: false;
	}

	public function payments()
	{
		return $this->has_many('Payment', 'payment_id');
	}
}