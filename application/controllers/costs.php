<?php

class Costs_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
        $costs = Cost::with( array('user') )->get();

        return View::make('cost.index') 
            ->with("costs", $costs);
    }    

	public function post_index()
    {

    }    

	public function get_show()
    {

    }  

    public function post_create() {

        $concept = Input::get('concept');
        $amount  = Input::get('amount');
        $paid_by = Input::get('paidby');
        $payment_date = new DateTime( Input::get('paymentdate') );
        $file    = Input::file('file');

        $validation = Cost::validate_post( array(
            'concept' => $concept,
            'amount'  => $amount,
            'paymentdate'  => $payment_date
            ) 
        );

        if ( $validation !== false ) {
            /* Flash input */
            Input::flash();

            dd($validation->errors);
            return Redirect::to_route('new_cost')
                ->with_input()
                ->with_errors($validation->errors);
        }

        /* Upload file */
        if ( $file['name'] != '' ) 
        {
            $is_uploaded = Input::upload( 'file', Config::get('application.upload_path'), $file['name']);
            $filename = $file['name'];

        } 
        else
            $filename = '';


        $new_cost = Cost::create(array(
                'concept' => $concept,
                'amount'  => $amount,
                'user_id' => $paid_by,
                'file' => $filename
            )
        );

        if ( $new_cost )
            return Redirect::to_route('costs');       

    } 

    public function put_update( $id ) {

        $cost = Cost::find($id);

        $concept    = Input::get('concept');
        $amount     = Input::get('amount');
        $paid_by    = Input::get('paidby');
        $paydate    = new DateTime(Input::get('paymentdate'));
        $file       = Input::file('file');

        $validation  = Cost::validate_post( array(
                'concept' => $concept,
                'amount'    => $amount,
                'paymentdate'  => $paydate
            ) 
        );

        if ( $validation !== false ) {
            return Redirect::to_route('edit_cost', array('id' => $id) )
                    ->with_errors($validation->errors);
        }
        if ( $file['name'] != '' )
            $is_uploaded = Input::upload( 'file', Config::get('application.upload_path'), $file['name']);

        $cost->concept = $concept;
        $cost->user_id = $paid_by;
        $cost->amount = $amount;
        $cost->paydate = $paydate;

        if ( $file['name'] != '' )
            $cost->file = $file['name'];

        if ( $cost->save() )
            return Redirect::to_route('costs');
    }

	public function get_edit( $id )
    {
        $users = User::get();
        $cost  = Cost::find( $id );
        return View::make('cost.edit')
            ->with( 
                array(
                    'users' => $users,
                    'cost'  => $cost
                )
            );

    }

    public function get_remove( $id ) {

        $cost = Cost::find( $id );

        if ( $cost->delete() )
            return Redirect::to_route('costs');

    }    

	public function get_new()
    {
        $users = User::get();

        return View::make('cost.new')
            ->with('users', $users);
    }      

	public function delete_destroy()
    {

    }

}