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
}