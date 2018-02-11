
@extends('admin.index')
@section('content')



    <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:rgb(185,220,255)">
        <div class="x_panel">
            <div class="x_title">
                <h2><i style="color: goldenrod"><i class="fa fa-list-alt"></i></i> Listes des Rapports du commercial

                    @foreach($commercial as $commercial=>$key)
                        <strong style="background-color:rgb(221,221,221)">{{$key->name}}</strong>
                    @endforeach

                </h2>
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






                    @foreach($listeRapportEnfonctionComm as $liste)
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
                {{$listeRapportEnfonctionComm->links()}}
            </div>
        </div>
    </div>




@endsection
