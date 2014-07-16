@extends('layout.layout-master')

@section('body')
	<div id="dashboard-content" class="min-height">
		<div class="row section row-white">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-6  large-offset-3 columns text-center">
						<h3>REPORT</h3>

					</div>
				</div>
				<div class="row">
					<div class="large-6 columns">
					
					@if(sizeof($histories) == 0)
						<h5>No activity has been tracked.</h5>
					@else
						<h5>This is your reports on Impas.</h5>
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
					</div>
				</ol>
				</div>
			</div>
		</div>
	</div>
@stop