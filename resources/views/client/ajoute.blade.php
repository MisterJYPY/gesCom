
@extends('layouts.index')
@section('content')



    @if(Session::has('sucess'))

        <div class="alert alert-success">
            {{Session::get('sucess')}}
        </div>

    @endif
    @if(Session::has('sucess2'))

        <div class="alert alert-success">
            {{Session::get('sucess2')}}
        </div>

    @endif



    @if(Session::has('clientExiste'))

        <div class="alert alert-warning">

            {{Session::get('clientExiste')}} <strong> Commercial:{{$commcia}}</strong>
        </div>

    @endif
    @if(Session::has('clientExiste2'))

        <div class="alert alert-warning">

            {{Session::get('clientExiste2')}} <strong> Commercial:{{$commcia}}</strong>
        </div>

    @endif


    @if(Session::has('ErreurContact'))

        <div class="alert alert-warning">
            {{Session::get('ErreurContact')}}

        </div>


    @endif





    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">





    <!------------------------------ FORM MODAL AJOUTER CONTACT ------------------------------->

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: red"><strong>X</strong></button>
                    <h3 id="myModalLabel"><strong>Choisissez le nombre de client(s) à enregistrer</strong></h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal col-sm-12" method="get" action="{{route('nombre.contact')}}">


                        <div class="col-xs-6 col-md-6 form-group">

                            <select class="form-control" name="choix">
                                <option name="choix" selected="selected"> </option>
                                @for($i=1; $i<11;$i++)
                                <option name="choix" selected="selected"> {{$i}}</option>
                                @endfor
                            </select>
                        </div>


                       <br><br><br>

                        <div class="form-group" > <i style="color: darkgreen"><button type="submit" class="btn btn-success pull-left">Valider</button></i>
                            <button class="btn btn-danger pull-right" data-dismiss="modal" aria-hidden="true">Annuler</button> </div>

                    </form>
                </div>
                <div class="modal-footer">

                </div>


            </div>
        </div>
    </div>
    <!------------------------------------- -------------------------------->


        <div class="row">

            <div class="panel col-sm-10 col-md-10 " style="background-color:rgb(204,204,255);margin-left: 50px">
                <div class="panel-heading custom-header-panel">
                    <h1 class="panel-title roboto"><strong> Enregistrez Nouveau Client</strong></h1>
                    <a href="#myModal" role="button" class="btn btn-info col-xs-3 col-md-3 pull-right " title="Ajoutez en groupe" data-toggle="modal"> <strong/><i class="fa fa-users"></i>Plusieurs</a> </h3>
                </div>
                <div class="container">


                    <div class="col-sm-8 contact-form" style="margin-top:70px;">
                        <form id="contact" method="post" class="form"  action="{{route('enregisteclient')}}" >
                            <div class="row">

                                {{ csrf_field() }}
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="nom" name="nom" placeholder="Nom client**" type="text" required  />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="prenom" name="prenom" placeholder="Prénoms client**" type="text" required />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email client" type="email"  />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="adresse" name="adresse" placeholder="Adresse client**" type="text" required />
                                </div>
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="contact" name="contact" placeholder="Contact client**" type="tel" required />
                                </div>

                                <div class="col-xs-6 col-md-6 form-group">

                                    <select class="form-control" name="choix" required>
                                        <option name="choix" selected="selected"></option>
                                        <option name="choix" selected="selected">Particulier</option>
                                        <option name="choix" selected="selected">Marchand</option>
                                        <option name="choix" selected="selected">Distributeur</option>
                                        <option name="choix" selected="selected">Promoteur</option>
                                    </select>.
                                </div>



                                <div class="col-xs-6 col-md-6 form-group">
                                         Observation:
                                    <select class="form-control" name="etoile" required>
                                        <option name="etoile" selected="selected"></option>
                                        <option name="etoile" selected="selected">1</option>
                                        <option name="etoile" selected="selected">2</option>
                                        <option name="etoile" selected="selected">3</option>

                                    </select>
                                </div>


                                <div class="col-xs-6 col-md-6 form-group">
                                    <img src="{{asset('images/explication.jpg')}}"/>
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












                <div class="col-md-11 col-sm-11 col-xs-11">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> <i class="fa fa-users"></i>Listes des 10 derniers Clients  </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Groupe</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Contact</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Groupe</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Contact</th>

                                </tr>
                                </tfoot>
                                <tbody>






                                @foreach($liste as $liste)
                                    <tr>
                                        <td>{{$liste->created_at}}</td>
                                        <td style="color: blue">{{$liste->groupe}}</td>
                                        <td>{{$liste->nom}}</td>
                                        <td>{{$liste->prenom}}</td>

                                        @if($liste->email=='emailnull@g.com')

                                            <td style="color: red">{{$liste->email}}</td>
                                        @else

                                            <td >{{$liste->email}}</td>
                                        @endif


                                        <td>{{$liste->adresse}}</td>
                                        <td>{{$liste->contact}}</td>

                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

@endsection

