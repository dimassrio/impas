<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder {

	public function run()
	{
		Tag::create(array('name'=>'Introduction Learning', 'description'=>'Step 1'));
		Tag::create(array('name'=>'Exploration Learning', 'description'=>'Step 2'));
		Tag::create(array('name'=>'Additional Learning', 'description'=>'Step 3'));
	}

}