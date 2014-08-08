@extends('layout.layout-master')

@section('body')
	<div id="materials-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<ul class="breadcrumbs">
					<li><a href="{{url('courses').'/'.$material->course->id}}">{{$material->course->name}}</a></li>
					<li><a href="{{url('materials')}}">{{$material->name}}</a></li>
					<li class="current"><a href="#">Add Files</a></li>
				</ul>
				<div class="row section">
					<div class="large-8 large-offset-2 columns">
						<form method="post" action="{{url('materials').'/'.$material->id.'/addbulks'}}" enctype="multipart/form-data">
						<h4>Add Content to this material</h4>
						<textarea name="content" id="content" cols="30" rows="10">
							
						</textarea>						
					</div>
				</div>
				<div class="row section">
					<div class="large-4 large-offset-2 columns">
						<h5>Add Video to this material</h5>
						<label for="video_name">Insert video name</label>
						<input type="text" id="video_name" name="video_name">
						<label for="video">Insert <a href="http://youtube.com" target="_blank">Youtube</a> link here.</label>
						<input type="text" id="video" name="video">
					</div>
					<div class="large-4 columns left">
						<h5>Add audio to this material.</h5>
						<label for="audio_name">Insert audio name</label>
						<input type="text" id="audio_name" name="audio_name">
						<label for="audio">MP3 file to upload.</label>
						<input type="file" name="audio" id="audio">
					</div>
				</div>
				<div class="row section">
					<div class="large-4 large-offset-2 columns">
						<h5>Add Presentation to this material.</h5>
						<label for="presentation_name">Insert presentation name</label>
						<input type="text" id="presentation_name" name="presentation_name">
						<label for="presentation">Insert <a href="http://onedrive.com" target="_blank">Onedrive</a> presentation link here.</label>
						<input type="text" id="presentation" name="presentation">
					</div>
					<div class="large-4 columns left">
						<h5>Add PDF to this material.</h5>
						<label for="pdf_name">Insert PDF name</label>
						<input type="text" id="pdf_name" name="pdf_name">
						<label for="pdf">PDF file to upload.</label>
						<input type="file" name="pdf" id="pdf">
						<input type="submit" class="button right small">
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@stop

@section('js')
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript">
	        tinymce.init({selector:'#content'});
</script>
@stop