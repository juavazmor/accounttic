<?php

class Jobs_Controller extends Base_Controller
{
	public $restful = true;

	public function get_index() {

		$jobs = Job::with(array('client'))->get();

		return View::make('job.index')->with(array("jobs" => $jobs));

	}
}