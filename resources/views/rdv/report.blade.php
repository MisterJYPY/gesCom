
@extends('layouts.index')
@section('content')




    <!------------------------Debut js date ------------------------------->

    <link rel="stylesheet" href="{{asset('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('/resources/demos/style.css')}}">

    <script src="{{asset('js/js1Date.js')}}"></script>
    <script src="{{asset('js/js2Date.js')}}"></script>

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>


    <!--------------------------Fin js date------------------------------->

     <!-----------------------Debut appel Js heure------------------------------->

    <link rel="stylesheet" href="{{asset('include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css')}}" type="text/css" />
    <link rel="stylesheet" href=" {{asset('jquery.ui.timepicker.css?v=0.3.3')}}" type="text/css" />


    <script type="text/javascript" src="{{asset('include/ui-1.10.0/jquery.ui.core.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('include/ui-1.10.0/jquery.ui.widget.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('include/ui-1.10.0/jquery.ui.tabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('include/ui-1.10.0/jquery.ui.position.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('jquery.ui.timepicker.js?v=0.3.3')}}"></script>



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



    </head>
    <body>


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






    <div class="container" style="background-color:rgb(221,221,221)">
        <div class="row" style="background-color:rgb(221,221,221)">

            <div class="panel col-sm-10 col-md-10 "  style="background-color:rgb(229,229,229);margin-left: 50px">
                <div class="panel-heading custom-header-panel fa fa-plane">
                    <h3 class="panel-title roboto"> <i class="glyphicon glyphicon-dashboard"></i>Reportez votre RDV</h3>

                </div>
                <div class="container">


                    <div class="col-sm-8 contact-form" style="margin-top:70px;">
                        <form id="contact" method="post" class="form"  action="{{route('/updatereportrdv',$rdv->id)}}" >
                            <div class="row">

                                {{ csrf_field() }}
                                <div class="col-xs-6 col-md-6 form-group"><strong>Nom Client:</strong>
                                    <input class="form-control" disabled="true" id="nom" name="nom" value="{{$rdv->nom}}" type="text" required  />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong>Contact Client:</strong>
                                    <input class="form-control" disabled="true" id="contact" name="contact" value="{{$rdv->contact}}" type="tel" required />
                                </div>

                                <div class="col-xs-6 col-md-6 form-group"><strong>Adresse Client:</strong>
                                    <input class="form-control" disabled="true" id="adresse" name="adresse" value="{{$rdv->adresse}}" type="text" required />
                                </div>



                                <div class="col-xs-6 col-md-6 form-group"><strong>Date prevue:</strong>(m/j/a)
                                    <input class="form-control" disabled="true" id="" name="date" value="{{$rdv->date}}" type="text" required />
                                </div>


                                <div class="col-xs-6 col-md-6 form-group"><strong>Objet:</strong>
                                    <input class="form-control" id="objet" disabled="true" name="objet" value="{{$rdv->objet}}" type="text" required />
                                </div>






                                <div class="col-xs-6 col-md-6 form-group"><strong>Heure Debut Prevue:</strong>
                                    <input class="form-control" disabled="true"  name="heuredp" value="{{$rdv->heure_debut}}" type="text" required />
                                </div>

                                <div class="col-xs-6 col-md-6 form-group"><strong>Heure Fin Prevue:</strong>
                                    <input class="form-control"   disabled="true" name="heurefp"  value="{{$rdv->heure_fin}}" type="text" required />
                                </div>


                                <div class="col-xs-6 col-md-6 form-group"><strong style="color:darkblue;">Heure Debut Report:</strong>
                                    <input class="form-control"  id="timepicker_start" name="heuredr"  readonly="true" type="text" required />
                                </div>



                                <div class="col-xs-6 col-md-6 form-group"><strong style="color: darkblue">Heure Fin Report:</strong>
                                    <input class="form-control" id="timepicker_end"  readonly="true" name="heurefr"  type="text" required />
                                </div>

                                <div class="col-xs-6 col-md-6 form-group"><strong style="color: darkblue">Date du Report:</strong>(m/j/a)
                                    <input class="form-control" readonly="true" id="datepicker" name="datereport"  type="text" required />
                                </div>




                                <div class="col-xs-6 col-md-6 form-group"><strong style="color: darkblue">Motif du Report:</strong>
                                    <textarea class="form-control"   name="motifReport"  type="text" required ></textarea>
                                </div>

                            </div>

                            <br />
                            <div class="row">
                                <div class="col-xs-12 col-md-12 form-group">
                                    <button class="btn btn-info pull-right" type="submit">Reporter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection