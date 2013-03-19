<?php

class Payments_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		$payments = Payment::with(array('job', 'account', 'method'))->first();
		dd($payments);
		return View::make('home.index')
			->with("payments", $payments);
	}
}
