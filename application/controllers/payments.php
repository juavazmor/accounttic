<?php

class Payments_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		$payments = Payment::with('job')->all();
		//dd($payments->job->client);
		return View::make('home.index')
			->with("payments", $payments);
	}
}
