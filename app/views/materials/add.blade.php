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
						<form method="post" action="{{url('materials').'/'.$material->id.'/add/content'}}">

						<h4>Add Content to this material</h4>
						<textarea name="content" id="content" cols="30" rows="10">
							
						</textarea>
						<input type="submit" class="button right small">
						</form>
					</div>
				</div>
				<div class="row section">
					<div class="large-4 large-offset-2 columns">
						<h5>Add Video to this material</h5>
						<form action="{{url('materials').'/'.$material->id.'/add/video'}}" method="post">
						<label for="name">Insert video name</label>
						<input type="text" id="name" name="name">
						<label for="video">Insert <a href="http://youtube.com" target="_blank">Youtube</a> link here.</label>
						<input type="text" id="video" name="video">
						<input type="submit" class="button right small">
						</form>
					</div>
					<div class="large-4 columns left">
						<h5>Add audio to this material.</h5>
						<form action="{{url('materials').'/'.$material->id.'/add/audio'}}" method="post" enctype="multipart/form-data">
						<label for="name">Insert audio name</label>
						<input type="text" id="name" name="name">
						<label for="audio">MP3 file to upload.</label>
						<input type="file" name="audio" id="audio">
						<input type="submit" class="button right small">
						</form>
					</div>
				</div>
				<div class="row section">
					<div class="large-4 large-offset-2 columns">
						<h5>Add Presentation to this material.</h5>
						<form action="{{url('materials').'/'.$material->id.'/add/presentation'}}" method="post">
						<label for="name">Insert presentation name</label>
						<input type="text" id="name" name="name">
						<label for="presentation">Insert <a href="http://onedrive.com" target="_blank">Onedrive</a> presentation link here.</label>
						<input type="text" id="presentation" name="presentation">
						<input type="submit" class="button right small">
						</form>
					</div>
					<div class="large-4 columns left">
						<h5>Add PDF to this material.</h5>
						<form action="{{url('materials').'/'.$material->id.'/add/pdf'}}" method="post" enctype="multipart/form-data">
						<label for="name">Insert PDF name</label>
						<input type="text" id="name" name="name">
						<label for="pdf">PDF file to upload.</label>
						<input type="file" name="pdf" id="pdf">
						<input type="submit" class="button right small">
						</form>
					</div>
				</div>
				<div class="row section">
					<div class="large-4 large-offset-2 columns">
						<h5>Add Image assets to this material.</h5>
						<form action="{{url('materials').'/'.$material->id.'/add/images'}}" method="post" enctype="multipart/form-data">
						<label for="images">Image zip file to upload.</label>
						<input type="file" name="images" id="images">
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