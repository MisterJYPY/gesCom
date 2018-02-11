
@extends('admin.index')
@section('content')







    <div class="container" >

        <div class="row" style="background-color:rgb(151,203,255)">

            <div class="col-md-11 col-sm-11 col-xs-11" style="background-color:rgb(185,220,255)">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> <i class="fa fa-book"></i>Reclamations archivées par le commercial
                            <a  role="button" class="btn btn-warning " data-toggle="modal">
                                    <i class="fa fa-envelope"></i>
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
                                <th>Date Reclamation(m/j/a)</th>
                                <th>Heure Reclamation</th>
                                <th>Client</th>
                                <th>Contact Client</th>
                                <th>Adresse Client</th>
                                <th>Objet</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Date Reclamation</th>
                                <th>Heure Reclamation</th>
                                <th>Client</th>
                                <th>Contact Client</th>
                                <th>Adresse Client</th>
                                <th>Objet</th>
                                <th></th>

                            </tr>
                            </tfoot>
                            <tbody>




                            @foreach($listereclamArchiveEnfonctionComm as $liste)
                                <tr>
                                    <td>{{$liste->created_at}}</td>

                                    <td>{{$liste->date}}</td>
                                    <td>{{$liste->heure}}</td>
                                    <td>{{$liste->nom}}</td>
                                    <td>{{$liste->contact}}</td>
                                    <td>{{$liste->adresse}}</td>
                                    <td>{{$liste->objet}}</td>
                                    <td>  <a href="{{url("/detailreclam/{$liste->id}")}}" class="btn btn-info btn-xs"><i class="fa fa-plus" title="Details"></i> </a></td>


                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{$listereclamArchiveEnfonctionComm->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection