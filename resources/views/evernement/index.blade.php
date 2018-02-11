
@extends('layouts.index')
@section('content')



    <!------------------------------ FORM MODAL AJOUTER CONTACT ------------------------------->

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Ajouter nouveau contact</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal col-sm-12" method="post" action="ingex">
                        <div class="form-group"><label>Name</label><input class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text"></div>
                        <div class="form-group"><label>Message</label><textarea class="form-control" placeholder="Your message here.." data-placement="top" data-trigger="manual"></textarea></div>
                        <div class="form-group"><label>E-Mail</label><input class="form-control email" placeholder="email@you.com (so that we can contact you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
                        <div class="form-group"><label>Phone</label><input class="form-control phone" placeholder="999-999-9999" data-placement="top" data-trigger="manual" data-content="Must be a valid phone number (999-999-9999)" type="text"></div>



                        <div class="form-group"><button type="submit" class="btn btn-success pull-right">Enregistrer</button>
                            <button class="btn btn-danger pull-left" data-dismiss="modal" aria-hidden="true">Cancel</button> </div>

                    </form>
                </div>
                <div class="modal-footer">

                </div>


            </div>
        </div>
    </div>
    <!------------------------------------- -------------------------------->



    <div class="btn-toolbar list-toolbar">


        <a href="" role="button" class="btn btn-default " data-toggle="modal"></i><h7><i class="fa fa-print"></i></h7>Imprimer</a>


        <a href="#myModal" role="button" class="btn btn-primary " data-toggle="modal"><h7><i class="fa fa-phone-square"></i></h7>Ajouter Evernement</a>
        <a href="" role="button" class="btn btn-danger" data-toggle="modal"></i><h7><i class="fa fa-pencil"></i></h7>Modifier</a>
        <a href="" role="button" class="btn btn-warning " data-toggle="modal"></i><h7><i class="fa fa-book"></i></h7>Annuler</a>
        <a href="" role="button" class="btn btn-success " data-toggle="modal"></i><h7><i class="fa fa-unlock"></i></h7>reporter</a>
        <a href="" role="button" class="btn btn-info " data-toggle="modal"></i><h7><i class="fa fa-book"></i></h7>archiver</a>
        <div class="btn-group">
        </div>
    </div>

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
