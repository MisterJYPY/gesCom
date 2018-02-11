@extends('sign')

@section('content')
    <div class="container">
        <div class="row">


            @if(Session::has('Deconnex'))

                <div class="alert alert-danger">
                    {{Session::get('Deconnex')}}
                </div>


            @endif

            @if(Session::has('ErreurConnexion'))

                <div class="alert alert-danger">
                    {{Session::get('ErreurConnexion')}}<strong>MOT DE PASSE</strong> ou<strong> EMAIL</strong>
                </div>


            @endif

            @if(Session::has('userDesactive'))

                <div class="alert alert-danger">
                    {{Session::get('userDesactive')}}
                    <p> Merci de contacter votre <strong>Administrateur
                        </strong>pour le débloquage de votre<br>
                        profil <strong>Commercial</strong>  </p>
                </div>


            @endif



            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><strong style="position: center">  Renseignez Votre Email</strong></h2></div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('userPassWordForgot') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>


                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Valider
                                    </button>

                                    <a href="{{route('acceuilAuth')}}" class="btn btn-warning">
                                        retour
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
