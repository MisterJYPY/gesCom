
$nombre={{$nombre}}
@extends('layouts.index')
@section('content')




    <div class="row" >
        <div class="col-sm-12 col-md-12" style="margin-left: 35px">

            <form method="post" action="{{route('enrgclientmultiple')}}">
                {{csrf_field()}}
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Num</th>
                        <th>Nom*</th>
                        <th>Prenom(s)*</th>
                        <th>Email</th>
                        <th>Adresse*</th>
                        <th>Contact*</th>
                        <th>Groupe*</th>
                        <th>Observation*</th>
                    </tr>
                    </thead>
                    <tbody>

                  @for($i=1;$i<=$nombre;$i++)

                    <tr>
                        <td> {{$i}} </td>

                        <td class="col-xs-2 col-md-2 form-group">

                            <input class="form-control" id="nom<?= $i ?>" name="nom<?= $i ?>"  type="text" required autofocus />

                        </td>



                        <td class="col-xs-2 col-md-2 form-group">

                            <input class="form-control" id="prenom<?= $i ?>" name="prenom<?= $i ?>" type="text" required autofocus />

                        </td>

                        <td class="col-xs-2 col-md-2 form-group">

                            <input class="form-control" id="email<?= $i ?>" name="email<?=$i ?>"  type="email" required autofocus />

                        </td>

                        <td class="col-xs-2 col-md-2 form-group">

                            <textarea class="form-control" id="adresse<?=$i ?>" name="adresse<?= $i ?>" type="text" required autofocus ></textarea>

                        </td>


                        <td class="col-xs-2 col-md-2 form-group">

                            <input class="form-control" id="contact<?=$i ?>" name="contact<?= $i ?>"  type="tel"  onkeyup="verifierContact(this.value,'<?php echo 'contact'.$i; ?>')" required autofocus />

                        </td>


                        <td class="col-xs-2 col-md-2 form-group">


                            <select class="form-control" name="group<?= $i ?>">
                                <option name="group<?= $i ?>" selected="selected"></option>
                                <option name="group<?= $i ?>" selected="selected">Particulier</option>
                                <option name="group<?= $i ?>" selected="selected">marchand</option>
                                <option name="group<?= $i ?>" selected="selected">Distributeur</option>
                                <option name="group<?= $i ?>" selected="selected">Promoteur</option>
                            </select>


                        </td>




                        <td class="col-xs-2 col-md-2 form-group">


                            <select class="form-control" name="etoile<?= $i ?>">
                                <option name="etoile<?= $i ?>" selected="selected"></option>
                                <option name="etoile<?= $i ?>" selected="selected">1</option>
                                <option name="etoile<?= $i ?>" selected="selected">2</option>
                                <option name="etoile<?= $i ?>" selected="selected">3</option>

                            </select>


                        </td>


                    </tr>

                    @endfor

                    </tbody>
                </table>

                <button class="btn btn-primary pull-right" type="submit">Enregistrer</button>
            </form>
        </div>
    </div>

    </div>




@endsection





