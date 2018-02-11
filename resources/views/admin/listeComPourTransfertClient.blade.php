
@extends('admin.index')
@section('content')


    @if(Session::has('EchecUser'))

        <div class="alert alert-danger">
            {{Session::get('EchecUser')}}.
            <strong>Profil: {{session('role')}}</strong>
        </div>

    @endif


    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Liste des commerciaux </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Profil créé le</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>ACTION</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Profil créé le</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th title="Selectionnez le commercial qui vous interesse">ACTION</th>

                        </tr>
                        </tfoot>
                        <tbody>



                        @foreach($listeCommercial as $listeCommercial)
                            <tr>
                                <td>{{$listeCommercial->created_at}}</td>
                                <td>{{$listeCommercial->name}}</td>
                                <td>{{$listeCommercial->email}}</td>
                                <td> <a href="{{url("clientTransfereCommercial/{$listeCommercial->id}")}}" class="label label-info" title="Choisissez ce commercial">select</a></td>

                            </tr>
                        @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jslist1.js" type="text/javascript"></script>

    <script src="js/emailjs.js" type="text/javascript"></script>




@endsection




