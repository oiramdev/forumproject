<div class="form-group">
    <label class="control-label" for="first-name">Name: 
        <span class="required">*</span>
    </label>
    <div class="">
        {{ Form::text('name',null, array('class' => 'form-control col-md-7 col-xs-12', 'required')) }}
    </div>
</div>
              
 <div class="form-group">
    <label class="control-label" for="last-name">Description 
        <span class="required">*</span>
   </label>
   <div class="">
        {{ Form::textarea('description', null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) }}
    </div>
</div>
<div class="form-group">
    <label style="width: 150px;">Propriedades</label>
    <label class="checkbox-inline"><br>
      {{ Form::hidden('isActive', 0) }}
      {{ Form::checkbox('isActive') }}Active
    </label>
    <label class="checkbox-inline"><br>
        {{ Form::hidden('isPrivate', 0) }}
        {{ Form::checkbox('isPrivate') }}Private
    </label>
</div>              
<div class="ln_solid"></div>           
<div class="form-group">
    <div class="">
        {!!link_to('/backoffice/categorias', $title = 'Cancel', $attributes = array('class'=>'btn btn-default'), $secure = null)!!}
        {!!Form::submit('Submit',['class'=>'btn btn-success'])!!}
    </div>
</div>

                          






