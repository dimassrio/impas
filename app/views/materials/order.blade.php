@extends('layout.layout-master')

@section('body')
	<div id="materials-create-content" class="min-height">
	<div id="course-main-image" style="background: {{$material->course->color}} url('{{asset('uploads/course').'/'.$material->course->id.'/images/'.$material->course->image}}') top center no-repeat;" class="text-center">
	</div>
		<div class="row row-white section">
			<div class="large-12 columns">
				<ul class="breadcrumbs">
					<li><a href="{{url('courses').'/'.$material->course->id}}">{{$material->course->name}}</a></li>
					<li class="current"><a href="#">{{$material->name}}</a></li>
				</ul>
				<div class="row section">
						<div class="large-6 large-offset-3  text-center columns">
							<h3>{{$material->name}}</h3>
						</div>
					</div>
				<!-- @if(Auth::check() && Auth::user()->isAdmin())
					<a href="{{url('materials').'/'.$material->id.'/add'}}" class="button small">EDIT MATERIAL</a>
				@endif -->
				
				@if($material->type == 'content')
					@if($material->presentation->count() > 0)
						<div id="presentation-content" class="row section">
							<div class="large-8 columns large-offset-2">
								<dl class="accordion" data-accordion>
									<dd class="accordion-navigation">
										<a href="#panel-presentation" id="panel-presentation">{{$material->name}} presentation.</a>
										<div id="panel-presentation" class="content active text-center presentation-wrapper">

											@foreach ($material->presentation as $presentation)
												@if($presentation->type == "onedrive")
												<h4>{{$presentation->name}}</h4>
												<iframe src="{{$presentation->presentation}}"  width="80%" height="500px" frameborder="0" scrolling="no"></iframe>
												@endif
											@endforeach
										</div>
									</dd>
								</dl>
							</div>
						</div>
						@endif

						@if($material->video->count() > 0)
						<div id="video-content" class="row section">
							<div class="large-8 columns large-offset-2">
								<dl class="accordion" data-accordion>
									<dd class="accordion-navigation">
										<a href="#panel-video" id="panel-video">{{$material->name}} video.</a>
										<div id="panel-video" class="content active text-center video-wrapper">

											@foreach ($material->video as $video)
												@if($video->type == "youtube")
												<h4>{{$video->name}}</h4>
												
												<iframe src="//www.youtube.com/embed/{{$video->video}}" width="80%" height="500px" frameborder="0" scrolling="no" allowfullscreen></iframe>
												
												@endif
											@endforeach
										</div>
									</dd>
								</dl>
							</div>
						</div>
						@endif

						@if($material->content->count() > 0)
						<div id="content-content" class="row section">
							<div class="large-8 columns large-offset-2">
								<dl class="accordion" data-accordion>
									<dd class="accordion-navigation">
										<a href="#panel-content" id="panel-content">{{$material->name}} content.</a>
										<div id="panel-content" class="content active content-wrapper">

											@foreach ($material->content as $content)
												{{$content->content}}
												<hr />
											@endforeach
										</div>
									</dd>
								</dl>
							</div>
						</div>
						@endif

						@if($material->pdfile->count() > 0)
						<div id="pdfile-content" class="row section">
							<div class="large-8 columns large-offset-2">
								<dl class="accordion" data-accordion>
									<dd class="accordion-navigation">
										<a href="#panel-pdfile" id="panel-pdfile">{{$material->name}} PDF files.</a>
										<div id="panel-pdfile" class="content active pdfile-wrapper">
										<ol>
											@foreach ($material->pdfile as $pdfile)
												
													<li>
														<a href="{{asset('uploads/course').'/'.$material->course->id.'/pdf/'.$pdfile->pdfile}}" class="">{{$pdfile->name}}</a>
													</li>
												
											@endforeach
										</ol>
										</div>
									</dd>
								</dl>
							</div>
						</div>
						@endif

						@if($material->audio->count() > 0)
						<div id="audio-content" class="row section">
							<div class="large-8 columns large-offset-2">
								<dl class="accordion" data-accordion>
									<dd class="accordion-navigation">
										<a href="#panel-audio" id="panel-audio">{{$material->name}} audio files.</a>
										<div id="panel-audio" class="content active audio-wrapper">
											@foreach ($material->audio as $audio)
												<h5>{{$audio->name}}</h5>
												<audio src="{{asset('uploads/course').'/'.$material->course->id.'/audio/'.$audio->audio}}" preload="auto" />

											@endforeach
										</div>
									</dd>
								</dl>
							</div>
						</div>
						@endif
				@else
					@if($material->url != NULL)
						{{$material->convertExercise();}}
					@endif
				@endif
				
				@if($prev_material != NULL)
				<a href="{{url('courses').'/'.$material->course->id.'/materials/'.$prev_material->order}}" class="button left section" id="material-previous-button">PREVIOUS LESSON</a>
				@elseif($prev_material != NULL)
				<a href="{{url('dashboard')}}" class="button alert section" id="material-previous-button">BACK TO DASHBOARD</a>
				@endif

				@if($next_material != NULL)
				<a href="{{url('courses').'/'.$material->course->id.'/materials/'.$next_material->order}}" class="button right section" id="material-next-button">NEXT LESSON</a>
				@else
				<a href="{{url('dashboard')}}" class="button alert right section" id="material-next-button">BACK TO DASHBOARD</a>
				@endif
			</div>
		</div>
	</div>
@stop

@section('js')

<script type="text/javascript" src="{{asset('assets/vendor/audiojs/audiojs/audio.min.js')}}"></script>
<script>
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
</script>

@if($material->type == 'exercise')
	<script type="text/javascript">
	$(function(){
		$('#material-next-button').hide();
		$('#material-previous-button').hide();
		/*$('#exercise-submit-button').click(normalAll);
		function normalAll(){
			$('#material-next-button').show();
			$('#material-previous-button').show();			
		}*/
	});
	</script>
@else
<script type="text/javascript">
	$(function(){
		$('#material-next-button').show();
		$('#material-previous-button').show();
	});
	</script>
@endif
@stop