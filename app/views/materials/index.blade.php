@extends('layout.layout-master')

@section('body')
	<div id="materials-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<div class="row section">
					<div class="large-12 columns">
						<h4>LIST OF MATERIALS</h4>
						<p>Or maybe you want to add another <a href="{{url('materials/create')}}">Material ?</a></p>
						<table>
							<thead>
								<tr>
									<th class="integer">NO</th>
									<th class="string">NAME</th><th class="string">DESCRIPTION</th><th class="string">COURSE</th>
									<th class="none">ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($materials as $material) 
									<tr>
										<td class="integer">{{$no++}}</td>
										<td>{{$material->name}}</td>
										<td>{{$material->description}}</td>
										<td>{{$material->course->name}}</td>
										<td><a href="{{url('materials').'/'.$material->id.'/add'}}" class="button tiny">ADD CONTENT</a>
											<a href="{{url('materials').'/'.$material->id.'/edit'}}" class="button tiny">EDIT</a>
											{{link_to(url('materials').'/'.$material->id, "Delete", $attributes = array('class'=>'button alert tiny'));}}
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