
@extends('layouts.index')
@section('content')


    @if(Session::has('sucess'))

        <div class="alert alert-success">
            {{Session::get('sucess')}}
        </div>


    @endif



    @if(Session::has('sucessModif'))

        <div class="alert alert-success">
            {{Session::get('sucessModif')}}
        </div>


    @endif




    <!------------------------Debut js date ------------------------------->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="{{asset('js/js1Date.js')}}"></script>
    <script src="{{asset('js/js2Date.js')}}"></script>


    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>


    <!--------------------------Fin js date------------------------------->


    <!-----------------------Debut appel Js heure------------------------------->

    <link rel="stylesheet" href="include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
    <link rel="stylesheet" href="jquery.ui.timepicker.css?v=0.3.3" type="text/css" />


    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.widget.min.js"></script>

    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.tabs.min.js"></script>
    <script type="text/javascript" src="include/ui-1.10.0/jquery.ui.position.min.js"></script>
    <script type="text/javascript" src="jquery.ui.timepicker.js?v=0.3.3"></script>




    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-24327002-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        function plusone_clicked() {
            $('#thankyou').fadeIn(300);
        }

        $(document).ready(function() {
            $('#floating_timepicker').timepicker({
                onSelect: function(time, inst) {
                    $('#floating_selected_time').html('You selected ' + time);
                }
            });

            $('#tabs').tabs();

        });


    </script>



    <!----------------------Fin appel Js heure ------------------------------->


    </head>
    <body>








    <!---------------------Debut Js Heure ------------------------------->

        <div style="clear: both"></div>

        <div id="">



            <div>




                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#timepicker_start').timepicker({
                            showLeadingZero: false,
                            onSelect: tpStartSelect,
                            maxTime: {
                                hour: 16, minute: 30
                            }
                        });
                        $('#timepicker_end').timepicker({
                            showLeadingZero: false,
                            onSelect: tpEndSelect,
                            minTime: {
                                hour: 9, minute: 15
                            }
                        });
                    });

                    // when start time change, update minimum for end timepicker
                    function tpStartSelect( time, endTimePickerInst ) {
                        $('#timepicker_end').timepicker('option', {
                            minTime: {
                                hour: endTimePickerInst.hours,
                                minute: endTimePickerInst.minutes
                            }
                        });
                    }

                    // when end time change, update maximum for start timepicker
                    function tpEndSelect( time, startTimePickerInst ) {
                        $('#timepicker_start').timepicker('option', {
                            maxTime: {
                                hour: startTimePickerInst.hours,
                                minute: startTimePickerInst.minutes
                            }
                        });
                    }
                </script>




                <pre class="code" id="script_time_range" style="display: none">
$(document).ready(function() {
   $('#timepicker_start').timepicker({
       showLeadingZero: false,
       onSelect: tpStartSelect,
       maxTime: {
           hour: 16, minute: 30
       }
   });
   $('#timepicker_end').timepicker({
       showLeadingZero: false,
       onSelect: tpEndSelect,
       minTime: {
           hour: 9, minute: 15
       }
   });
});

// when start time change, update minimum for end timepicker
function tpStartSelect( time, endTimePickerInst ) {
   $('#timepicker_end').timepicker('option', {
       minTime: {
           hour: endTimePickerInst.hours,
           minute: endTimePickerInst.minutes
       }
   });
}

// when end time change, update maximum for start timepicker
function tpEndSelect( time, startTimePickerInst ) {
   $('#timepicker_start').timepicker('option', {
       maxTime: {
           hour: startTimePickerInst.hours,
           minute: startTimePickerInst.minutes
       }
   });
}
</pre>



            </div>




        </div>


        <!---------------------FIn js Heure ------------------------------->

    <!------------------------------ FORM MODAL AJOUTER CONTACT ------------------------------->

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h2 id="myModalLabel"><strong>Ajouter une visite</strong></h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal col-sm-10" method="post" action="{{route('enregistrevisite')}}">

                        {{ csrf_field() }}

                        <div class="form-group"><label><strong>Date**:</strong></label><input id="datepicker" data-date-format = "dd / mm / yyyy" class="form-control email"  name="date" data-placement="top" data-trigger="manual"  type="text" required></div>
                        <div class="form-group"><label><strong>Heure Debut**</strong></label><input id="timepicker_start" class="form-control phone"  data-placement="top" name="heured" data-trigger="manual"   type="text" required></div>
                        <div class="form-group"><label><strong>Heure Fin**</strong></label><input id="timepicker_end" class="form-control phone"  data-placement="top" name="heuref" data-trigger="manual"   type="text" required></div>
                        <div class="form-group"><label><strong>Agence**</strong></label><input class="form-control phone"  data-placement="top" name="nom" data-trigger="manual"   type="text" required></div>
                        <div class="form-group"><label><strong>Contact**:</strong></label><input class="form-control" type="tel" name="contact" data-placement="top" data-trigger="manual" required></div>
                        <div class="form-group"><label><strong>lieu**</strong></label><textarea class="form-control phone"  data-placement="top" data-trigger="manual" name="adresse"  type="text" required></textarea></div>

                        <div class="form-group"><label><strong>Objet**</strong></label><textarea class="form-control phone"  data-placement="top" data-trigger="manual" name="objet"  type="text" required></textarea></div>



                        <div class="form-group"><button type="submit" class="btn btn-success pull-right">Enregistrer</button>
                            <button class="btn btn-danger pull-left" data-dismiss="modal" aria-hidden="true">Annuler</button> </div>

                    </form>
                </div>
                <div class="modal-footer">

                </div>


            </div>
        </div>
    </div>
    <!------------------------------------- -------------------------------->



    <div class="btn-toolbar list-toolbar">



    </div>




        <div class="">

            <div class="row"  style="background-color:rgb(151,203,255)">

                <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:rgb(185,220,255)">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Les visites effectuées <a href="#myModal" role="button" class="btn btn-primary " data-toggle="modal"><h7><i class="fa fa-plus-square"></i></h7>Ajouter visite</a> </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Date Visite</th>
                                    <th>Heure Debut</th>
                                    <th>Heure Fin</th>
                                    <th>Agence</th>
                                    <th>Contact</th>
                                    <th>lieu</th>
                                    <th>Objet</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Date Visite</th>
                                    <th>Heure Debut</th>
                                    <th>Heure Fin</th>
                                    <th>Agence</th>
                                    <th>Contact</th>
                                    <th>lieu</th>
                                    <th>Objet</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>



                                @foreach($liste as $liste)
                                    <tr>

                                        <td>{{$liste->created_at}}</td>
                                        <td>{{$liste->date}}</td>
                                        <td>{{$liste->heure_debut}}</td>
                                        <td>{{$liste->heure_fin}}</td>
                                        <td>{{$liste->nom}}</td>
                                        <td>{{$liste->contact}}</td>
                                        <td>{{$liste->adresse}}</td>
                                        <td>{{$liste->objet}}</td>
                                        <td> <a href="{{url("/editvisite/{$liste->id}")}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Cliquez pour Modifier"></i> </a> </td>
                                    </tr>
                                @endforeach




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    <script src="js/jslist1.js" type="text/javascript"></script>
    <script src="js/jsliste.js"></script>
    </body>
    </html>

@endsection
