<?php

class Jobs_Controller extends Base_Controller
{
	public $restful = true;

	public function get_index() {

		$jobs = Job::with(array('client'))->get();

		return View::make('job.index')
			->with(array(
				"jobs" => $jobs,
				"sum" => 0
			)
		);

	}

	public function get_new() {
		$clients = Client::get();
		return View::make('job.new')
			->with("clients", $clients);
	}

	public function get_remove($id) {

		$job = Job::find($id);
		$job->delete();

		return Redirect::to_route('jobs');
	}

	public function post_create() {
		$job_name	 = Input::get('name');
		$client_id 	 = Input::get('client');
		$amount		 = Input::get('amount');
		$finished	 = Input::get('finished');
		$deadline 	 = Input::get('deadline');

		$job = Job::create(array(
			"name" => $job_name,
			"client_id" => $client_id,
			"finished" => $finished,
			"amount" => $amount,
			"deadline" => $deadline
		));

		return Redirect::to_route("jobs");
	}
}