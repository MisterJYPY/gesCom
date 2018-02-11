
@extends('admin.index')
@section('content')



    <div class="">

        <div class="row" style="background-color:rgb(151,203,255)">

            <div class="col-md-12 col-sm-12 col-xs-12"  style="background-color:rgb(185,220,255)">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><h2> Les Rendez-Vous du commercail

                                @foreach($commercial as $commercial=>$key)
                                    <strong style="background-color:rgb(221,221,221)">{{$key->name}}</strong>
                                @endforeach
                            </h2>  </h2>
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
                                <th><strong  style="color: darkblue">NOMBRE REPORT</strong> </th>

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
                                <th><strong  style="color: darkblue">NOMBRE REPORT</strong> </th>

                            </tr>
                            </tfoot>
                            <tbody>





                            @foreach($listeRdvEnFonctionDeComm as $liste)
                                <tr>
                                    <td>{{$liste->created_at}}</td>
                                    <td>{{$liste->date}}</td>
                                    <td>{{$liste->heure_debut}}</td>
                                    <td>{{$liste->heure_fin}}</td>
                                    <td>{{$liste->nom}}</td>
                                    <td>{{$liste->contact}}</td>
                                    <td>{{$liste->adresse}}</td>
                                    <td>{{$liste->objet}}</td>

                                    <td> <a href="{{url("/detailRdvReportComm/{$liste->id}")}}">{{$liste->nombre_report}} </a> </td>


                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{$listeRdvEnFonctionDeComm->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jslist1.js')}}" type="text/javascript"></script>

    <script src="{{asset('js/emailjs.js')}}" type="text/javascript"></script>




@endsection




