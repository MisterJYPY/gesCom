
      @extends('layouts.index')
      @section('content')

          @if(Session::has('sucessModifPassWord'))

              <div class="alert alert-success">
                  {{Session::get('sucessModifPassWord')}} <strong>Mot de passe</strong> avec succes
              </div>


          @endif


          @if(Session::has('echecModifPassWord'))

              <div class="alert alert-warning">
                  {{Session::get('echecModifPassWord')}}<strong>Mot de passe.Email ne correspond pas Email
                  du COMMERCIAL connecté.</strong>Merci
              </div>


          @endif




          @if(Session::has('echecTaillpassword'))

              <div class="alert alert-warning">
                  {{Session::get('echecTaillpassword')}}<strong>Mot de passe.
                      Mot de passe doit être au moins 6 caractères.
                      </strong>Merci
              </div>


          @endif



          @if(Session::has(' infoAgent'))

              <div class="alert alert-success">
                  {{Session::get(' infoAgent')}} <strong>COMMERCIAL</strong>
              </div>


          @endif




 <div class="row">

                              <div class="panel panel-default  col-sm-12 col-md-12  "style="background-color:rgb(204,204,255)">
                                  <h1  class="panel-heading " data-toggle="collapse" style="color: darkblue">DASHBOARD</h1>
                                  <div id="page-stats" class="panel-collapse panel-body collapse in">

                                      <div class="row">
                                          <div class="col-md-3 col-sm-6">
                                              <div class="knob-container">
                                                  <input class="knob" data-width="200" data-min="0" data-max="300" data-displayPrevious="true" value="{{$clients}}" data-fgColor="#92A3C2" data-readOnly=true;>
                                                  <h3 class="text-muted text-center"><strong>CLIENTS</strong></h3>
                                              </div>
                                          </div>
                                          <div class="col-md-3 col-sm-6">
                                              <div class="knob-container">
                                                  <input class="knob" data-width="200" data-min="0" data-max="450" data-displayPrevious="true" value="{{$rdvs}}" data-fgColor="#92A3C2" data-readOnly=true;>
                                                  <h3 class="text-muted text-center"><strong>RDV</strong></h3>
                                              </div>
                                          </div>
                                          <div class="col-md-3 col-sm-6">
                                              <div class="knob-container">
                                                  <input class="knob" data-width="200" data-min="0" data-max="450" data-displayPrevious="true" value="{{$reclamations}}" data-fgColor="#92A3C2" data-readOnly=true;>
                                                  <h3 class="text-muted text-center"><strong>RECLAMATIONS</strong></h3>
                                              </div>
                                          </div>


                                          <div class="col-md-3 col-sm-6">
                                              <div class="knob-container">
                                                  <input class="knob" data-width="200" data-min="0" data-max="200" data-displayPrevious="true" value="{{$archives}}" data-fgColor="#92A3C2" data-readOnly=true;>
                                                  <h3 class="text-muted text-center"><strong>ARCHIVES</strong></h3>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>

 </div>





      @endsection