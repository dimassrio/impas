@extends('layout.layout-master')

@section('body')
	<div id="courses-show-content" class="min-height">
	<div id="course-main-image" style="background: {{$course->color}} url('{{asset('uploads/course').'/'.$course->id.'/images/'.$course->image}}') top center no-repeat;" class="text-center">
		
		@if(sizeof($course->material) != 0)
			@if(Auth::user()->isCourse($course->id))
			<a href="{{url('courses').'/'.$course->id.'/materials/1'}}" class="button expand alert">CLICK HERE TO ENJOY OUR LESSON</a>
			@else
			<a href="{{url('courses').'/'.$course->id.'/enroll'}}" class="button expand">ENROLL NOW</a>
			@endif
		@else
			<a href="#" class="button expand disabled">THIS COURSE IS UNDER CONSTRUCTION</a>
		@endif
	</div>
		<div id="course-show-information" class="section">
			<div id="course-show-description">
					<div class="row">
						<div class="large-8 columns large-offset-2">
							<h4>{{$course->description}}</h4>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="large-12 columns">
				
				<div class="row section">
					<div class="large-6 columns">
						<h3>Course Overview</h3>
						@foreach ($course->material as $material)
							<div id="course-show-material" class="row">
								<div class="large-12 columns">
									<h4>{{$no++}}. {{$material->name}}</h4>
									<p>{{$material->description}}</p>
								</div>
							</div>
						@endforeach
					</div>
					<div class="large-5 columns">
						<h3>Course Prerequisite</h3>
						<div class="row">
							<div  class="large-12 columns">
								<h3>The Teacher</h3>
								<div id="course-show-author" class="row">
									<div class="large-4 columns">
										<img src="{{asset('assets/images/user-question.jpg')}}" alt="" class="th">
									</div>
									
									<div  class="large-8 columns">
										<h4>Administrator</h4>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			</div>
	</div>
@stop