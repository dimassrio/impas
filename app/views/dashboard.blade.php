@extends('layout.layout-master')

@section('body')
	<div id="dashboard-content" class="min-height">
		<div class="row section row-white">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-6  large-offset-3 columns text-center">
						<h3>Learn <strong>everything</strong> you need here, in order to perfect your <strong>English Presentation</strong> skills.</h3>
					</div>
				</div>
				@foreach ($courses as $key => $course)
					@if($key%2 == 0)
					<div class="row">
					@endif
						<div class="large-6 columns">
							<div class="dashboard-course-section">
								<div class="row">
									<div class="large-12 columns dashboard-course-image">
									<a href="{{url('courses').'/'.$course->id}}">
										<img src="{{asset('uploads/course').'/'.$course->id.'/images/'.$course->image}}" alt="">
									</a>
									</div>
								</div>
								<div class="row">
									<div class="large-12 columns dashboard-course-title">
										<a href="{{url('courses').'/'.$course->id}}">
											<h3>{{$course->name}}</h3>
										</a>
									</div>
								</div>
								<div class="row">
									<div class="large-10 large-offset-1 columns dashboard-course-content">
										<p>{{$course->description}}</p>
									</div>
								</div>
							</div>
						</div>
					@if($key%2 == 1)
					</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
@stop