<div class="row">
	<div class="large-8 columns">
		<h4 class="text-center">{{$json->subtitle}}</h4>
	@foreach($json->content as $k => $c)
	<form action="{{url('courses').'/'.$material->course->id.'/materials/'.$material->order.'/answers'}}" method="POST">
	<div class="row">
		<div class="large-9 columns">
			<iframe src="//www.youtube.com/embed/{{$c->youtube}}" width="80%" height="500px" frameborder="0" scrolling="no" allowfullscreen></iframe>
		</div>
		<div class="large-3 columns">
			<input type="radio" name="question_{{$k}}" id="question_{{$k}}" value="0"><label for="question_{{$k}}">YES</label>
			<input type="radio" name="question_{{$k}}" id="question_{{$k}}" value="1"><label for="question_{{$k}}">NO</label>
		</div>
	</div>
	@endforeach
	</form>
	</div>
</div>