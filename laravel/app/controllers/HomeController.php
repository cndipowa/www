<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
public $restful = true;
public $layout = 'layouts.default';

	public function showWelcome()
	{
		$view = View::make('hello');
		$this->layout->content = $view;
		$this->layout->title = 'Test Title';
		$this->layout->test1 ='this is test 1';
		$this->layout->test2 = 'this is test 2'; 
	}

}
