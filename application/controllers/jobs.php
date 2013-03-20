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
			->with(array(
				"clients" => $clients,
				"old_inputs" => ''
				)
			);
	}

	public function get_remove($id) {

		$job = Job::find($id);
		$job->delete();

		return Redirect::to_route('jobs');
	}

	public function get_edit( $id ) {
		$clients = Client::get();
		$job = Job::find($id);

		if (!$job)	return Rediret::to('jobs');

		return View::make('job.edit')
				->with(array(
					"old_inputs" => null,
					"clients" => $clients,
					"job" => $job
					));
	}

	public function post_create() {

		$job_name	 = Input::get('name');
		$client_id 	 = Input::get('client');
		$amount		 = Input::get('amount');
		$finished	 = (Input::get('finished') == 1) ? 1 : 0;
		$deadline 	 = new DateTime(Input::get('deadline'));

		$validation  = Job::validate_post( array(
				'name' 	 	=> $job_name,
				'amount' 	=> $amount,
				'deadline' 	=> $deadline) 
		);
		
		if ( $validation !== false ) {
			$clients = Client::get();
			return View::make('job.new')
					->with(array(
						'old_inputs' => Input::all(),
						'clients' 	 => $clients
						)
					)
					->with_errors($validation->errors);
		} 

		$job = Job::create(array(
			"name" => $job_name,
			"client_id" => $client_id,
			"finished" => $finished,
			"amount" => $amount,
			"deadline" => $deadline
		));

		return Redirect::to_route("jobs");
	}

	public function put_update($id) {

		$job = Job::find($id);

		$job_name	 = Input::get('name');
		$client_id 	 = Input::get('client');
		$amount		 = Input::get('amount');
		$finished	 = (Input::get('finished') == 1) ? 1 : 0;
		$deadline 	 = new DateTime(Input::get('deadline'));

		$validation  = Job::validate_post( array(
				'name' 	 	=> $job_name,
				'amount' 	=> $amount,
				'deadline' 	=> $deadline) 
		);

        if ( $validation !== false ) {

			return View::make('job.new')
					->with(array(
						'old_inputs' => Input::all(),
						'clients' 	 => $clients
						)
					)
					->with_errors($validation->errors);
        }

        $job->name = $job_name;
        $job->client_id = $client_id;
        $job->amount = $amount;
        $job->finished = $finished;
        $job->deadline =$deadline;

        if ( $job->save() )
            return Redirect::to_route('jobs');
	}
}