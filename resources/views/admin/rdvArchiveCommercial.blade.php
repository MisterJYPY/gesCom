@extends('admin.index')
@section('content')

    <div class="">

        <div class="row" style="background-color:rgb(151,203,255)">

            <div class="col-md-12 col-sm-12 col-xs-12"  style="background-color:rgb(185,220,255)">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> <i class="fa fa-book"></i>Les Rendez-Vous archivés par le commercial

                            <a  role="button" class="btn btn-warning " data-toggle="modal">
                                <i class="glyphicon glyphicon-time"></i>
                                @foreach($commercial as $commercial=>$key)
                                    <strong >{{$key->name}}</strong>
                                @endforeach </a>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Date Rdv</th>
                                <th>Heure Debut</th>
                                <th>Heure Fin</th>
                                <th>Client</th>
                                <th>Contact Client</th>
                                <th>Adresse Client</th>
                                <th>Objet</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Date Rdv</th>
                                <th>Heure Debut</th>
                                <th>Heure Fin</th>
                                <th>Client</th>
                                <th>Contact Client</th>
                                <th>Adresse Client</th>
                                <th>Objet</th>

                            </tr>
                            </tfoot>
                            <tbody>





                            @foreach($listeRdvArchiveEnfonctionComm as $liste)
                                <tr>
                                    <td>{{$liste->created_at}}</td>
                                    <td>{{$liste->date}}</td>
                                    <td>{{$liste->heure_debut}}</td>
                                    <td>{{$liste->heure_fin}}</td>
                                    <td>{{$liste->nom}}</td>
                                    <td>{{$liste->contact}}</td>
                                    <td>{{$liste->adresse}}</td>
                                    <td>{{$liste->objet}}</td>


                                </tr>
                            @endforeach





                            </tbody>
                        </table>
                        {{$listeRdvArchiveEnfonctionComm->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection