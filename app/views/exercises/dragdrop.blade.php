<div id="exercise-section" class="row section" >
<form action="{{url('courses').'/'.$material->course->id.'/materials/'.$material->order.'/answers'}}" method="POST">
<div class="large-8 large-offset-2 columns" >
<ol class="question" >
<?php $num = 1; ?>
	@foreach($json->content as $key => $c)
	<div class="row">
		<div class="large-8 columns">
			<li><p>{{$c->question}}</p>
		</div>
		<div class="large-4 columns">
			@for($i = 0; $i<$c->ans; $i++)
			<div class="row">
				<div class="large-3 columns">
				({{$num++}})
				</div>
				<div class="large-9 columns">
					<select name="question_{{$key}}[]">
						@foreach($c->answer as $o => $option)
							<option value="{{$option->value}}">{{$option->text}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@endfor
		</div>
	</div>
	@endforeach
</ol>
<input type="submit" class="button right small" id="exercise-submit-button">
</div>
</form>
</div>