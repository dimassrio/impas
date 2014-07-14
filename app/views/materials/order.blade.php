@extends('layout.layout-master')

@section('body')
	<div id="materials-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<ul class="breadcrumbs">
					<li><a href="{{url('courses').'/'.$material->course->id}}">{{$material->course->name}}</a></li>
					<li class="current"><a href="#">{{$material->name}}</a></li>
				</ul>
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
										@if($video->type == "onedrive")
										<h4>{{$video->name}}</h4>
										<iframe src="{{$video->video}}"  width="80%" height="500px" frameborder="0" scrolling="no" allowfullscreen></iframe>
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
								<a href="#panel-audio" id="panel-audio">{{$material->name}} PDF files.</a>
								<div id="panel-audio" class="content active audio-wrapper">
								<ol>
									@foreach ($material->audio as $audio)
										<h5>{{$audio->name}}</h5>
										<audio src="{{asset('uploads/course').'/'.$material->course->id.'/audio/'.$audio->audio}}" preload="auto" />

									@endforeach
								</ol>
								</div>
							</dd>
						</dl>
					</div>
				</div>
				@endif

			</div>
		</div>
	</div>
@stop

@section('js')

<script type="text/javascript" src="{{asset('assets/vendor/audiojs/audio.min.js')}}"></script>
<script>
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
</script>
@stop