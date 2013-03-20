<?php

class Accounts_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
    {
        $accounts = Account::get();

        return View::make('account.index')
                    ->with('accounts', $accounts);
    }

	public function post_create()
    {
        $name = Input::get('name');

        $validation = Account::validate_post( array('name' => $name) );

        if ( $validation !== false ) {
            return View::make('account.new')
                        ->with('old_inputs', Input::all())
                        ->with_errors($validation->errors);
        }

        $account = Account::create(array(
            'name' => $name,
            ));


        return ( $account ) ? Redirect::to_route('accounts') : 'Hubo un error creando la account';
    }

	public function get_show()
    {

    }    

	public function get_edit($id)
    {
        $account = Account::find($id);

        if ( !$account ) return Redirect::to('accounts');

        return View::make('account.edit')
                ->with('account', $account);
    }    

	public function get_new($old_inputs = '')
    {
        return View::make('account.new')->with('old_inputs', $old_inputs );
    }    

	public function put_update($id)
    {
        $account = Account::find($id);

        $name = Input::get('name');

        $validation = Account::validate_put( array('name' => $name), $id );

        if ( $validation !== false ) {

            return View::make('account.edit')
                        ->with('account', $account)
                        ->with_errors($validation->errors);
        }

        $account->name = $name;

        if ( $account->save() )
            return Redirect::to_route('accounts');
    }

	public function delete_destroy()
    {

    }

    public function get_remove($id) {
        $account = Account::find($id);

        $account->delete();

        return Redirect::to_route('accounts');
    }

}