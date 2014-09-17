<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class QuestionCategoryTableSeeder extends Seeder {

	public function run(){
		QuestionCategory::create(array("name"=>"Content"));
		QuestionCategory::create(array("name"=>"Accuracy and Suitability"));
		QuestionCategory::create(array("name"=>"Format"));
		QuestionCategory::create(array("name"=>"Ease of Use"));
		QuestionCategory::create(array("name"=>"Interview Question"));
	}

}