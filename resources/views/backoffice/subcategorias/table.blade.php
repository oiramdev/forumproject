<div class="x_panel">
 
 <div class="x_title">
  <h2>list of categories</h2>
  <div class="clearfix"></div>
</div>

<div class="x_content">
  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
     <thead>
      <tr>
        <th>Edit</th>
        <th>Name</th>
        <th>Description</th>
        <th>Master Category</th>
        <th>Active</th>
        <th>Private</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
      @foreach($subcategorias as $subcategoria)
        <tr>
          <td>{!!link_to_route('subcategorias.edit', $title = 'Edit', $parameters = $subcategoria->id, $attributes = ['class'=>'btn btn-info'])!!}</td>
          <td>{{$subcategoria->name}}</td>
          <td>{{$subcategoria->description}}</td>
          <td>{{$subcategoria->categoria->name}}</td>
          <td>{{($subcategoria->isActive == 1 ? 'Yes' : 'Not')}}</td>
          <td>{{($subcategoria->isPrivate == 1 ? 'Yes' : 'Not')}}</td>
          <td>
              {!!Form::open(['route'=>['subcategorias.destroy',$subcategoria->id], 'method'=>'DELETE'])!!}
              {!!Form::submit('Remover',['class'=>'btn btn-danger'])!!}
              {!!Form::close()!!}
          </td>
        </tr>
      @endforeach
</tbody>
</table>
</div>

</div>