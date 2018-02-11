
@extends('layouts.index')
@section('content')


    <div class="container">
        <div class="row">

            <div class="panel col-sm-10 col-md-10 ">
                <div class="panel-heading custom-header-panel">
                    <h3 class="panel-title roboto">Modifiez le Client


                        <div class="container">


                            <div class="col-sm-8 contact-form" style="margin-top:70px;">
                                <form id="contact" method="PATCH" class="form"  action="" >
                                    <div class="row">

                                        {{ csrf_field() }}
                                        <div class="col-xs-6 col-md-6 form-group">Nom:
                                            <input class="form-control" id="nom" name="nom" value="{{$client->nom}}" type="text" required  />
                                        </div>
                                        <div class="col-xs-6 col-md-6 form-group">Prénom:
                                            <input class="form-control" id="prenom" name="prenom" value="{{$client->prenom}}"type="text" required />
                                        </div>
                                        <div class="col-xs-6 col-md-6 form-group">Email:
                                            <input class="form-control" id="email" name="email" value="{{$client->email}}" type="email"  />
                                        </div>
                                        <div class="col-xs-6 col-md-6 form-group">Adresse:
                                            <input class="form-control" id="adresse" name="adresse" value="{{$client->adresse}}"  type="text" required />
                                        </div>
                                        <div class="col-xs-6 col-md-6 form-group">Contact:
                                            <input class="form-control" id="contact" name="contact" value="{{$client->contact}}" type="text" required />
                                        </div>

                                        <div class="col-xs-6 col-md-6 form-group">Groupe:

                                            <select class="form-control" name="choix" required>
                                                <option name="choix" selected="selected"></option>
                                                <option name="choix" selected="selected">Particulier</option>
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

