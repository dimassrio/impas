<div class="row section" id="questionaire-section">
	<div class="large-8 large-offset-2 columns">
		<dl class="accordion" data-accordion>
			<dd class="accordion-navigation">
				<a href="#panel_feedback"><i class="fi-checkbox"></i> FEEDBACK QUESTIONAIRE</a>
				<div id="panel_feedback" class="content">
					<form action="{{url('feedback').'/'.$material->id}}" method="post">
						<dl class="tabs" data-tab>
							@foreach($questionaire as $k => $f)
								@if($k == 0)
									<dd class="active"> <a href="#panel_content_{{$k}}">{{$f[0]->questionCategory->name}}</a></dd>
								@else
									<dd><a href="#panel_content_{{$k}}">{{$f[0]->questionCategory->name}}</a></dd>
								@endif
							@endforeach
						</dl>
						<div class="tabs-content">
							@foreach($questionaire as $k => $f)
								@if($k == 0)
									<div class="content active" id="panel_content_{{$k}}">
								@else
									<div class="content" id="panel_content_{{$k}}">
								@endif
									<h3>{{$f[0]->questionCategory->name}}</h3>
									<ol>
										@foreach($f as $c)
											<li>
												<label for="text_{{$c->question_categories_id}}_{{$c->id}}"><strong>{{$c->criteria}}</strong> {{$c->questions}}</label>
												@if($c->boolean_answer == 'yes')
													<input type="radio" name="radio_question_{{$c->question_categories_id}}_{{$c->id}}" id="question_{{$c->question_categories_id}}_{{$c->id}}_yes" value="yes"> <label for="question_{{$c->question_categories_id}}_{{$c->id}}_yes">YES</label> <br/>
													<input type="radio" name="radio_question_{{$c->question_categories_id}}_{{$c->id}}" id="question_{{$c->question_categories_id}}_{{$c->id}}_no" value="no"><label for="question_{{$c->question_categories_id}}_{{$c->id}}_no">NO</label> 
													<input type="text" placeholder="Notes" name="text_{{$c->question_categories_id}}_{{$c->id}}" id="text_{{$c->question_categories_id}}_{{$c->id}}">
												@else
													<textarea name="text_question_{{$c->question_categories_id}}_{{$c->id}}" id="text_{{$c->question_categories_id}}_{{$c->id}}" cols="30" rows="10"></textarea>
												@endif
											</li>
										@endforeach
									</ol>
									</div>
							@endforeach
							<input type="submit" class="right button">
						</div>
					</form>
				</div>
			</dd>
		</dl>
	</div>
</div>