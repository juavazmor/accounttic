<?php

class Payments_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		$payments = Payment::with(array('job', 'account', 'method'))->get();

		return View::make('home.index')
			->with("payments", $payments);
	}
}
