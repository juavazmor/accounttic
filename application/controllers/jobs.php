<?php

class Jobs_Controller extends Base_Controller
{
	public $restful = true;

	public function get_index() {

		$jobs = Job::with(array('client'))->get();

		return View::make('job.index')
			->with(array(
				"jobs" => $jobs
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
		$deadline 	 = Input::get('deadline');
		$budget 	 = Input::file('budget');


		$validation  = Job::validate_post( array(
				'client_id' => $client_id,
				'name' 	 	=> $job_name,
				'amount' 	=> $amount,
				'deadline' 	=> $deadline,
				'budget' 	=> $budget
			) 
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

		/* Upload PDF File */
		if ( $budget['name'] != '' ) 
		{

        	$is_uploaded = $this->upload_budget( 'budget', $budget );
        	$budget_name = $budget['name'];

        } 
        else
        	$budget_name = '';
		


		$job = Job::create(array(
				"name" => $job_name,
				"client_id" => $client_id,
				"finished" => $finished,
				"amount" => $amount,
				"deadline" => new DateTime($deadline),
				"budget" => $budget_name
			)
		);

		return Redirect::to_route("jobs");
	}


	public function put_update( $id ) {

		$job = Job::find($id);

		$job_name	 = Input::get('name');
		$client_id 	 = Input::get('client');
		$amount		 = Input::get('amount');
		$finished	 = (Input::get('finished') == 1) ? 1 : 0;
		$deadline 	 = new DateTime(Input::get('deadline'));
		$budget 	 = Input::file('budget');

		$validation  = Job::validate_post( array(
				'client_id' => $client_id,
				'name' 	 	=> $job_name,
				'amount' 	=> $amount,
				'deadline' 	=> $deadline,
				'budget'	=> $budget
				) 
		);

        if ( $validation !== false ) {
			$clients = Client::get();
			return Redirect::to_route('edit_job', array('id' => $id) )
					->with_errors($validation->errors);
        }
        if ( $budget['name'] != '' )
        	$is_uploaded = $this->upload_budget( 'budget', $budget );

        $job->name = $job_name;
        $job->client_id = $client_id;
        $job->amount = $amount;
        $job->finished = $finished;
        $job->deadline =$deadline;

        if ( $budget['name'] != '' )
        	$job->budget = $budget['name'];

        if ( $job->save() )
            return Redirect::to_route('jobs');
	}

	public function upload_budget( $input_name, $file )
	{
		if ( !is_array($file) )
			die($file . ' must be an array');

		return Input::upload( $input_name, Config::get('application.upload_path'), $file['name']);
	}

}