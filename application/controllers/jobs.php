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
		return View::make('job.new');
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
	}
}