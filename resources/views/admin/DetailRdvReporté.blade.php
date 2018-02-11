

@extends('admin.index')
@section('content')


    <div class="">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="color: darkred">Les Details du RDV reporté  </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Date(m/j/a)</th>
                                <th>Date Rdv Prevue(m/j/a)</th>
                                <th>Heure Debut Rdv Prevue</th>
                                <th>Heure Fin Rdv Prevue</th>
                                <th style="color: darkblue">Date Report(m/j/a)</th>
                                <th style="color: darkblue">Heure Debut report</th>
                                <th style="color: darkblue">Heure Fin report</th>
                                <th> Client</th>
                                <th>Contact client</th>
                                <th>Adresse Client</th>
                                <th>Objet</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Date Rdv Prevue</th>
                                <th>Heure Debut Rdv Prevue</th>
                                <th>Heure Fin Rdv Prevue</th>
                                <th style="color: darkblue">Date Report</th>
                                <th style="color: darkblue">Heure Debut report</th>
                                <th style="color: darkblue">Heure Fin report</th>
                                <th> Client</th>
                                <th>Contact client</th>
                                <th>Adresse Client</th>
                                <th>Objet</th>

                            </tr>
                            </tfoot>
                            <tbody>





                            @foreach($liste as $liste)
                                <tr>
                                    <td>{{$liste->created_at}}</td>
                                    <td style="background-color:rgb(204,204,255)">{{$liste->dateprevu}}</td>
                                    <td style="background-color:rgb(204,204,255)">{{$liste->heure_debutprevu}}</td>
                                    <td style="background-color:rgb(204,204,255)">{{$liste->heure_finprevu}}</td>
                                    <td style="background-color: grey">{{$liste->datereport}}</td>
                                    <td style="background-color: grey">{{$liste->heure_debutreport}}</td>
                                    <td style="background-color: grey">{{$liste->heure_finreport}}</td>
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