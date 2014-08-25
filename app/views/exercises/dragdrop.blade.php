<div id="exercise-section" class="row section" >
<form action="{{url('courses').'/'.$this->course->id.'/materials/'.$this->order.'/answers}}" method="POST">
<div class="large-8 large-offset-2 columns" >
<ol class="question" >
	<?php 
	foreach ($json->content as $key => $c) {
	$num = $key+1; 
	?>
	<div class="row">
		<div class="large-8 columns">
			<li><p>{{$c->question}}</p>
		</div>
		<div class="large-4 columns">
			<?php 
			foreach ($c->answer as $k => $a){
			?>
			<div class="row">
				<div class="large-3 columns">
				({{$k}})
				</div>
				<div class="large-9 columns">
					<select name="question_{{$key}}[]">
						<?php 
						foreach($c->answer as $o => $option){
						?>
							<option value="".$o."">".$option->text."</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
	<?php	} ?>
</ol>
<input type="submit" class="button right small" id="exercise-submit-button">
</div>
</form>
</div>