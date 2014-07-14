@extends('layout.layout-master')

@section('body')
	<div id="courses-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<div class="row section">
					<div class="large-12 columns">
						<h4>LIST OF COURSES</h4>
						<p>Or maybe you want to add another <a href="{{url('courses/create')}}">Course ?</a></p>
						<table>
							<thead>
								<tr>
									<th class="integer">NO</th>
									<th class="string">NAME</th><th class="string">DESCRIPTION</th><th class="none">ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($courses as $course) 
									<tr>
										<td class="integer">{{$no++}}</td>
										<td>{{$course->name}}</td>
										<td>{{$course->description}}</td>
										<td>
											<a href="{{url('courses').'/'.$course->id.'/edit'}}" class="button tiny">EDIT</a>
											{{link_to(url('courses').'/'.$course->id, "Delete", $attributes = array('class'=>'button alert tiny'));}}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	<script type="text/javascript">
		$(function(){
	   $('[data-method]').append(function(){
	        return "\n"+
	        "<form action='"+$(this).attr('href')+"' method='POST' style='display:none'>\n"+
	        "   <input type='hidden' name='_method' value='"+$(this).attr('data-method')+"'>\n"+
	        "</form>\n"
	   })
	   .removeAttr('href')
	   .attr('style','cursor:pointer;')
	   .attr('onclick','$(this).find("form").submit();');
	});
	</script>
@stop