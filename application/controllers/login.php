<?php

class Login_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
    {
        return View::make('login');
    }

	public function post_authenticate()
    {
        $credentials = array(
            'username'     => Input::get('email'),
            'password'  => Input::get('password')
            );

        $validate = Validator::make(
            array( 'email' => Input::get('email'), 'password' => Input::get('password') ),
            array( 'email' => 'required|email|exists:users,email', 'password' => 'required' )
            );

        if ( $validate->fails() )

            return Redirect::to_route('login')
                        ->with_errors($validate->errors);

        if ( Auth::attempt($credentials) ) {
            return Redirect::to('/');
        } else {
            $errors = new Laravel\Messages( array('password' => 'The password doesn\'t match') );
            return Redirect::to_route('login')
                        ->with_errors($errors);
        }

        return Redirect::to('login');
    }

    public function get_logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}