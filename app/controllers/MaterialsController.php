<?php

class MaterialsController extends \BaseController {

	public function __construct(){
		parent::__construct();
	}	
	/**
	 * Display a listing of the resource.
	 * GET /materials
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['materials'] = Material::orderBy('course_id')->orderBy('order')->get();
		return View::make('materials.index', $this->data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /materials/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('materials.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /materials
	 *
	 * @return Response
	 */
	public function store()
	{
		$material = new Material;
		$material->name = Input::get('name');
		$material->type = Input::get('type');
		$material->description = Input::get('description');
		if($material->type == 'exercise'){
			$file = Input::file('url');
			$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
			$destination = 'uploads/course/'.Input::get('course').'/exercise/';
			$upload = $file->move($destination, $filename);
			if($upload){
				$material->url = $filename;
			}
		}
		$material->course_id = Input::get('course');

		$order = Material::where('course_id', Input::get('course'))->orderBy('order','asc')->get()->last();
		if($order != NULL){
			$order = $order->order;
		}
		else{
			$order = 0;
		}

		$material->order = $order+1;
		$material->save();

		return Redirect::to('materials');
	}

	/**
	 * Display the specified resource.
	 * GET /materials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->data['material'] = Material::find($id);
		return View::make('material.show', $this->data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /materials/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['material'] = Material::find($id);
		return View::make('materials.edit', $this->data);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /materials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$material = Material::find($id);
		$material->name = Input::get('name');
		$material->description = Input::get('description');
		$material->type = Input::get('type');
		$cid = $material->course_id;
		if($material->type == 'exercise'){
			$file = Input::file('url');
			$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
			$destination = 'uploads/course/'.Input::get('course').'/exercise/';
			$upload = $file->move($destination, $filename);
			if($upload){
				$material->url = $filename;
			}
		}
		$material->course_id = Input::get('course');
		//$order = Material::where('course_id', Input::get('course'))->orderBy('order','asc')->get()->last()->order;
		//$material->order = $order++;
		$material->save();

		/*REORDER LAST COURSE*/
		/*$materials = Material::where('course_id', $cid)->orderBy('order', 'asc')->get();
		$count = 1;
		foreach ($materials as $m) {
			$m->order = $count;
			$m->save();
			$count++;
		}
*/
		return Redirect::to('materials');	
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /materials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$material = Material::find($id);
		$course = $material->course_id;
		$material->delete();

		$materials = Material::where('course_id', $course)->orderBy('order')->get();
		$count = 1;
		foreach ($materials as $m) {
			$m->order = $count;
			$m->save();
			$count++;
		}

