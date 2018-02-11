<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>

@include('layouts.title')

    </title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" projet de soutenance Master">
    <meta name="author" content=" Koffi Kassi Eric ; kassieric60@gmail.com; (+225 47 79 22 09)">



    <!-- ---------------------- DEBUT SCRIPT IMPRESSION ----------------------->

    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/css/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{asset('admin/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!--------------------------------  DEBUT SCRIPT IMPRESSION ----------------------->








    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/MoneAdmin.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/Font-Awesome/css/font-awesome.css')}}" />


    <link rel="stylesheet" type="text/css" href="{{asset('lib/bootstrap/css/bootstrap.css')}}">



    <link rel="stylesheet" href="{{asset('stylelist.css')}}">
    <link rel="stylesheet" href="{{asset('stylerech.css')}}">
    <link rel="stylesheet" href="{{asset('style1.css')}}">
    <link rel="stylesheet" href="{{asset('style2.css')}}">
    <link rel="stylesheet" href="{{asset('stylemodalcote.css')}}">
    <link rel="stylesheet" href="{{asset('styleuser1.css')}}">


    <link rel="stylesheet" href="{{asset('lib/font-awesome/css/font-awesome.css')}}">

    <script src="{{asset('lib/jquery-1.11.1.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('lib/jQuery-Knob/js/jquery.knob.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="{{asset('stylesheets/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('stylesheets/premium.css')}}">

</head>

<div class=" theme-blue" style="background-color:rgb(221,221,221)">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});

        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover {
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>

    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">


  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!-->

  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="#"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> GestClient</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px; color: white"></span>Com.<i style="color:white"> {{$nom}} </i>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="#myModal22" role="button" class="btn btn-info " data-toggle="modal" style="color: blue">Mon profil</a></li>

                <li class="dropdown-header"></li>


                <li class="divider"></li>
                <li><a tabindex="-1" href="{{route('deconnexion')}}" style="color: darkred"><strong>Deconnexion</strong></a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div >






<!----------- MODAL MODIFIER PASSWORD USER----------------------------------------------------------------->

<div class="modal left fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-header" style="background-color:rgb(204,204,255)" >

                <h2 id="myModalLabel"><strong style="color: darkblue">Modifier Votre Mot de Passe</strong></h2>
            </div>

            <div class="container">


                <div class="row">




                    <form class="form-horizontal" method="post" action="{{ route('modifPasswordUser') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label"><strong>Email**:</strong></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control span12" name="email"  required autofocus>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label"><strong>Nouveau Mot de Passe**:</strong></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control span12" name="password"  required autofocus>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                <button class="btn btn-danger pull-right" data-dismiss="modal" aria-hidden="true">Fermer</button>
                                <button type="submit" class="btn btn-success pull-left">Modifier</button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>


    </div><!-- modal-content -->
</div><!-- modal-dialog -->

<!----------- FIN MODAL MODIFIER PASSWORD USER------------------------------------------------------------------->





    <div class="sidebar-nav">
    <ul>
    <li><a href="{{route('corps')}}" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-table"></i><strong style="color: darkblue">MENU Commercial</strong>  <i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">

    </ul></li>

       <nav style=""> <li><a href="#" data-target=".accounts-menu" class="nav-header " data-toggle="collapse" ><i class="fa fa-users"></i><strong> CLIENT</strong> <span class="label label-info">{{$clients}}</span></a></li></nav>
        <li><ul class="dashboard-menu nav nav-list collapse in">
            <li ><a href="{{route('ajouteclient')}}"><span class="fa fa-caret-right"></span> Ajouter</a></li>
                <li ><a href="{{route('listeclient')}}"><span class="fa fa-caret-right"></span> Liste</a></li>

            </ul></li>






        <a href="{{route('listeRapport')}}" role="button" class="nav-header collapsed" data-toggle="modal"><h7><i class="fa fa-list-alt"></i></h7><strong>RAPPORT</strong></a>
        <li><a href="{{route('ajoutereclamation')}}" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-envelope"></i><strong > RECLAMATION</strong> <span class="label label-danger">{{$reclamations}}</span></a></li>






        <li><a href="#" data-target=".accounts-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-users"></i> <strong>RDV</strong> <span class="label label-info"></span></a></li>
        <li><ul class="dashboard-menu nav nav-list collapse in">
                <li ><a href="{{route('rdv')}}"><span class="fa fa-caret-right"></span>Rdv programmé <span class="label label-info">{{$rdvs}}</span></a></li>

            </ul></li>



     <!------   <li><a href="" data-target=".accounts-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-users"></i> EVERNEMENT <span class="label label-info">+4</span></a></li>
        <li><ul class="dashboard-menu nav nav-list collapse in">
                <li ><a href="{{route('evernement')}}"><span class="fa fa-caret-right"></span> programmer</a></li>
                <li ><a href="{{route('reporte.evernement')}}"><span class="fa fa-caret-right"></span> Reporté<span class="label label-info">+5</span></a></li>

            </ul></li>  ----------------->

        <li><a href="#" data-target=".accounts-menu" class="nav-header" data-toggle="collapse"> <strong></strong></a></li>


        <li><a href="#" data-target=".accounts-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-book"></i> <strong>ARCHIVE</strong><span class="label label-info"></span></a></li>
        <li><ul class="dashboard-menu nav nav-list collapse in">
                <li ><a href="{{route('achive.reclamation')}}"><span class="fa fa-caret-right"></span> reclamation <span class="label label-info"> {{$archiveReclams}}</span></a></li>
                <li ><a href="{{route('achive.rdv')}}"><span class="fa fa-caret-right"></span> Rdv <span class="label label-info">{{$archiveRdvs}}</span></a></li>

            </ul></li>






            </ul>
    </div>






    <div class="content">
        <div class="header">
            <div class="stats">

                <p class="stat"><a href="{{route('rdv')}}"><span class="label label-info">{{$rdvs}}</span></a> Rdv</p>

                <p class="stat"><a href="{{route('ajoutereclamation')}}"><span class="label label-danger">{{$reclamations}}</span></a> Reclamations</p>
   </div>

          <a href="{{route('corps')}}"><img src="{{asset('images/logo.png')}}"/></a>
                    <ul class="breadcrumb">
            <li ><strong><a href="{{route('corps')}}">Home</a></strong> </li>

        </ul>

        </div>





            @yield('content')





            <footer>
                <hr>

                <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                <strong> <a href="{{route('deconnexion')}}">Deconnexion</a></strong>   <p class="pull-right">En <a href="#">2017</a> par <a href="# ">Kassi Eric</a></p>

            </footer>

    </div>
</div>




    <script src="{{asset('lib/bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>







    <!-- ---------- DEBUT jQuery  IMPRESSION -->

    <!-- Bootstrap -->

    <!-- FastClick -->
    <script src="{{asset('admin/js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admin/js/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/js/icheck.min.js')}}"></script>




    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/datatables.scroller.min.js')}}"></script>
    <script src="{{asset('admin/js/jszip.min.js')}}"></script>
    <script src="{{asset('admin/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/js/vfs_fonts.js')}}"></script>
     <script src="{{asset('js/traitementJs.js')}}"></script>



<script src="{{asset('js/emailjs.js')}}" type="text/javascript"></script>

    <script src="{{asset('admin/js/custom.min.js')}}"></script>

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
                ajax: "{{asset('js/datatables/json/scroller-demo.json')}}",
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


</div>

</body>








</html>
