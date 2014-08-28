@extends('layout.layout-master')

@section('body')
	<div id="courses-create-content" class="min-height">
		<div class="row row-white section">
			<div class="large-12 columns">
				<div class="row section">
					<div class="large-12 columns">
						<h4>LIST OF USERS</h4>
						<p>Or maybe you want to add another <a href="{{url('users/create')}}" class="button tiny"><i class="fi-plus"></i> USER</a> ?</p>
						<table width="100%">
							<thead>
								<tr>
									<th class="integer">NO</th>
									<th class="string">NAME</th><th class="string">USERNAME</th><th class="string">EMAIL</th>
									<th>LEVEL</th><th class="none">ACTION</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user) 
									<tr>
										<td>{{$no++}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->username}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->level}}</td>
										<td>
											<a href="{{url('users').'/'.$user->id.'/edit'}}" class="button tiny">EDIT</a>
											<a href="{{url('users').'/'.$user->id}}" class="button tiny">SHOW</a>
											{{link_to(url('users').'/'.$user->id, "Delete", $attributes = array('class'=>'button alert tiny'));}}
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