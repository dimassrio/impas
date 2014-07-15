@extends('layout.layout-master')

@section('body')
	<div id="courses-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<div class="row section">
					<div class="large-6 columns large-offset-3">
						<form action="{{url('materials')}}" method="POST" enctype="multipart/form-data">
						<h4>REGISTERING NEW MATERIAL</h4>
							<label for="name">NAME</label>
							<input type="text" id="name" name="name">
							<label for="type">MATERIAL TYPE</label>
							<select name="type" id="type">
								<option value="content">Content</option>
								<option value="exercise">Exercise</option>
							</select>
							<label for="url">URL for Exercise</label>
							<input type="file" id="url" name="url">
							<label for="description">DESCRIPTION</label>
							<input type="text" id="description" name="description">
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