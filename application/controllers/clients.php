<?php

class Clients_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
    {
        $clients = Client::get();
        return View::make('client.index')
                ->with('clients', $clients);
    }

	public function post_create()
    {
        $name = Input::get('name');
        $email = Input::get('email');
        $phone = Input::get('phone');

        $validation = Client::validate_post( array('name' => $name, 'email' => $email, 'phone' => $phone) );

        if ( $validation !== false ) {
            return View::make('client.new')
                        ->with('old_inputs', Input::all())
                        ->with_errors($validation->errors);
        }

        $client = Client::create(array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
            ));


        return ( $client ) ? Redirect::to_route('clients') : 'Hubo un error creando el cliente';
    }

	// public function get_show()
 //    {

 //    }    

	public function get_edit($id)
    {
        $client = Client::find($id);

        if ( !$client ) return Redirect::to('clients');

        return View::make('client.edit')
                ->with('client', $client);
    }

	public function get_new($old_inputs = '')
    {
        return View::make('client.new')->with('old_inputs', $old_inputs );
    }

	public function put_update($id)
    {
        $client = Client::find($id);

        $name = Input::get('name');
        $email = Input::get('email');
        $phone = Input::get('phone');


        $validation = client::validate_put( array('name' => $name, 'email' => $email, 'phone' => $phone), $id );

        if ( $validation !== false ) {

            return View::make('client.edit')
                        ->with('client', $client)
                        ->with_errors($validation->errors);
        }

        $client->name = $name;
        $client->email = $email;
        $client->phone = $phone;

        if ( $client->save() )
            return Redirect::to_route('clients');
    }

	// public function delete_destroy()
 //    {

 //    }

    public function get_remove($id) {
        $client = Client::find($id);

        $client->delete();

        return Redirect::to_route('clients');
    }
}