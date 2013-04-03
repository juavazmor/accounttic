<?php

class Cost extends Eloquent 
{

	public static $rules = array
	(
		"concept" => "required",
		"amount" => "required|numeric",
		'paymentdate' => 'required'
	);

	public static $messages = array
	(
		"required" => "The :attribute field is required",
		"numeric" => "The :attribute field only accepts numeric input"
	);

	public function user() {
		return $this->belongs_to('User');
	}

	public static function validate_post( $input ) {

		$v = Validator::make( $input, static::$rules, static::$messages );

		return $v->fails() 
					? $v
					: false;
	}
}