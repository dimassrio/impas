<div class="row">
	<div class="large-4 large-offset-3 columns">
		<h4>{{$json->subtitle}}</h4>
		<ul class="exercise-orbit" data-orbit   data-options="animation:fade;animation_speed:500;slide_number:false; bullets:false;circular:false;" style="width:400;">
			@foreach($json->content as $k => $c)
				<li id="image_".$k."" style="text-align:center;">
					<img src="{{$path.'/'.$c->image.}}" alt="{{$c->image}}" />
				</li>
			@endforeach
		</ul>
	</div>
	</div>
	<div class="row">
		<div class="large-3 large-offset-3 columns">
			<button id="exercise-start" class="button small">START</button>
		</div>
		<div class="large-3 columns end">
			<button id="exercise-end" class="button small right alert">SUBMIT</button>
		</div>
	</div>
	<div class="row">
		<div class="large-6 large-offset-3 columns">
		<div id="wami"></div>
	</div>
</div>