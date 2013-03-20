<?php

class Users_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
    {
        $users = User::get();
        return View::make('user.index')
                ->with('users', $users);
    }

	public function post_create()
    {
        $name = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');

        $validation = User::validate( array('name' => $name, 'email' => $email, 'password' => $password) );

        if ( $validation !== false ) {
            return View::make('user.new')
                        ->with('old_inputs', Input::all())
                        ->with_errors($validation->errors);
        }

        $user = User::create(array(
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
            ));

        $account = new Account( array(
            'user_id'   => $user->id,
            'name'      => $user->name
            ));

        $account->save();

        return Redirect::to_route('users');
    }

	// public function get_show($id)
 //    {
 //        $user = User::find($id);
 //        return View::make('user.show');
 //    }

	public function get_edit($id)
    {
        $user = User::find($id);

        if ( !$user ) return Redirect::to('users');

        return View::make('user.edit')
                ->with('user', $user);
    }

	public function get_new($old_inputs = '')
    {
        return View::make('user.new')->with('old_inputs', $old_inputs );
    }


	public function put_update($id)
    {
        $user = User::find($id);

        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make( Input::get('password') );

        if ( $user->save() )
            return Redirect::to_route('users');
    }

	public function delete_destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return Redirect::to_route('users');
    }

}