		return Redirect::to('materials');
	}

	public function add($id){
		$this->data['material'] = Material::find($id);
		return View::make('materials.add', $this->data);
 	}

 	public function addBulk($id){
		$this->data['material'] = Material::find($id);
		return View::make('materials.bulks', $this->data);
 	}

 	public function addBulks($id){
 		if(Input::has('content')){
 			$content = new Content;
	 		$content->content = Input::get("content");
	 		$content->material_id = $id;
	 		$content->save();
 		}

 		if(Input::hasFile('pdf')){
 			$file = Input::file('pdf');
	 		if($file->getMimeType() == "application/pdf"){
	 			$pdfile = new Pdfile;
	 			$pdfile->name = Input::get('pdf_name');
	 			$material = Material::find($id);
				$destination = 'uploads/course/'.$material->course_id.'/'.$id.'/pdf/';
				$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
				$upload = $file->move($destination, $filename);
				if($upload){
					$pdfile->pdfile = $filename;
				}
	 			$pdfile->material_id = $id;
	 			$pdfile->save();
	 		}
 		}

 		if(Input::hasFile('audio')){
 			$file = Input::file('audio');
	 		if($file->getMimeType() == "audio/mpeg"){
	 			$audio = new Audio;
	 			$audio->name = Input::get('audio_name');
	 			$material = Material::find($id);
				$destination = 'uploads/course/'.$material->course_id.'/'.$id.'/audio/';
				$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
				$upload = $file->move($destination, $filename);
				if($upload){
					$audio->audio = $filename;
				}
	 			$audio->material_id = $id;
	 			$audio->save();
	 		}
 		}

 		if(Input::has('video')){
 			$video = new Video;
	 		$video->video = Input::get('video');
	 		$video->type = "youtube";
	 		$video->name = Input::get('video_name');
	 		$video->material_id = $id;
	 		$video->save();
 		}

 		if(Input::has('presentation')){
 			$presentation = new Presentation;
	 		$presentation->presentation = Input::get('presentation_name');
	 		$presentation->type = "onedrive";
	 		$presentation->name = Input::get('name');
	 		$presentation->material_id = $id;
	 		$presentation->save();
 		}
 		return Redirect::to('materials');
 	}

 	public function addContent($id){ 		
 		$content = new Content;
 		$content->content = Input::get("content");
 		$content->material_id = $id;
 		$content->save();
 		 return Redirect::to('materials');
 	}

 	public function addImage($id){
		$file = Input::file('images');
		$material = Material::find($id);
		$destination = 'uploads/course/'.$material->course_id.'/'.$id.'/images/';
		$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
		$upload = $file->move($destination, $filename);
		if($upload){
			$zip = new ZipArchive;
			$res = $zip->open($destination.$filename);
			if($res == TRUE){
				$zip->extractTo($destination);
				$zip->close();
				unlink($destination.$filename);
			}
		}
 		return Redirect::to('materials');
 	}
 	public function addPdf($id){
 		$file = Input::file('pdf');
 		if($file->getMimeType() == "application/pdf"){
 			$pdfile = new Pdfile;
 			$pdfile->name = Input::get('name');
 			$material = Material::find($id);
			$destination = 'uploads/course/'.$material->course_id.'/'.$id.'/pdf/';
			$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
			$upload = $file->move($destination, $filename);
			if($upload){
				$pdfile->pdfile = $filename;
			}
 			$pdfile->material_id = $id;
 			$pdfile->save();
 		}
 		return Redirect::to('materials');
 	}

 	public function addAudio($id){
 		$file = Input::file('audio');
 		if($file->getMimeType() == "audio/mpeg"){
 			$audio = new Audio;
 			$audio->name = Input::get('name');
 			$material = Material::find($id);
			$destination = 'uploads/course/'.$material->course_id.'/'.$id.'/audio/';
			$filename = date('dmy').str_random(12).'.'.$file->getClientOriginalExtension();
			$upload = $file->move($destination, $filename);
			if($upload){
				$audio->audio = $filename;
			}
 			$audio->material_id = $id;
 			$audio->save();
 		}
 		return Redirect::to('materials');
 	}

 	public function addVideo($id){
 		$video = new Video;
 		$video->video = Input::get('video');
 		$video->type = "youtube";
 		$video->name = Input::get('name');
 		$video->material_id = $id;
 		$video->save();

 		return Redirect::to('materials');
 	}

 	public function addPresentation($id){
 		$presentation = new Presentation;
 		$presentation->presentation = Input::get('presentation');
 		$presentation->type = "onedrive";
 		$presentation->name = Input::get('name');
 		$presentation->material_id = $id;
 		$presentation->save();

 		return Redirect::to('materials');
 	}

 	public function addExercise($id){
 		$exercise = new Exercise;
 		$exercise->content = Input::get('exercise');
 		$exercise->name = Input::get('name');
 		$exercise->material_id = $id;
 		$exercise->save();

 		return Redirect::to('materials');
 	}

 	public function showCourseMaterial($idc, $order="1"){

 		/*MATERIAL INITIALIZATION*/
		$this->data['material'] = Material::where('course_id', $idc)->where('order', $order)->get()->first();
		/*NAVIGATION*/
		$this->data['prev_material'] = Material::where('course_id', $idc)->where('order', $order-1)->get()->first();
 		$this->data['next_material'] = Material::where('course_id', $idc)->where('order', $order+1)->get()->first();

 		if($this->data['material']->type == 'content'){
 			/*CONTENT*/

			/*FEEDBACK*/
	 		$data['questionaire'] = array();
	 		$data['material'] = $this->data['material'];
	 		$category = QuestionCategory::all();
	 		foreach ($category as $c) {
	 			array_push($data['questionaire'], Question::where('question_categories_id', $c->id)->get());
	 		}
	 		return View::make('materials.order', $this->data)->nest('content', 'materials.order-content', $this->data)->nest('feedback', 'materials.order-feedback', $data);

 		}else if($this->data['material']->type == 'exercise' && $this->data['material']->url != NULL){
 			$url = $this->data['material']->url;
			$content = file_get_contents(asset('uploads/course').'/'.$this->data['material']->course->id.'/exercise/'.$url);
			$json = json_decode($content);
			$data['json'] = $json;
			$data['material'] = $this->data['material'];
			Session::flash('exercise', $json);
			if($json->content[0]->type == 'multiplechoice'){
 				return View::make('materials.order', $this->data)->nest('exercises', 'exercises.multiplechoice', $data);
 			}else if($json->content[0]->type =='dragdrop'){
 				return View::make('materials.order', $this->data)->nest('exercises', 'exercises.dragdrop', $data);
 			}else if($json->content[0]->type == 'imagerecords'){
 				$data['path'] = asset("uploads/course/".$this->course_id."/".$this->id."/images/");
 				return View::make('materials.order', $this->data)->nest('exercises', 'exercises.imagerecords', $data);
 			}else if($json->content[0]->type == 'imagerecords'){
 				return View::make('materials.order', $this->data)->nest('exercises', 'exercises.goodbad', $data);
 			}
 		}

 	}

 	public function showCourseMaterialFeedback($id){
 		$category = QuestionCategory::all();
 		Eloquent::unguard();
	 		foreach ($category as $c) {
	 			$question = Question::where('question_categories_id', $c->id)->get();
	 			foreach ($question as $q) {
	 				if($q->boolean_answer == 'yes'){
	 					if(Input::has('radio_question_'.$q->question_categories_id.'_'.$q->id)){
	 						Answer::create(array('user_id'=>Auth::user()->id, 'boolean_answer'=>Input::get('radio_question_'.$q->question_categories_id.'_'.$q->id), 'answer_text'=>Input::get('text_'.$q->question_categories_id.'_'.$q->id), 'question_id'=>$q->id, 'material_id'=>$id));
	 					}
	 				}else if($q->boolean_answer == 'no'){
	 					if(Input::has('text_question_'.$q->question_categories_id.'_'.$q->id)){
	 						Answer::create(array('user_id'=>Auth::user()->id, 'answer_text'=>Input::get('text_question_'.$q->question_categories_id.'_'.$q->id), 'question_id'=>$q->id, 'material_id'=>$id));
	 					}
	 				}
	 				
	 				
	 			}
	 		}
 		return Redirect::back();
 	}

 	public function recordAudio($id="0", $idu="0"){
 		$name = $id.'-'.$idu.'-output.wav';
 		$content = file_get_contents('php://input');
 		$path = 'uploads/users/recording/';
 		$fh = fopen($path.$name, 'w') or +("can't open file");
		fwrite($fh, $content);
		fclose($fh);
		$file = new Upload;
		$file->material_id = $id;
		$file->user_id = $idu;
		$file->url = $path.$name;
		$file->type = "audio";
		$file->save();
	}

 	public function showCourseMaterialAnswers($idc, $order){
 		$json = Session::pull('exercise');
 		$result = 0;
 		if($json->content[0]->type == "multiplechoice"){
 			$count = sizeof($json->content);
	 		$content = $json->content;
	 		for ($i=0; $i < $count; $i++) { 
	 			$quest = $content[$i];
	 			if(Input::get('question_'.$i) == $quest->correct){
	 				$result++;
	 			}
	 		}
 		}else if($json->content[0]->type == "dragdrop"){
 			$count = sizeof($json->content);
 			for($i=0; $i<$count; $i++){
 				$answer = $json->correct[$i];
 				$ans = Input::get('question_'.$i);
 				foreach ($ans as $k => $a) {
 					if(is_array($answer[$k])){
 						if(in_array($a, $answer[$k])){
 							 $result++;
 						}
 					}else{
 						if($a == $answer[$k]){
 							$result++;
 						}
 					}
 				}
 			}
 		}else if($json->content[0]->type == "goodbad"){
 			$count = sizeof($json->content);
 			for($i=0; $i<$count; $i++){
 				$answer = $json->content[$i]->correct;
 				$ans = Input::get('question_'.$i);
 				if($ans == $answer){
 					$result++;
 				}
 			}

 		}

 		$history = new History;
 		$history->type = "exercise";
 		$history->material_id = Material::where('course_id', $idc)->where('order', $order)->get()->first()->id;
 		$history->user_id = Auth::user()->id;
 		$history->value = $result;

 		$history->save();

 		$next_material = Material::where('course_id', $idc)->where('order', $order+1)->get()->first();
 		if ($next_material != NULL) {
 			return Redirect::to('courses/'.$idc.'/materials/'.$next_material->order);
 		}else{
 			return Redirect::to('courses/'.$idc);
 		}


 	}

} 