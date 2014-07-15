<?php

class CoursesController extends \BaseController {

	public function __construct(){
		parent::__construct();
	}
	/**
	 * Display a listing of the resource.
	 * GET /courses
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['courses'] = Course::all();
		return View::make('courses.index', $this->data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /courses/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('courses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /courses
	 *
	 * @return Response
	 */
	public function store()
	{
		Eloquent::unguard();
		$course = Course::create(array('name'=>Input::get('name'), 'description'=>Input::get('description'), 'color'=>Input::get('background')));
		$file = Input::file('image');
		$destination = 'uploads/course/'.$course->id.'/images/';
		$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
		$upload = $file->move($destination, $filename);
		if($upload){
			$course->image = $filename;
		}
		$course->save();

		return Redirect::to('courses');
	}

	/**
	 * Display the specified resource.
	 * GET /courses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->data['course'] = Course::find($id);
		return View::make('courses.show', $this->data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /courses/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['course'] = Course::find($id);
		return View::make('courses.edit', $this->data);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /courses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$course = Course::find($id);
		$course->name = Input::get('name');
		$course->description = Input::get('description');
		

		if(Input::hasFile('image')){
			$file = Input::file('image');
			$destination = 'uploads/course/'.$course->id.'/images/';
			$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
			$upload = $file->move($destination, $filename);
			$course->color = Input::get('background');
			if($upload){
				$course->image = $filename;
			}
		}
		$course->save();

		return Redirect::to('courses');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /courses/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function enroll($id){
		$user = Auth::user();
		$courses = Course::find($id);
		$materials = Material::where('course_id', $id)->get();
		$user->courses()->attach($courses->id);

		foreach ($materials as $material) {
			$user->materials()->attach($material->id);
		}

		return Redirect::to('courses/'.$id.'/materials/1');
	}
}