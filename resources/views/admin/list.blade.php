


@extends('admin.index')
@section('content')


<div class="row">
    <div class="panel panel-primary filterable col-sm-10">
        <div class="panel-heading">
            <h3 class="panel-title">Contacts</h3>
            <div class="pull-right">
                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-refresh"></span> Recherche</button>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="filters">
                <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                <th><input type="text" class="form-control" placeholder="Heure" disabled></th>

                <th><input type="text" class="form-control" placeholder="Lieu" disabled></th>
                <th><input class="form-control" placeholder="Objet" disabled></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>

                <td>Xikka lance sa pub ce lundi</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>

                <td>@fat</td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
<script src="js/jslist1.js" type="text/javascript"></script>

@endsection