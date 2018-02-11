
@extends('layouts.index')
@section('content')




    <!------------------------------ APPEL JS CALENDRIER------------------------------->


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <!------------------------------FIN ------------------------------->



    </head>
    <body>







        <div class="row" style="background-color:rgb(221,221,221);margin-left: 50px">

            <div class="panel col-sm-11 col-md-11">
                <div class="panel-heading custom-header-panel">
                    <h3 class="panel-title roboto">Archivez Votre Rendez - Vous <i class="fa fa-book"></i> </h3>

                </div>
                <div class="container">


                    <div class="col-sm-8 contact-form" style="margin-top:70px;">
                        <form id="contact" method="post" class="form"  action="{{route('/updatearchiverreclamation',$reclamation->id)}}" >
                            <div class="row">

                                {{ csrf_field() }}

                                <div class="col-xs-6 col-md-6 form-group"><strong>Nom Client:</strong>
                                    <input disabled="true" class="form-control" id="nom" name="nom" value="{{$reclamation->nom}}" type="text" required  />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong>Contact Client:</strong>
                                    <input disabled="true" class="form-control" id="contact" name="contact" value="{{$reclamation->contact}}" type="text" required />
                                </div>

                                <div class="col-xs-6 col-md-6 form-group"><strong>Adresse Client:</strong>
                                    <input disabled="true" class="form-control" id="adresse" name="adresse" value="{{$reclamation->adresse}}" type="text" required />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong>Heure:</strong>
                                    <input disabled="true" class="form-control" id="timepicker_start" name="heure" value="{{$reclamation->heure}}" type="text" required />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong>Date:</strong>(m/j/a)
                                    <input disabled="true" class="form-control" id="datepicker" name="date" value="{{$reclamation->date}}" type="text" required />
                                </div>

                                <div class="col-xs-6 col-md-6 form-group"><strong>Objet:</strong>
                                    <input disabled="true" class="form-control" id="objet" name="objet" value="{{$reclamation->objet}}" type="text" required />
                                </div>


                                <div class="col-xs-6 col-md-6 form-group"><strong style="color: darkblue;">Motif:</strong>
                                    <textarea class="form-control" id="motif" name="motif" type="text" required ></textarea>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-xs-12 col-md-12 form-group">
                                    <button class="btn btn-warning pull-right" type="submit">Archiver</button></div></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </body>
@endsection