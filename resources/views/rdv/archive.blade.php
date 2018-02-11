
@extends('layouts.index')
@section('content')


    <div class="container" style="background-color:rgb(204,204,255)">
        <div class="row" style="background-color:rgb(204,204,255)">

            <div class="panel col-sm-10 col-md-10 fa fa-book " style="background-color:rgb(229,229,229)">
                <div class="panel-heading custom-header-panel">
                    <h1 class="panel-title roboto"><strong> <i class="glyphicon glyphicon-book"></i>Archivez votre RDV</strong></h1>

                </div>
                <div class="container">


                    <div class="col-sm-8 contact-form" style="margin-top:70px;">
                        <form id="contact" method="post" class="form"  action="{{route('/updatearchiverdv',$rdv->id)}}" >
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
                                <div class="col-xs-6 col-md-6 form-group"><strong>Heure Debut:</strong>
                                    <input class="form-control" disabled="true"   name="heured" value="{{$rdv->heure_debut}}" type="text" required />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong>Heure Fin:</strong>
                                    <input class="form-control" disabled="true" id="" name="heuref" value="{{$rdv->heure_fin}}" type="text" required />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group"><strong>Date :</strong>(m/j/a)
                                    <input class="form-control" disabled="true" id="" name="date" value="{{$rdv->date}}" type="text" required />
                                </div>

                                <div class="col-xs-6 col-md-6 form-group"><strong>Objet:</strong>
                                    <input class="form-control" id="objet" disabled="true" name="objet" value="{{$rdv->objet}}" type="text" required />
                                </div>


                                <div class="col-xs-6 col-md-6 form-group"><strong style="color: darkblue">Motif:</strong>
                                    <textarea class="form-control" id="motif" name="motif"  type="text" required ></textarea>
                                </div>


                            </div>

                            <br />
                            <div class="row">
                                <div class="col-xs-12 col-md-12 form-group">
                                    <button class="btn btn-warning pull-right" type="submit">Archiver</button></div></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection