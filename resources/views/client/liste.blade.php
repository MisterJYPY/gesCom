
@extends('layouts.index')
@section('content')


    @if(Session::has('sucess'))

        <div class="alert alert-success">
            {{Session::get('sucess')}} <strong><i class="	glyphicon glyphicon-thumbs-up"></i></strong>
        </div>


    @endif


    @if(Session::has('sucessEmail'))

        <div class="alert alert-success">
            {{Session::get('sucessEmail')}}.
           <strong>Groupe :{{session('groupechoisi')}} </strong>
        </div>


    @endif



    @if(Session::has('EchecEmail'))

        <div class="alert alert-danger">

            {{Session::get('EchecEmail')}}
            <strong>Groupe :{{session('groupechoisi')}} </strong>

        </div>


    @endif


    @if(Session::has('sucessRDv'))

        <div class="alert alert-success">
            {{Session::get('sucessRDv')}}
        </div>


    @endif


    @if(Session::has('echecRDv'))

        <div class="alert alert-danger">
          <strong style="color:red"> <i class="glyphicon glyphicon-remove-sign"></i></strong> {{Session::get('echecRDv')}}
        </div>


    @endif



    @if(Session::has('echecReclamm'))

        <div class="alert alert-danger">
            <strong style="color:red"> <i class="glyphicon glyphicon-remove-circle"></i></strong> {{Session::get('echecReclamm')}}
        </div>


    @endif


    @if(Session::has('sucessModif'))

        <div class="alert alert-success">
            {{Session::get('sucessModif')}}
        </div>


    @endif




