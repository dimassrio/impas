<?php

class QuestionCategory extends \Eloquent {
	protected $fillable = [];

	public function question(){
		return $this->hasMany('Question');
	}
}