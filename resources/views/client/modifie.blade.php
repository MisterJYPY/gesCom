
@extends('layouts.index')
@section('content')


       <div class="row">


                            <div class="panel col-sm-11 col-md-11" style="background-color:rgb(229,229,229) ;margin-left: 50px">
                                <div class="panel-heading custom-header-panel">
                                    <h1 class="panel-title roboto"><strong> <i class="fa fa-user"></i>Modifiez le Client</strong></h1>

                                </div>
                                <div class="container">


                                    <div class="col-sm-8 contact-form" style="margin-top:70px;">
                                        <form id="contact" method="post" class="form"  action="{{route('/update',$client->id)}}" >
                                            <div class="row">

                                                {{ csrf_field() }}
                                                <div class="col-xs-6 col-md-6 form-group"><strong>Nom:</strong>
                                                    <input class="form-control" id="nom" name="nom" value="{{$client->nom}}" type="text" required  />
                                                </div>
                                                <div class="col-xs-6 col-md-6 form-group"><strong>Pénom:</strong>
                                                    <input class="form-control" id="prenom" name="prenom" value="{{$client->prenom}}" type="text" required />
                                                </div>

                                                <div class="col-xs-6 col-md-6 form-group"><strong>Email:</strong>
                                                    <input class="form-control" id="email" name="email" value="{{$client->email}}" type="email"  />
                                                </div>
                                                <div class="col-xs-6 col-md-6 form-group"><strong>Adresse:</strong>
                                                    <input class="form-control" id="adresse" name="adresse" value="{{$client->adresse}}" type="text" required />
                                                </div>
                                                <div class="col-xs-6 col-md-6 form-group"><strong>Contact:</strong>
                                                    <input class="form-control" id="contact" name="contact" value="{{$client->contact}}" type="tel" required />
                                                </div>

                                                <div class="col-xs-6 col-md-6 form-group">Groupe:

                                                    <select class="form-control" name="choix" required>
                                                        <option name="choix" selected="selected"></option>
                                                        <option name="choix" selected="selected">Particulier</option>
                                                        <option name="choix" selected="selected">Marchand</option>
                                                        <option name="choix" selected="selected">Distributeur</option>
                                                        <option name="choix" selected="selected">Promoteur</option>
                                                    </select>
                                                </div>


                                            </div>

                                            <br />
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 form-group">
                                                    <button class="btn btn-primary pull-right" type="submit">Modifier</button></div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>


       </div>

@endsection