@if(Session::has('sucessclientMultiple'))

        <div class="alert alert-success">
            {{Session::get('sucessclientMultiple')}} <strong><i class="	glyphicon glyphicon-thumbs-up"></i></strong>
        </div>


    @endif



    @if(Session::has('ClientExiste'))

        <div class="alert alert-warning">
            {{Session::get('ClientExiste')}} <strong> <i class="glyphicon glyphicon-thumbs-down"></i> </strong>

        </div>


    @endif

    @if(Session::has('clientMultipleExiste'))

        <div class="alert alert-warning">

            {{Session::get('clientMultipleExiste')}} <strong> <i class="glyphicon glyphicon-thumbs-down"></i> </strong>


        </div>

    @endif



    @if(Session::has('succesEtoile'))

        <div class="alert alert-success">

            {{Session::get('succesEtoile')}} <strong> <i class="	glyphicon glyphicon-ok"></i> </strong>

        </div>

    @endif

    @if(Session::has('echecEtoile'))

        <div class="alert alert-warning">

            {{Session::get('echecEtoile')}} <strong> <i class="glyphicon glyphicon-thumbs-down"></i> </strong>

        </div>

    @endif


    @if(Session::has('succesEtoileMoin'))

        <div class="alert alert-success">

            {{Session::get('succesEtoileMoin')}}<strong> <i class="	glyphicon glyphicon-ok"></i> </strong>

        </div>

    @endif


    @if(Session::has('echecEtoileMoin'))

        <div class="alert alert-warning">

            {{Session::get('echecEtoileMoin')}}<strong> <i class="glyphicon glyphicon-thumbs-down"></i> </strong>

        </div>

    @endif







    <!------------------------------ FORM MODAL AJOUTER CONTACT ------------------------------->

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2 id="myModalLabel"><strong> <i class="fa fa-user"></i>Ajouter nouveau Client</strong></h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal col-sm-12" method="post" action="{{route('enregisteclient2')}}">

                        {{csrf_field()}}

                        <div class="col-xs-6 col-md-6 form-group">
                            <input class="form-control" id="nom" name="nom" placeholder="Nom client**" type="text" required autofocus />
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
                            </select>
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



                            <div class="form-group"><button type="submit" class="btn btn-success pull-right">Enregistrer</button>
                         <button class="btn btn-danger pull-left" data-dismiss="modal" aria-hidden="true">Fermer</button> </div>

                    </form>
                </div>
            <div class="modal-footer">

            </div>


            </div>
        </div>
    </div>
    <!------------------------------------- -------------------------------->





    <!-------------------------------------Fenetre modal email -------------------------------->





    <div id="ModalMessage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h2 id="myModalLabel"> <i class="fa fa-envelope"></i>Envoyez Email</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal col-sm-12" method="post" action="{{route('mail.envoi')}}">
                        {{ csrf_field() }}

                        <br />
                        <!-- Select Destinataire -->
                        <div class="control-group">
                            <label for="destinataire"><strong>Sélectionnez un Groupe</strong></label>
                            <select id="FormMessageDestinatiare"class="form-control" name="choix" required>
                                <option  selected="selected"> </option>
                                <option name="choix" selected="selected">Particulier</option>
                                <option name="choix" selected="selected">Marchand</option>
                                <option name="choix" selected="selected">Distributeur</option>
                                <option name="choix" selected="selected">Promoteur</option>
                            </select>
                        </div>
                        <br />
                        <!-- input Sujet -->
                        <div class="control-group">
                            <label for="destinataire"><strong>Sujet</strong></label>
                            <input name="sujet" type="text" class="form-control" required>
                        </div>
                        <br />
                        <!-- TextArea Message -->
                        <div class="control-group">
                            <label for="destinataire"><strong>Message</strong></label>
                            <textarea id="FormMessageMessage" name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <br />



                        <div class="form-group"><button type="submit" class="btn btn-info pull-right"><span class="fa fa-send"> Envoyer </span></button>
                            <button class="btn btn-danger pull-left" data-dismiss="modal" aria-hidden="true">Fermer</button> </div>

                    </form>
                </div>
                <div class="modal-footer">

                </div>


            </div>
        </div>
    </div>





    <!-- Modal -->



    <!------------------------------------- -------------------------------->







            <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:rgb(185,220,255)">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> <i class="fa fa-users"></i>Listes des Clients <a href="#myModal" role="button" class="btn btn-primary " data-toggle="modal"><h7><i class="fa fa-plus"></i></h7>Ajouter Client</a> <a href="#ModalMessage" role="button" class="btn btn-info " data-toggle="modal"><h7><i class="fa fa-envelope"></i></h7>Envoyer Email</a> </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" >
                        <table id="datatable-buttons" class="table table-striped table-bordered" >
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Groupe</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Contact</th>
                                <th>Observation</th>
                                <th>Action</th>
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
                                <th>Observation</th>
                                <th>Action</th>
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

                                    <td>

                                        @if($liste->groupe !='Particulier')

                                        <a href="{{url("etoilePlus/{$liste->id}")}}">  <strong class="btn btn-danger">  <i class="fa fa-plus"></i> </strong></a>


                                    @for($i=0;$i<$liste->etoile;$i++)
                                          <strong style="color: darkorange">  <i class="glyphicon glyphicon-star-empty"></i> </strong>

                                            @endfor


                                        <a href="{{url("etoileMoin/{$liste->id}")}}"> <strong class="btn btn-default">  <i class="fa fa-minus"></i> </strong> </a>
                                        @endif

                                    </td>
                                 <td>
                                     <a href="{{url("/edit/{$liste->id}")}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Cliquez pour Modifier"></i> </a>   <a href="{{url("/prendrerdvclient/{$liste->id}")}}" class="btn btn-success btn-xs"><i class="	glyphicon glyphicon-time" title="Programmer un RDV"></i> </a> <a href="{{url("/reclamationclient/{$liste->id}")}}" class="btn btn-danger btn-xs"><i class="	glyphicon glyphicon-lock" title="Reclamation Cliente"></i> </a> </td>

                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>







    <script src="js/jslist1.js" type="text/javascript"></script>



<script src="js/emailjs.js" type="text/javascript"></script>

   @endsection
