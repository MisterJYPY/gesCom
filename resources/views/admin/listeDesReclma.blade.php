
@extends('admin.index')
@section('content')




    <div class="row" style="background-color:rgb(128,128,255)">

        <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:rgb(206,206,255)">
            <div class="x_panel">
                <div class="x_title">
                    <h2> <i class="fa fa-envelope"></i>Reclamations des clients  </h2>
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
                            <th>Enregistré par</th>

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
                            <th>Commercial</th>

                        </tr>
                        </tfoot>
                        <tbody>




                        @foreach($listReclama as $liste)
                            <tr>
                                <td>{{$liste->created_at}}</td>

                                <td>{{$liste->date}}</td>
                                <td>{{$liste->heure}}</td>
                                <td>{{$liste->nom}}</td>
                                <td>{{$liste->contact}}</td>
                                <td>{{$liste->adresse}}</td>
                                <td>{{$liste->objet}}</td>
                                <td>{{ \App\Http\Controllers\adminController::getChampTable('users',$liste->user,'name')}}</td>



                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection

