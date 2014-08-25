<div id="exercise-section" class="row section row-white" >
	<div class="large-8 large-offset-2 columns" >
		<form action="{{url('courses').'/'.$material->course->id.'/materials/'.$material->order.'/answers'}}" method="POST">
		<?php Session::put('exercise', $json); ?>
			<ol class="question">
			<?php
				for($key=0; $key<sizeof($json->content); $key++){
					$c = $json->content[$key];
					$num = $key+1;
			?>
				<li><p>{{$c->question}}</p>
				<?php 
					foreach ($c->answer as $k =>$a) {
				?>
					<input type="radio" id="question_{{$key}}_answer_{{$k}}" name="question_{{$key}}" value="{{$k}}" /><label for="question_{{$key}}_answer_{{$k}}">{{$a->text}}</label><br />
				<?php	
					}
				?>
				</li>
			<?php
				}
			?>
			</ol>
		<input type="submit" class="button right small">
		</form>
	</div>
</div>