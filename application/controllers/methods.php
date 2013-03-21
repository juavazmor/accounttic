<?php

class Methods_Controller extends Base_Controller
{
	public $restful = true;

	public function get_index() {
		$methods = Method::get();
		return View::make('method.index')
				->with("methods", $methods);
	}

	public function get_edit( $id ) {
		$method = Method::find($id);

		return View::make('method.edit')
				->with(array(
					"method" => $method));
	}

	public function get_new( $old_inputs = '' ) {
		return View::make('method.new')
				->with('old_inputs', $old_inputs);
	}

	public function post_create() {

		$name = Input::get('name');

		//Validation

		$validation = Method::validate_post(Input::all());

		if ( $validation !== false )
		{
			return View::make('method.new')
					->with('old_inputs', Input::all())
					->with_errors($validation->errors);
		}

		$method = Method::create(array(
			'name' => $name
			)
		);

		if ($method)
			return Redirect::to_route('methods');
	}

	public function put_update( $id )
	{
        $method = Method::find($id);

        $name = Input::get('name');

        $validation = Method::validate_post( array('name' => $name) );

        if ( $validation !== false ) {

            return View::make('method.edit')
                        ->with('method', $method)
                        ->with_errors($validation->errors);
        }

        $method->name = $name;

        if ( $method->save() )
            return Redirect::to_route('methods');
	}

	public function get_remove( $id )
	{
		$method = Method::find( $id );
		$method->delete();

		return Redirect::to_route('methods');
	}
}