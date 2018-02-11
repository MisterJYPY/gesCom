
@extends('layouts.index')
@section('content')



    <div class="container">

        <div class="row">
            <div class="panel panel-primary filterable col-sm-10">
                <div class="panel-heading">
                    <h3 class="panel-title">Evernements reportés</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-refresh"></span> Recherche</button>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Date report" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Date prevu" disabled></th>

                        <th><input type="text" class="form-control" placeholder="Lieu prevu" disabled></th>
                        <th><input class="form-control" placeholder="Objet" disabled></th>
                        <th><input class="form-control" placeholder="Motif" disabled></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>

                        <td>Xikka lance sa pub ce lundi</td>
                        <td>ok ok ok ok ok ok</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="js/jsrech.js" type="text/javascript"></script>
    <script src="js/jslist1.js" type="text/javascript"></script>
@endsection


