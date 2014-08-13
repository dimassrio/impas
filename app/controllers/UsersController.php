<?php

class UsersController extends \BaseController {

	public function __construct(){
		parent::__construct();
	}
	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check()){
			if(Auth::user()->level>0){
			return Redirect::intended('dashboard');
		}else{
			$this->data['users'] = User::all();
			return View::make('users.index', $this->data);
		}
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("users.create");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$users = new User;
		$users->name = Input::get('name');
		$users->username = Input::get('username');
		$users->password = Hash::make(Input::get('password'));
		$users->email = Input::get('email');
		$users->level = 2;
		$users->save();

		return Redirect::to('/');
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['user'] = User::find($id);
		return View::make('users.edit', $this->data);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$users = User::find($id);
		$users->name = Input::get('name');
		$users->username = Input::get('username');
		$users->email = Input::get('email');
		$users->save();

		return Redirect::to('users');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		return Redirect::to('users');
	}

	public function login(){
		if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))){
		    return Redirect::intended('dashboard');
		}else{
			return Redirect::intended('/')->with('messages', 'Sorry, we can\'t found your account. Perhaps you put the wrong username or mispelling something?');
		}
	}

	public function logout(){
		if(Auth::check()){
			Auth::logout();
		}
		return Redirect::intended('/');
	}

}