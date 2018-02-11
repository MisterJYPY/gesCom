@extends('admin.index')
@section('content')

    <div class="">

        <div class="row" style="background-color:rgb(151,203,255)">

            <div class="col-md-12 col-sm-12 col-xs-12"  style="background-color:rgb(185,220,255)">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i style="color: darkorange"><span class="glyphicon glyphicon-thumbs-up"></span> </i>Les Rendez-Vous Programmés avec le client   <span style="color:rgb(0,0,0)">{{$nomPrenom}}</span>   </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Date Rdv(m/j/a)</th>
                                <th>Heure Debut</th>
                                <th>Heure Fin</th>
                                <th>Client</th>
                                <th>Contact Client</th>
                                <th>Adresse Client</th>
                                <th style="color: darkred">Objet</th>
                                <th><strong  style="color: darkblue">NOMBRE REPORT</strong> </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Date Rdv(m/j/a)</th>
                                <th>Heure Debut</th>
                                <th>Heure Fin</th>
                                <th>Client</th>
                                <th>Contact Client</th>
                                <th>Adresse Client</th>
                                <th style="color: darkred">Objet</th>
                                <th><strong  style="color: darkblue">NOMBRE REPORT</strong> </th>

                            </tr>
                            </tfoot>
                            <tbody>


                            @foreach($infoRdvClient as $liste)
                                <tr>
                                    <td>{{$liste->created_at}}</td>
                                    <td>{{$liste->date}}</td>
                                    <td>{{$liste->heure_debut}}</td>
                                    <td>{{$liste->heure_fin}}</td>
                                    <td>{{$liste->nom}}</td>
                                    <td>{{$liste->contact}}</td>
                                    <td>{{$liste->adresse}}</td>
                                    <td>{{$liste->objet}}</td>

                                    <td> <a href="#">{{$liste->nombre_report}} </a> </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{$infoRdvClient->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>









            <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:rgb(185,220,255)">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reclamations portées par le client  <span style="color:rgb(0,0,0)">{{$nomPrenom}}</span>   </h2>
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

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Date Reclamation(m/j/a)</th>
                                <th>Heure Reclamation</th>
                                <th>Client</th>
                                <th>Contact Client</th>
                                <th>Adresse Client</th>
                                <th>Objet</th>


                            </tr>
                            </tfoot>
                            <tbody>




                            @foreach($infoReclamatinClient as $liste)
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

                        {{$infoReclamatinClient->links()}}
                    </div>
                </div>
            </div>















@endsection