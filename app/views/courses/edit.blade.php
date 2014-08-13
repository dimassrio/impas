@extends('layout.layout-master')

@section('body')
	<div id="courses-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<div class="row section">
					<div class="large-6 columns large-offset-3">
						<!-- {{Form::open(array('url' => url('courses').'/'.$course->id.'/edit', 'method' => 'POST', 'files'=>'true'))}} -->
						<form action="{{url('courses').'/'.$course->id.'/edit'}}" method="POST" enctype="multipart/form-data">
						<h4>UPDATE COURSE {{$course->name}} </h4>
							<label for="name">COURSE NAME</label>
							<input type="text" id="name" name="name" value="{{$course->name}}">
							<label for="description">DESCRIPTION</label>
							<textarea id="description" name="description">{{$course->description}}
							</textarea>
							<label for="image">IMAGE</label>
							<input type="file" id="image" name="image">
							<label for="background">BACKGROUND COLOR</label>
							<input type="text" id="background" name="background" value="{{$course->color}}">
							<input type="submit" class="button right small">
						</form>
					</div>
				</div>

				<div class="row section">
					<div class="large-6 columns large-offset-3">
						<h4>Reorder the Lessons</h4>
						<ul id="materials-list">
						@foreach($materials as $material)
							<li class="alert-box secondary" id="{{$material->id}}">{{$material->name}}</li>
						@endforeach
						</ul>
						<button id="submit-material-list" class="button small right">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
	$(function(){
		$('#materials-list').sortable();
		$( "#sortable" ).disableSelection();
		$('#submit-material-list').click(submitMaterialList);
		function submitMaterialList(e){
			e.preventDefault();
			var idInOrder = $('#materials-list').sortable("toArray");
			var test = JSON.stringify(idInOrder);
			$.ajax("{{url('courses')}}/{{$course->id}}/order", {
				data : {
					"list": test
				},
				dataType : 'application/json',
				type : 'POST',
				success : function(res, stat){
					console.log(stat);
				}
			});
		}
	});
	</script>
@stop