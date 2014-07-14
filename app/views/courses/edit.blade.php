@extends('layout.layout-master')

@section('body')
	<div id="courses-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<div class="row section">
					<div class="large-6 columns large-offset-3">
						{{Form::open(array('url' => url('courses').'/'.$course->id, 'method' => 'put', 'files'=>'true'))}}
						<h4>UPDATE COURSE {{$course->name}} </h4>
							<label for="name">COURSE NAME</label>
							<input type="text" id="name" name="name" placeholder="{{$course->name}}">
							<label for="description">DESCRIPTION</label>
							<textarea id="description" name="description">{{$course->description}}
							</textarea>
							<label for="image">IMAGE</label>
							<input type="file" id="image" name="image">
							<label for="background">BACKGROUND COLOR</label>
							<input type="text" id="background" name="background">
							<input type="submit" class="button right small">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop