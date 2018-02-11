
@extends('admin.index')
@section('content')



    @if(Session::has('infoAdin'))

        <div class="alert alert-success">
            {{Session::get('infoAdin')}}
        </div>


    @endif



    @if(Session::has('sucessModifPassWord'))

        <div class="alert alert-success">
            {{Session::get('sucessModifPassWord')}} <strong>Mot de passe</strong> avec succes
        </div>


    @endif


    @if(Session::has('echecModifPassWord'))

        <div class="alert alert-warning">
            {{Session::get('echecModifPassWord')}}<strong>Mot de passe.Email ne correspond pas Email
                de l'ADMINISTRATEUR connecté.</strong>Merci
        </div>


    @endif




    @if(Session::has('echecTaillpassword'))

        <div class="alert alert-warning">
            {{Session::get('echecTaillpassword')}}<strong>Mot de passe.
                Mot de passe doit être au moins 6 caractères.
            </strong>Merci
        </div>


    @endif


    @if(Session::has('succesUser'))

        <div class="alert alert-success">
            {{Session::get('succesUser')}}.
             <strong>Profil: {{session('role')}}</strong><strong style="color:darkgreen"> <i class="glyphicon glyphicon-ok"></i></strong>
        </div>


    @endif



    @if(Session::has('EchecUser'))

        <div class="alert alert-danger">
            {{Session::get('EchecUser')}}.
            <strong>Profil: {{session('role')}}</strong>
        </div>

    @endif

    @if(Session::has('userBloque'))

        <div class="alert alert-warning">
            {{Session::get('userBloque')}}.
            <strong>Commercial: {{session('nom')}}</strong>
        </div>

    @endif


    @if(Session::has('userDeBloque'))

        <div class="alert alert-success">
            {{Session::get('userDeBloque')}}.
            <strong>Commercial: {{session('nom')}}</strong>
        </div>

    @endif
    @if(Session::has('sucessTransfertclient'))

        <div class="alert alert-success">
            {{Session::get('sucessTransfertclient')}}<strong style="color:darkgreen"> <i class="glyphicon glyphicon-ok"></i></strong>.
        </div>

    @endif
    @if(Session::has('EchecTransfertclient'))

        <div class="alert alert-warning">
            {{Session::get('EchecTransfertclient')}}.
        </div>

    @endif





        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Liste des commerciaux  <span class="label label-danger">{{$nombreCommercial}}</span></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Profil créé le</th>
                                <th>Pseudo</th>
                                <th>Email</th>
                                <th>VOIR</th>
                                <th></th>
                                <th></th>
                                <th>ETAT</th>



                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Pseudo</th>
                                <th>Email</th>
                                <th>VOIR</th>
                                <th></th>
                                <th></th>
                                <th>ETAT</th>

                            </tr>
                            </tfoot>
                            <tbody>



                   @foreach($listeCommercial as $listeCommercial)
                            <tr>
                                <th>{{$listeCommercial->created_at}}</th>
                                <td>{{$listeCommercial->name}}</td>
                                <td>{{$listeCommercial->email}}</td>


                                <td><a href="{{url("client.Commercial/{$listeCommercial->id}")}}"><span class="label label-info"> Client</span> </a>
                                <td><a href="{{url("rdv.commercial/{$listeCommercial->id}")}}"> <span class="label label-info"> Rdv</span></a> | <a href="{{url("rdv.commercialArchive/{$listeCommercial->id}")}}"> <span class="label label-default"> Rdv Archivé</span></a>  </td>
                                <td><a href="{{url("reclamation.commercial/{$listeCommercial->id}")}}"> <span class="label label-warning"> Reclamation</span></a> | <a href="{{url("reclamation.commercialArchive/{$listeCommercial->id}")}}"> <span class="label label-default"> Reclamation Archivée</span>

                                        | <a href="{{url("rapport.commercial/{$listeCommercial->id}")}}"> <span class="label label-info"> Rapport</span> </a>    </td>


                                @if( $listeCommercial->etat==1)


                                <td><a href="{{url("userDesactif/{$listeCommercial->id}")}}"> <span class="label label-success" title="Cliquez pour bloquer">Activé</span></a></td>



                                 @else
                               <td> <a href="{{url("userActif/{$listeCommercial->id}")}}"> <span class="label label-danger" title="Cliquez pour Débloquer">Bloqué</span></a></td>



                                    </td>

                                @endif

                            </tr>
                           @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <script src="js/jslist1.js" type="text/javascript"></script>

    <script src="js/emailjs.js" type="text/javascript"></script>




@endsection




