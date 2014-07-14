@extends('layout.layout-master')

@section('body')
	<div id="courses-show-content" class="min-height">
	<div id="course-main-image" style="background: {{$course->color}} url('{{asset('uploads/course').'/'.$course->id.'/images/'.$course->image}}') top center no-repeat;" class="text-center">
		<a href="{{url('courses').'/'.$course->id.'/enroll'}}" class="button expand">ENROLL NOW</a>
	</div>
		<div id="course-show-information" class="section">
			<div class="row">
				<div class="large-12 columns">
				<div class="row section">
					<div class="large-8 columns large-offset-2">
						<h4>{{$course->description}}</h4>
					</div>
				</div>
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
					<div class="large-6 columns">
						<h3>Course Prerequisite</h3>
						<h3>The Teacher</h3>
					</div>
				</div>
			</div>
		</div>
			</div>
	</div>
@stop