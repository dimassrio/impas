<?php

class Question extends \Eloquent {
	protected $fillable = [];

	public function questionCategory(){
		return $this->belongsTo('QuestionCategory', 'question_categories_id', 'id');
	}
}