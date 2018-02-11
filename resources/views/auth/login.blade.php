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









            @if(Session::has('echec1UserReset'))

                <div class="alert alert-warning">
                    {{Session::get('echec1UserReset')}}

                </div>


            @endif





            @if(Session::has('succesUserReset'))

                <div class="alert alert-success">
                    {{Session::get('succesUserReset')}}

                </div>

            @endif



            @if(Session::has('echecUserReset'))

                <div class="alert alert-danger">
                    {{Session::get('echecUserReset')}}Le Mail ne correspond pas au mail d'un utilisateur.

                </div>

            @endif


            <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('userlog') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Connexion
                                </button>

                                <a class="btn btn-link" href="{{ route('password.oublie') }}">
                                    Mot de passe oublié?
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
