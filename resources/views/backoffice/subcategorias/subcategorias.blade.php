@extends('layouts.backMaster')

@section('content')

	<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Subcategories</h3>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="ln_solid"></div>
        <div class="row">
          <div class="col-md-4 col-xs-12">
              <div class="x_panel">

                 <div class="x_title">
                       <h2>{{$mode}} Subcategories</h2>
                       <div class="clearfix"></div>
                </div>

                  @include('backoffice.resources.alerts')
                
                <div class="x_content">
                       <br>
                        @if($mode == 'New')

                          {!!Form::open(['route'=>'subcategorias.store', 'method'=>'POST'])!!}
                            @include('backoffice.subcategorias.form')
                          {!!Form::close()!!}

                          @elseif($mode == 'Edit')

                          {!!Form::model($subcategoria,['route'=>['subcategorias.update',$subcategoria->id], 'method'=>'PUT'])!!}
                            @include('backoffice.subcategorias.form')                       
                          {!!Form::close()!!}

                        @endif
                 </div>

              </div>
            


                              
          </div>
          <div class="col-md-8 col-xs-12">
            @include('backoffice.subcategorias.table')
          </div>
        </div>
      </div>
    </div>
  <!-- End page content -->

@endsection