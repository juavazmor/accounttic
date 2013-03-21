<?php

class Payments_Controller extends Base_Controller {

	public $restful = true;

	public function get_index() {
		$payments = Payment::with(array('job', 'account', 'method'))->get();

		return View::make('home.index')
			->with("payments", $payments);
	}

	public function get_new() {
		$jobs	 = Job::get();
		$methods = Method::get();
		$accounts = Account::get();

		if ( count($methods) == 0 )
			return View::make('error.500');

		return View::make('home.new')
			->with(array(
				'jobs' => $jobs,
				'methods' => $methods,
				'accounts' => $accounts
				)
			);
	}

	public function get_edit( $id ) {

		$payment = Payment::find($id);

		$jobs	 = Job::get();
		$methods = Method::get();
		$accounts = Account::get();

		return View::make('home.edit')
			->with(array(
				'jobs' => $jobs,
				'methods' => $methods,
				'accounts' => $accounts,
				'payment' => $payment
				)
			);
	}

	public function post_create() {

		$concept	= Input::get('concept');
		$amount		= Input::get('amount');
		$is_paid	= ( Input::get('ispaid') == 1 ) ? 1 : 0;

		$payment_date = ( $is_paid == 1 ) ? new DateTime(Input::get('deadline')) : '';
		$job 		= Input::get('job');
		$method 	= Input::get('method');
		$account 	= Input::get('account');

		$validation = Payment::validate_post( array(
       		'concept' => $concept,
       		'amount'  => $amount
       		) 
        );

        if ( $validation !== false ) {
        	/* Flash input */
        	Input::flash();
            return Redirect::to_route('new_payment')
            	->with_input()
            	->with_errors($validation->errors);
        }

		$new_payment = Payment::create(array(
				'concept' => $concept,
				'amount'  => $amount,
				'is_paid' => $is_paid,
				'payment_date' => $payment_date,
				'job_id'  => $job,
				'payment_method_id' => $method,
				'account_id' => $account
			)
		);

		if ( $new_payment )
			return Redirect::to_route('payments');

	}

	public function put_update( $id ) {

		$payment = Payment::find($id);

        $concept	= Input::get('concept');
		$amount		= Input::get('amount');
		$is_paid	= ( Input::get('ispaid') == 1 ) ? 1 : 0;

		$payment_date = ( $is_paid == 1 ) ? new DateTime(Input::get('deadline')) : '';
		$job 		= Input::get('job');
		$method 	= Input::get('method');
		$account 	= Input::get('account');

        $validation = Payment::validate_post( array(
       		'concept' => $concept,
       		'amount'  => $amount
       		) 
        );

        if ( $validation !== false ) {

            return Redirect::to_route('edit_payment', array('id' => $id))
            	->with_errors($validation->errors);
        }

        $payment->concept = $concept;
        $payment->amount  = $amount;
        $payment->is_paid = $is_paid;
        $payment->payment_date = $payment_date;
        $payment->job_id  = $job;
        $payment->payment_method_id = $method;
        $payment->account_id = $account;


        if ( $payment->save() )
            return Redirect::to_route('payments');
	}

	public function get_remove( $id ) {
		$payment = Payment::find($id);
		if ( $payment->delete() )
			return Redirect::to_route('payments');

	}
}
