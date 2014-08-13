<?php

class Material extends \Eloquent {
	protected $fillable = [];
	public function course(){
		return $this->belongsTo('Course');
	}

	public function content(){
		return $this->hasMany('Content');
	}

	public function presentation(){
		return $this->hasMany('Presentation');
	}

	public function pdfile(){
		return $this->hasMany('Pdfile');
	}

	public function video(){
		return $this->hasMany('Video');
	}

	public function audio(){
		return $this->hasMany('Audio');
	}

	public function exercise(){
		return $this->hasMany('Exercise');
	}

	public function users(){
		return $this->belongsToMany('User');
	}

	public function convertExercise(){
		$url = $this->url;
		$content = file_get_contents(asset('uploads/course').'/'.$this->course->id.'/exercise/'.$url);
		$json = json_decode($content);
		//$data = shuffle($json->content);
		if($json->content[0]->type == 'multiplechoice'){
			$string = "<div id=\"exercise-section\" class=\"row section\" >";
			$string .= "<div class=\"large-8 large-offset-2 columns\" >";
			$string .= "<form action=\"".url('courses')."/".$this->course->id."/materials/".$this->order."/answers\" method=\"POST\">";
			//$encode = json_encode($json);
			//$encode = str_replace("\"", "", $encode);
			Session::put('exercise', $json);
			//$string .= "<input type=\"hidden\" value='".json_encode($json)."' name=\"json\">";
			$string .= "<ol class=\"question\" >";
			for($key=0; $key<sizeof($json->content); $key++){
				$c = $json->content[$key];
				$num = $key+1;
				$string .= "<li><p>".$c->question." </p>";
				foreach ($c->answer as $k =>$a) {
					$string .="<input type=\"radio\" id=\"question_".$key."_answer_".$k."\" name=\"question_".$key."\" value=\"".$k."\" /><label for=\"question_".$key."_answer_".$k."\">".$a->text."</label><br />";
				}
				$string .= "</li>";
			}
			$string .= "</ol>";
			$string .= "<input type=\"submit\" class=\"button right small\">";
			$string .= "</form>";
			$string .= "</div>";
			$string .= "</div>";
		}else if($json->content[0]->type == 'dragdrop'){
			Session::put('exercise', $json);
			$string = "<div id=\"exercise-section\" class=\"row section\" >";
			$string .= "<form action=\"".url('courses')."/".$this->course->id."/materials/".$this->order."/answers\" method=\"POST\">";
			$string .= "<div class=\"large-8 large-offset-2 columns\" >";
			$string .= "<ol class=\"question\" >";
			foreach ($json->content as $key => $c) {
				$num = $key+1;
				$string .= "<div class=\"row\">";
				$string .= "<div class=\"large-8 columns\">";
				$string .= "<li><p>".$c->question."</p>";
				$string .= "</div>";
				$string .= "<div class=\"large-4 columns\">";
				foreach ($c->answer as $k => $a){
					$string .= "<div class=\"row\">";
					$string .= "<div class=\"large-3 columns\">";
					$string .= "(".$k.")";
					$string .= "</div>";
					$string .= "<div class=\"large-9 columns\">";
					$string .= "<select name=\"question_".$key."[]\">";
						foreach($c->answer as $o => $option){
							$string .= "<option value=\"".$o."\">".$option->text."</option>";
						}	
					$string .= "</select>";
					$string .= "</div>";
					$string .= "</div>";
				}

				$string .= "</div>";
				$string .= "</div>";
			}
			$string .= "</ol>";
			$string .= "<input type=\"submit\" class=\"button right small\" id=\"exercise-submit-button\">";
			$string .= "</div>";
			$string .= "</form>";
			$string .= "</div>";
		}
		return $string;
	}
}