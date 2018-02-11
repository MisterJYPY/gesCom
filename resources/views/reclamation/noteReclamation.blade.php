
@extends('layouts.index')
@section('content')






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

    <div class="row">

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









            <div class="panel col-sm-11 col-md-11 " style="background-color:rgb(229,229,229);margin-left: 50px">
                <div class="panel-heading custom-header-panel">
                    <h2 class="panel-title roboto" style="color: darkred"> <i class="glyphicon glyphicon-envelope"></i>Noter une <strong>RECLAMATION</strong> </h2>

                </div>
                <div class="container">


                    <div class="col-sm-8 contact-form" style="margin-top:70px;">
                        <form id="contact" method="post" class="form"  action="{{route('/enrgreclamationdclient',$reclam->id)}}" >
                            <div class="row">

                                {{ csrf_field() }}
                                <div class="col-xs-6 col-md-6 form-group"><strong>Nom:</strong>
                                    <input class="form-control" disabled="true" id="nom" name="nom" value="{{$reclam->nom}}" type="text" required  />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong>Pénom:</strong>
                                    <input class="form-control"  disabled="true" id="prenom" name="prenom" value="{{$reclam->prenom}}" type="text" required />
                                </div>



                                <div class="col-xs-6 col-md-6 form-group"><strong>Adresse:</strong>
                                    <input class="form-control" disabled="true" id="adresse" name="adresse" value="{{$reclam->adresse}}" type="text" required />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong>Contact:</strong>
                                    <input class="form-control" disabled="true" id="contact" name="contact" value="{{$reclam->contact}}" type="tel" required />
                                </div>



                                <div class="col-xs-6 col-md-6 form-group"><strong style="color: darkblue">Date de la reclamtion **:</strong>(m/j/a)
                                    <input class="form-control" id="datepicker" name="date"  readonly="true" type="tel" required />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong style="color: darkblue">Heure de la reclamation**:</strong>
                                    <input class="form-control" id="timepicker_start" name="heure" readonly="true"  type="tel" required />
                                </div>


                                <div class="col-xs-6 col-md-6 form-group"><strong style="color: darkblue">Objet **:</strong>
                                    <textarea class="form-control" id="objet" name="objet" type="tel" required ></textarea>
                                </div>

                            </div>

                            <br />
                            <div class="row">
                                <div class="col-xs-12 col-md-12 form-group">
                                    <button class="btn btn-primary pull-right" type="submit">Enregistrer</button></div></div>
                        </form>
                    </div>
                </div>
            </div>





    </div>





</body>

@endsection

