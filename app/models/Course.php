<?php

class Course extends \Eloquent {
	protected $fillable = [];

	public function material(){
        return $this->hasMany('Material');
    }

	public static function getArray(){
		$courses = Course::all()->toArray();
		return $courses;
	}

	public function users(){
		return $this->belongsToMany('User');
	}

	public function tags(){
		return $this->belongsToMany('User');
	}
}