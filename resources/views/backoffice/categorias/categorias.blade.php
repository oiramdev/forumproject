@extends('layouts.backMaster')

@section('content')

	<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Categories</h3>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="ln_solid"></div>
				<div class="row">
         	<div class="col-md-4 col-xs-12">
              <div class="x_panel">

                 <div class="x_title">
                       <h2>{{$mode}} Category</h2>
                       <div class="clearfix"></div>
                </div>

                <div class="x_content">
                       <br>
                        @if($mode == 'New')

                          {!!Form::open(['route'=>'categorias.store', 'method'=>'POST'])!!}
                            @include('backoffice.categorias.form')
                          {!!Form::close()!!}

                          @elseif($mode == 'Edit')

                          {!!Form::model($categoria,['route'=>['categorias.update',$categoria->id], 'method'=>'PUT'])!!}
                            @include('backoffice.categorias.form')                       
                          {!!Form::close()!!}

                        @endif
                 </div>

              </div>
            


      	    									
        	</div>
   				<div class="col-md-8 col-xs-12">
					  @include('backoffice.categorias.table')
        	</div>
     		</div>
      </div>
    </div>
  <!-- End page content -->

@endsection