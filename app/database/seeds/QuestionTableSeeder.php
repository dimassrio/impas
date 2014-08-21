<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class QuestionTableSeeder extends Seeder {

	public function run()
	{
		Question::create(array('questions'=>'Were most of the instructions clear and easy to undestand?', 'category'=>'Content', 'boolean_answer'=>'yes', 'criteria'=>'Instructions'));
		Question::create(array('questions'=>'Were most of the materials useful and easy to understand?', 'category'=>'Content', 'boolean_answer'=>'yes', 'criteria'=>'Materials'));
		Question::create(array('questions'=>'Were most of the exercises in line (based on) with the materials?', 'category'=>'Content', 'boolean_answer'=>'yes', 'criteria'=>'Exercise'));
		Question::create(array('questions'=>'Were most of the feedbacks useful and easy to understand?', 'category'=>'Content', 'boolean_answer'=>'yes', 'criteria'=>'Feedback'));
		Question::create(array('questions'=>'Were most of the materials useful and easy to understand?', 'category'=>'Content', 'boolean_answer'=>'yes', 'criteria'=>'Downloadable Materials'));
		Question::create(array('questions'=>'Comment:', 'category'=>'Content', 'boolean_answer'=>'no', 'criteria'=>''));
		Question::create(array('questions'=>'What is your least favorite Content?', 'category'=>'Content', 'boolean_answer'=>'no', 'criteria'=>''));

		Question::create(array('questions'=>'Were most of the contents and contexts consistent with the theme?', 'category'=>'Accuracy and Stability', 'boolean_answer'=>'yes', 'criteria'=>'Content And Context'));
		Question::create(array('questions'=>'Were the materials suitable for your needs?', 'category'=>'Accuracy and Stability', 'boolean_answer'=>'yes', 'criteria'=>'Content And Context'));
		Question::create(array('questions'=>'Were the exercises suitable for your needs?', 'category'=>'Accuracy and Stability', 'boolean_answer'=>'yes', 'criteria'=>'Content And Context'));
		Question::create(array('questions'=>'Were most of the language use appropriate for you?', 'category'=>'Accuracy and Stability', 'boolean_answer'=>'yes', 'criteria'=>'Language Use'));
		Question::create(array('questions'=>'Were most of the materials are free from misspellings, grammatical errors, and misused of words?', 'category'=>'Accuracy and Stability', 'boolean_answer'=>'yes', 'criteria'=>'Language Use'));
		Question::create(array('questions'=>'Comment:', 'category'=>'Accuracy and Stability', 'boolean_answer'=>'no', 'criteria'=>''));

		Question::create(array('questions'=>'Do the layouts of the lessons clear and intutitive (easy for you to find what you need)', 'category'=>'Format', 'boolean_answer'=>'yes', 'criteria'=>'Layout'));
		Question::create(array('questions'=>'Do all the layouts consistent on all pages?', 'category'=>'Format', 'boolean_answer'=>'yes', 'criteria'=>'Layout'));
		Question::create(array('questions'=>'Do all the colors and icons used in effective ways?', 'category'=>'Format', 'boolean_answer'=>'yes', 'criteria'=>'Layout'));
		Question::create(array('questions'=>'Were most of the images relevant to the materials and help you to understand the materials?', 'category'=>'Format', 'boolean_answer'=>'yes', 'criteria'=>'Multimedia'));
		Question::create(array('questions'=>'Were most of the voices clear and help you to understand the materials?', 'category'=>'Format', 'boolean_answer'=>'yes', 'criteria'=>'Multimedia'));
		Question::create(array('questions'=>'Were most of the animations complement learning?', 'category'=>'Format', 'boolean_answer'=>'yes', 'criteria'=>'Multimedia'));
		Question::create(array('questions'=>'Comment:', 'category'=>'Format', 'boolean_answer'=>'no', 'criteria'=>''));

		Question::create(array('questions'=>'Can you re-enter module at any point?', 'category'=>'Ease of Use', 'boolean_answer'=>'yes', 'criteria'=>'Flexibility & Adaptability'));
		Question::create(array('questions'=>'Do most of the modules can be easily integrated into classroom activities?', 'category'=>'Ease of Use', 'boolean_answer'=>'yes', 'criteria'=>'Flexibility & Adaptability'));
		Question::create(array('questions'=>'Do most of the modules make you to actively interact in order to learn?', 'category'=>'Ease of Use', 'boolean_answer'=>'yes', 'criteria'=>'Flexibility & Adaptability'));
		Question::create(array('questions'=>'Do the content accommodate various learning styles (visual, auditory, etc.)', 'category'=>'Ease of Use', 'boolean_answer'=>'yes', 'criteria'=>'Flexibility & Adaptability'));
		Question::create(array('questions'=>'Do all links work properly?', 'category'=>'Ease of Use', 'boolean_answer'=>'yes', 'criteria'=>'Technical aspects'));
		Question::create(array('questions'=>'Do all multimedia resources work at all times?', 'category'=>'Ease of Use', 'boolean_answer'=>'yes', 'criteria'=>'Technical aspects'));
		Question::create(array('questions'=>'Is there guidance to help accessing IMPAS?', 'category'=>'Ease of Use', 'boolean_answer'=>'yes', 'criteria'=>'Technical aspects'));
		Question::create(array('questions'=>'Comment:', 'category'=>'Ease of Use', 'boolean_answer'=>'no', 'criteria'=>''));

		Question::create(array('questions'=>'Apakah IMPAS membantu Anda untuk meningkatkan kemampuan berpresentasi akademik dalam bahasa Inggris?', 'category'=>'Interview', 'boolean_answer'=>'no', 'criteria'=>'Interview'));
		Question::create(array('questions'=>'Kendala apakah yang Anda hadapi ketika menggunakan IMPAS?', 'category'=>'Interview', 'boolean_answer'=>'no', 'criteria'=>'Interview'));
		Question::create(array('questions'=>'Bagian mana yang betul-betul sangat membantu Anda?', 'category'=>'Interview', 'boolean_answer'=>'no', 'criteria'=>'Interview'));
		Question::create(array('questions'=>'Apa yang ingin Anda dapatkan dari IMPAS jika ada pengembangan lebih lanjut?', 'category'=>'Interview', 'boolean_answer'=>'no', 'criteria'=>'Interview'));
		Question::create(array('questions'=>'Apakah saran Anda untuk tim pengembang IMPAS?', 'category'=>'Interview', 'boolean_answer'=>'no', 'criteria'=>'Interview'));

	}

}