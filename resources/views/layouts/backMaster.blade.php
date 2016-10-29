
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Forum! | Dashboard </title>

    <!-- Bootstrap -->
    {{ Html::style('back/vendors/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- Font Awesome -->
    {{ Html::style('back/vendors/font-awesome/css/font-awesome.min.css') }}
    <!-- NProgress -->
    {{ Html::style('back/vendors/nprogress/nprogress.css') }}
    <!-- Custom Theme Style -->
    {{ Html::style('back/build/css/custom.min.css') }}

    <!-- jQuery -->
    {{ Html::script('back/vendors/jquery/dist/jquery.min.js') }}

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span><i>Project</i><b>FORUM</b></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                {{ Html::image('/uploads/avatars/'.Auth::user()->avatar, 'a picture', array('class' => 'img-circle profile_img')) }}
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>

                @if(Auth::user()->rol == 2)

          <!--  ////  ADMINISTRATOR SIDEBAR  \\\\ -->

                <ul class="nav side-menu">
                  <li><a href="{{ url('/backoffice') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>

                  <li>
                    <a href="{{ url('/backoffice/categorias') }}"><i class="fa fa-edit"></i> Categories </a>
                  </li>
                  
                  <li>
                    <a href="{{ url('/backoffice/subcategorias') }}"><i class="fa fa-edit"></i> Subcategories </a>
                  </li>

                  <li>
                    <a href="{{ url('/backoffice/topics') }}"><i class="fa fa-edit"></i> Topics </a>
                 </li>

                  <li>
                    <a href="{{ url('/backoffice/users') }}"><i class="fa fa-user"></i> Users </a>
                  </li>

                  <li>
                    <a href="{{ url('/profile') }}"><i class="fa fa-user"></i> Profile </a>
                  </li>
                  
                </ul>
          
                <!--  //// END ADMINISTRATOR SIDEBAR  \\\\ -->
                @else

                <!--  ////  BASIC USER SIDEBAR  \\\\ -->
                  
                  <ul class="nav side-menu">
                    <li>
                      <a href="{{ url('/profile') }}"><i class="fa fa-edit"></i> Profile </a>
                    </li>
                  </ul>
                  
                  <!--  ////  END BASIC USER SIDEBAR  \\\\ -->
                  @endif

              </div>

             </div>
            <!-- /sidebar menu -->

           
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="" style="padding-top: 10px;">
                  <a href="{{ url('/') }}" class="btn btn-success" style="line-height: 10px; color: #fff !important;">Forum</a>
                </li>
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    {{ Html::image('/uploads/avatars/'.Auth::user()->avatar, 'a picture') }}{{ Auth::user()->email }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->



        @yield('content')




        <!-- footer content -->
        <footer>
          <div class="pull-right">
            
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    <!-- Bootstrap -->
    {{ Html::script('back/vendors/bootstrap/dist/js/bootstrap.min.js') }}
    <!-- FastClick -->
    {{ Html::script('back/vendors/fastclick/lib/fastclick.js') }}
    <!-- NProgress -->
    {{ Html::script('back/vendors/nprogress/nprogress.js') }}   
    <!-- Custom Theme Scripts -->
    {{ Html::script('back/build/js/custom.min.js') }}
    <!-- iCheck -->
    {{ Html::script('back/vendors/iCheck/icheck.min.js') }}
    <!-- Datatables -->
    {{ Html::script('back/vendors/datatables.net/js/jquery.dataTables.min.js') }}
    {{ Html::script('back/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
    {{ Html::script('back/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}
    {{ Html::script('back/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}
    {{ Html::script('back/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}
    {{ Html::script('back/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}
    {{ Html::script('back/vendors/datatables.net-buttons/js/buttons.print.min.js') }}
    {{ Html::script('back/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}
    {{ Html::script('back/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}
    {{ Html::script('back/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}
    {{ Html::script('back/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}
    {{ Html::script('back/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}
    {{ Html::script('back/vendors/jszip/dist/jszip.min.js') }}
    {{ Html::script('back/vendors/pdfmake/build/pdfmake.min.js') }}
    {{ Html::script('back/vendors/pdfmake/build/vfs_fonts.js') }}
    

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

  </body>
</html>
