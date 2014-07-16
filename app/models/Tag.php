<?php

class Tag extends \Eloquent {
	protected $fillable = [];

	public function course(){
		return $this->belongsToMany('Course');
	}
}