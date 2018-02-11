
@extends('admin.index')
@section('content')



    @if(Session::has('infoAdin'))

        <div class="alert alert-success">
            {{Session::get('infoAdin')}}
        </div>


    @endif





    <div class="" >

        <div class="row" style="background-color:rgb(151,203,255)">

            <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:rgb(185,220,255)">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listes des Clients du commercial

                            @foreach($commercial as $commercial=>$key)
                               <strong style="background-color:rgb(221,221,221)">{{$key->name}}</strong>
                                @endforeach
                               </h2><a href="{{route('transferer.Client')}}" title="Cliquer pour transferer des clients a un commercial"> <img src="{{asset('images/TfClient.png')}}"> </a>  <form style="position: relative;margin-right: 55%"><input value="Cliquez sur le nom ou prénom du client pour plus de détails" disabled="true" size="50"/></form>

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

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Groupe</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Contact</th>

                            </tr>
                            </tfoot>
                            <tbody>






                            @foreach($listeClientEnFonctionDeComm as $liste)
                                <tr>
                                    <td>{{$liste->created_at}}</td>
                                    <td style="color: blue">{{$liste->groupe}}</td>
                                     <td><a href="{{url("infoSurClient/{$liste->id}")}}" title="Cliquez pour plus de details">{{$liste->nom}}</a></td>
                                     <td><a href="{{url("infoSurClient/{$liste->id}")}}"title="Cliquez pour plus de details">{{$liste->prenom}}</a></td>

                                    @if($liste->email=='emailnull@g.com')

                                        <td style="color: red">{{$liste->email}}</td>
                                    @else

                                        <td >{{$liste->email}}</td>
                                    @endif


                                    <td>{{$liste->adresse}}</td>
                                    <td>{{$liste->contact}}</td>

                                </tr>
                            @endforeach



                            </tbody>
                        </table>

                        {{$listeClientEnFonctionDeComm->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jslist1.js" type="text/javascript"></script>

    <script src="js/emailjs.js" type="text/javascript"></script>




@endsection




