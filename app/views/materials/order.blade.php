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

				@if($material->type == 'content')
					{{$content}}
				@else
					{{$exercises}}
				@endif
				
				<!-- NAVIGATION -->
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
				
				@if($material->type == 'content')
					{{$feedback}}
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
	@if(Session::has('type'))
		@if(Session::get('type') == 'imagerecord')
			<script type="text/javascript"
		src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript" src="{{asset('assets/vendor/wami-recorder/example/client/recorder.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/vendor/wami-recorder/example/client/gui.js')}}"></script>
		@endif
	@endif
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
	@if(Session::has('type'))
		@if(Session::get('type') == 'imagerecord')
			<script type="text/javascript"
			src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
			<script type="text/javascript" src="{{asset('assets/vendor/wami-recorder/example/client/recorder.js')}}"></script>
			<script type="text/javascript" src="{{asset('assets/vendor/wami-recorder/example/client/gui.js')}}"></script>
			
			<script type="text/javascript">
				$(function(){
					$('#exercise-start').click(setupRecorder);
					$('#exercise-end').click(stopRecorder);
					$('#exercise-end').hide();
				});
				function setupRecorder() {
					Wami.setup({
						id : "wami",
						swfUrl : "{{asset('assets/vendor/wami-recorder/example/client/Wami.swf')}}",
						onReady : startRecord}
					);
					
					/*Wami.setup({
						id : "wami",
						swfUrl : "{{asset('assets/vendor/wami-recorder/example/client/Wami.swf')}}",
						//onReady : setupGUI
					});*/
				}
				function startRecord(){
					console.log(Wami.getRecordingLevel());
					Wami.startRecording("{{url('materials').'/'.$material->id.'/record/'.Auth::user()->id}}");
					$('#exercise-start').hide();
					$('#exercise-end').show();
				}
				function stopRecorder(){
					Wami.stopRecording();
					$('#exercise-start').show();
					$('#exercise-end').hide();
					$('#material-next-button').show();
					$('#material-previous-button').show();
				}
			</script>
		@endif
	@endif
@else
<script type="text/javascript">
	$(function(){
		$('#material-next-button').show();
		$('#material-previous-button').show();
	});
	</script>
@endif
@stop