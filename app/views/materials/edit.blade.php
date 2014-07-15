@extends('layout.layout-master')

@section('body')
	<div id="courses-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<div class="row section">
					<div class="large-6 columns large-offset-3">
						{{Form::open(array('url' => url('materials').'/'.$material->id, 'method' => 'put'))}}
						<h4>UPDATE MATERIAL</h4>
							<label for="name">NAME</label>
							<input type="text" id="name" name="name" placeholder="{{$material->name}}">
							<label for="description">DESCRIPTION</label>
							<textarea name="description" id="description" cols="30" rows="10">{{$material->description}}</textarea>
							<label for="course">COURSE</label>
							<select name="course" id="course">
								{{System::arrayToOption(Course::getArray())}}
							</select>
							<input type="submit" class="button small right">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop