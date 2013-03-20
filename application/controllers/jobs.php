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

	public function get_remove($id) {
		$job = Job::find($id);

		$job->delete();

		return Redirect::to_route('jobs');
	}
}