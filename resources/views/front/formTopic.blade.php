

		<div class="topwrap">
			<div class="userinfo pull-left">
				<div class="avatar">
					{{ Html::image('/uploads/avatars/'.Auth::user()->avatar, 'a picture', array('style'=> 'width:37px')) }}
					@if($activities->contains('user_id',Auth::user()->id))
						<div class="status green">&nbsp;</div>
					@else
						<div class="status red">&nbsp;</div>
					@endif
				</div>

			</div>
			<div class="posttext pull-left">

				<div>
					{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter Topic Title', 'required')) }}	
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6">
						{!! Form::select('categoria', $categorias,	null, ['id' => 'categoria','placeholder' => 'Select a Category','class' => 'form-control']) !!}
					</div>
					<div class="col-lg-6 col-md-6">
						{!! Form::select('subcategoria',['placeholder' => 'Select a SubCategoria'], null,['id' => 'subcategoria','class' => 'form-control']) !!}
					</div>
				</div>

				<div>
					{{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Description', 'required']) }}
				</div>
				<div class="row newtopcheckbox">
					<div class="col-lg-6 col-md-6">
						<div><p>Who can see this?</p></div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="checkbox">
									<label>
										{{ Form::hidden('isPrivate', 0) }}
										{{ Form::checkbox('isPrivate') }}Registered Users Only
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div>
							<p>Email me when some one post a reply Post</p>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="checkbox">
									<label>
										{{ Form::hidden('emailMe', 0) }}
										{{ Form::checkbox('emailMe') }}Email me
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
					
					{{ Form::hidden('user_id', Auth::user()->id) }}

			</div>
			<div class="clearfix"></div>
		</div>                              
		<div class="postinfobot">

			
			<div class="pull-right postreply">
				<div class="pull-left">
					{!!link_to('/', $title = 'Cancel', $attributes = array('class'=>'btn btn-default'), $secure = null)!!}
					<button type="submit" class="btn btn-primary">Post</button>
				</div>
				<div class="clearfix"></div>
			</div>


			<div class="clearfix"></div>
		</div>

<script>
	
		$('#categoria').change(function(event){
			$.get("categorias/"+event.target.value+"", function(response,categoria){
				$('#subcategoria').empty();
				for(i=0; i<response.length; i++){
					$('#subcategoria').append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");

				}
			});
		});

</script>