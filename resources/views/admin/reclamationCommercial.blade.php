

@extends('admin.index')
@section('content')




    <div class="row" style="background-color:rgb(151,203,255)">

        <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:rgb(185,220,255)">
            <div class="x_panel">
                <div class="x_title">
                    <h2><h2>Reclamations notées par le commercial

                            @foreach($commercial as $commercial=>$key)
                                <strong style="background-color:rgb(221,221,221)">{{$key->name}}</strong>
                            @endforeach
                        </h2>   </h2>
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




                        @foreach($listeReclamEnFonctionDeComm as $liste)
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
                    {{$listeReclamEnFonctionDeComm->links()}}
                </div>
            </div>
        </div>
    </div>



@endsection