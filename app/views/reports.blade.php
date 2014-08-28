@extends('layout.layout-master')

@section('body')
	<div id="dashboard-content" class="min-height">
		<div class="row section row-white">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-12columns">
					<ul class="tabs" data-tab role="tablist">
							<li class="tab-title active" role="presentational" ><a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" controls="panel2-1">USER REPORTS</a></li>
							<li class="tab-title" role="presentational" ><a href="#panel2-2" role="tab" tabindex="0"aria-selected="false" controls="panel2-2">USER FILES</a></li>
					</ul>
					<div class="tabs-content">
						<section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">
							<div class="row">
								<div class="large-6  large-offset-3 columns text-center">
									<h3>REPORT</h3>
								</div>
							</div>
							@if(sizeof($histories) == 0)
								<h4>No activity has been tracked.</h4>
							@else
								<h4>This is your reports on IMPAS.</h4>
								<form action="{{url('reports')}}" method="POST">
									<label for="course">SELECT COURSE</label>
									<select name="course" id="course">
										@foreach($option as $o)
											{{$o}}
										@endforeach
									</select>
									<input type="submit" class="button tiny right">
								</form>
								<table width="100%">
									<thead>
										<tr>
											<th class="text-right">No</th><th>Course</th><th>Material</th><th class="text-right">Value</th><th class="text-center">Access Date</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($histories as $history) 
											<tr>
												<td class="text-right">{{$no++}}</td>
												<td>{{Material::find($history->material_id)->course->name}}</td>
												<td class="text-left">{{Material::find($history->material_id)->name}}</td>
												<td class="text-right">{{$history->value}}</td>
												<td class="text-center">{{date('d-M-Y : H.i', strtotime($history->created_at))}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@endif						
						</section>
						<section role="tabpanel" aria-hidden="true" class="content" id="panel2-2">
							<div class="row">
								<div class="large-6  large-offset-3 columns text-center">
									<h3>LIST OF FILES UPLOADED</h3>
								</div>
							</div>								<ul>
								@foreach($files as $key => $file)
									@if($file->type == 'audio')
										<audio src="{{asset($file->url)}}" preload="auto" />
									@endif
								@endforeach
								</ul>					
						</section>
					</div>

					
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
<script type="text/javascript" src="{{asset('assets/vendor/audiojs/audiojs/audio.min.js')}}"></script>
<script>
  audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
</script>
@stop