<?php

class System extends \Eloquent {
	protected $fillable = [];

	public static function arrayToOption($courses){
		$result = "";

		foreach ($courses as $course) {

			$result .= "<option value='".$course['id']."'>".$course['name']."</option>";
		}

		return $result;
	}
}