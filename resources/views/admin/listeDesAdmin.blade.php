
@extends('admin.index')
@section('content')



    @if(Session::has('infoAdin'))

        <div class="alert alert-success">
            {{Session::get('infoAdin')}}
        </div>


    @endif




    <div class="container" >

        <div class="row">

            <div class="col-md-11 col-sm-11 col-xs-11">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Liste des Administrateurs </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Profil cré le</th>
                                <th>Pseudo</th>
                                <th>Email</th>



                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Pseudo</th>
                                <th>Email</th>



                            </tr>
                            </tfoot>
                            <tbody>



                            @foreach($listeAdmin as $listeAdmin)
                                <tr>
                                    <th>{{$listeAdmin->created_at}}</th>
                                    <td>{{$listeAdmin->name}}</td>
                                    <td>{{$listeAdmin->email}}</td>

                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jslist1.js" type="text/javascript"></script>

    <script src="js/emailjs.js" type="text/javascript"></script>




@endsection




