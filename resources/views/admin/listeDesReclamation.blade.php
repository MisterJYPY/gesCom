
@extends('admin.index')
@section('content')







<div class="container" >

    <div class="row" style="background-color:rgb(151,203,255)">

        <div class="col-md-11 col-sm-11 col-xs-11" style="background-color:rgb(185,220,255)">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Reclamations portées par les clients <a href="#myModal" role="button" class="btn btn-warning " data-toggle="modal"><h7><i class="fa fa-book"></i></h7>Reclamations Archivées</a>  </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Date Reclamation</th>
                            <th>Heure Reclamation</th>
                            <th>Client</th>
                            <th>Contact Client</th>
                            <th>Adresse Client</th>
                            <th>Objet</th>

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


                        </tr>
                        </tfoot>
                        <tbody>




                        @foreach($listReclm as $liste)
                            <tr>
                                <td>{{$liste->created_at}}</td>

                                <td>{{$liste->date}}</td>
                                <td>{{$liste->heure}}</td>
                                <td>{{$liste->nom}}</td>
                                <td>{{$liste->contact}}</td>
                                <td>{{$liste->adresse}}</td>
                                <td>{{$liste->objet}}</td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection