
@extends('layouts.index')
@section('content')


    @if(Session::has('SuccesRapport'))

        <div class="alert alert-success">
            {{Session::get('SuccesRapport')}} <strong><i class="	glyphicon glyphicon-thumbs-up"></i></strong>
        </div>


    @endif



    @if(Session::has('EchecRapport'))

        <div class="alert alert-warning">

            {{Session::get('EchecRapport')}}<strong> <i class="glyphicon glyphicon-thumbs-down"></i> </strong>

        </div>

    @endif



    <!-----------------------------------------------------modal rapport----------------------------------------------------------------------->


    <div class="modal right fade" id="ModalMessagerap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>


        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-header" style="background-color:rgb(204,204,255)" >
                    <h2 id="myModalLabel"> <strong style="color: darkblue" class="fa fa-list-alt"></strong><i>Envoyez Rapport</i></h2>

                </div>

                <div class="container">





                        <div class="modal-body">
                            <form class="form-horizontal col-sm-8" method="post" action="{{route('rapport')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <!-- input Sujet -->
                                <div class="control-group" >
                                    <label for="sujet"><strong>Sujet</strong></label>
                                    <input name="sujet" type="text" class="form-control" required>
                                </div>
                                <br />

                                <div class="control-group">
                                    <label for="fichier"><strong>Fichier</strong></label>
                                    <input name="fichier" type="file" class="form-control"  required>
                                </div>
                                <br />
                                <!-- TextArea Message -->
                                <div class="control-group">
                                    <label for="description"><strong>Description</strong></label>
                                    <textarea id="FormMessageMessage" name="description" class="form-control" rows="5" required></textarea>
                                </div>
                                <br />



                                <div class="form-group"><button type="submit" class="btn btn-info pull-left"><span class="fa fa-send" style="position: relative;margin-left: 20%"> Envoyer </span></button>
                                    <button class="btn btn-danger pull-left" data-dismiss="modal" aria-hidden="true" style="position: relative;margin-left: 90%">Fermer</button> </div>

                            </form>




                    </div>
                </div>
            </div>


        </div><!-- modal-content -->
    </div><!-- modal-dialog -->




    <!----------- --------------------------------------------------------Fin modal rapport---------------------------------------------------------->



    <!----------- MODAL RAPPORT essaie------------------------------------------------------------------->
    <div id="ModalMessagerap10" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h2 id="myModalLabel"> <i class="fa fa-envelope"></i>Envoyez Rapport</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal col-sm-12" method="post" action="{{route('rapport')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <!-- input Sujet -->
                        <div class="control-group">
                            <label for="sujet"><strong>Sujet</strong></label>
                            <input name="sujet" type="text" class="form-control" required>
                        </div>
                        <br />

                        <div class="control-group">
                            <label for="fichier"><strong>Fichier</strong></label>
                            <input name="fichier" type="file" class="form-control"  required>
                        </div>
                        <br />
                        <!-- TextArea Message -->
                        <div class="control-group">
                            <label for="description"><strong>Description</strong></label>
                            <textarea id="FormMessageMessage" name="description" class="form-control" rows="5" required></textarea>
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

    <!----------- FIN MODAL RAPPORT- essai------------------------------------------------------------------>




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
                <h2><i style="color: goldenrod"><i class="fa fa-list-alt"></i></i> Listes des Rapports <a href="#ModalMessagerap" role="button" class="btn btn-primary " data-toggle="modal"><h7><i class="fa fa-plus"></i></h7>Envoyer Rapport</a></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" >
                <table id="datatable-buttons" class="table table-striped table-bordered" >
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>sujet</th>
                        <th>Rapport</th>
                        <th>Description</th>
                        <th>Voir</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>sujet</th>
                        <th>Rapport</th>
                        <th>Description</th>
                        <th>Voir</th>
                    </tr>
                    </tfoot>
                    <tbody>






                    @foreach($liste as $liste)
                        <tr>
                            <td>{{$liste->created_at}}</td>
                            <td>{{$liste->sujet}}</td>

                            <td>{{$liste->nom}}</td>
                            <td>{{$liste->description}}</td>


                            <td>  <a href="{{asset('rapports')}}/{{$liste->nom}}" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-download" title="Cliquez pour lire"></i> </a> </td>

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
