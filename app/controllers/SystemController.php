<?php

class SystemController extends \BaseController {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function dashboard(){
		$this->data['courses'] = Course::all();
		$this->data['tags'] = Tag::all();
		return View::make('dashboard', $this->data);
	}

	public function references(){
		return View::make('references');
	}

	public function about(){
		return View::make('about');
	}

	public function report(){
		//if(Input::get('course')!=NULL){
			//$this->data['histories'] = History::where('user_id', Auth::user()->id)->where('course_id', Input::get('course'))->orderBy('material_id')->get();
		//}else{
		$this->data['histories'] = History::where('user_id', Auth::user()->id)->orderBy('material_id')->get();
	//	}
		$course  = Course::all();
		$this->data['option'] = array();
		foreach ($course as $c) {
			$string = "<option value=\"".$c->id."\">".$c->name."</option>";
			array_push($this->data['option'], $string);
		}
		return View::make('reports', $this->data);
	}
}