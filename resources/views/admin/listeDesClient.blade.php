
@extends('admin.index')
@section('content')

    <div class="" >

        <div class="row" style="background-color:rgb(151,203,255)">

            <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:rgb(185,220,255)">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listes des Clients  </h2>
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
                                <th>Enregistré par</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>date</th>
                                <th>Groupe</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Contact</th>
                                <th>Commercial</th>

                            </tr>
                            </tfoot>
                            <tbody>



               @foreach($listClient as $liste)



                                <tr>
                                    <td style="color: blue">{{$liste->created_at}}</td>

                                    <td style="color: blue">{{$liste->groupe}}</td>
                                    <td>{{$liste->nom}}</td>
                                    <td>{{$liste->prenom}}</td>
                                    <td>{{$liste->email}}</td>
                                    <td>{{$liste->adresse}}</td>
                                    <td>{{$liste->contact}}</td>
                                    <td> {{ \App\Http\Controllers\adminController::getChampTable('users',$liste->user,'name')}}</td>

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