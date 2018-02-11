
@extends('layouts.index')
@section('content')



    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
            <div class='modal fade' id='myModal'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class='modal-title'>
                                <strong> LES EVERNEMENTS ARCHIVES</strong>
                            </h4>
                        </div>
                        <!-- / modal-header -->
                        <div class='modal-body'>



                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">evernement</h3>
                                                    <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Recherche rapide" data-container="body">
								<strong style="color: blue"><i class="glyphicon glyphicon-eye-open"></i></strong>
							</span>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="recherche" />
                                                </div>
                                                <table class="table table-bordered table-striped" id="dev-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Lieu prevu</th>
                                                        <th>Date prevue</th>
                                                        <th>Objet</th>
                                                        <th>Motif</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Kilgore</td>
                                                        <td>Trout</td>
                                                        <td>Lancement du nouveau prduit Paiement de salaire en ligne avec notre plateforme</td>
                                                        <td>Indisponibilité de la salle prevu</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Bob</td>
                                                        <td>Loblaw</td>
                                                        <td>merci merci merci merci merci</td>
                                                        <td>Indisponibilité de la salle prevu</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                <script src="js/jsrech.js" type="text/javascript"></script>








                        </div>
                        <!-- / modal-body -->
                        <div class='modal-footer'>
                            <div class="checkbox pull-right">

                            </div>
                            <!--/ checkbox -->
                        </div>
                        <!--/ modal-footer -->
                    </div>
                    <!-- / modal-content -->
                </div>
                <!--/ modal-dialog -->
            </div>
            <!-- / modal -->
        </div>
        <!-- / row -->
    </div>
    <script src="js/jsliste.js"></script>

@endsection

