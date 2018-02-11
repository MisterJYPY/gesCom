<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*-----------------------Route POUR LES TESTS-----------------------------------------------*/

Route::get('e', 'essaicontro@index')->name('e');

Route::get('es','EmailController@index')->name('es');

/*-----------------------FIN ROUTE TESTS-----------------------------------------------*/



Route::get('/', 'acceuilController@create');
Route::get('acceuilAuth', 'acceuilController@create22')->name('acceuilAuth');


Route::get('corps', 'acceuilController@corps')->name('corps');


Route::get('ess', 'villeController@index')->name('ess');

/*-----------------------Route Client-----------------------------------------------*/
Route::get('ajouteclient', 'clientController@create')->name('ajouteclient');
Route::get('listeclient', 'clientController@index')->name('listeclient');
Route::get('client.modifie', 'clientController@show')->name('client.modifie');
Route::post('enregisteclient', 'clientController@store')->name('enregisteclient');
Route::post('enregisteclient2', 'clientController@store2')->name('enregisteclient2');


Route::get('/edit/{id}', 'clientController@edit');
Route::post('/update/{id}', 'clientController@update')->name('/update');


Route::get('/etoilePlus/{id}', 'clientController@etoile1');

Route::get('/etoileMoin/{id}', 'clientController@etoile2');

//Route::get('{id}', 'clientController@edit')->name('client.edit');



Route::post('enrgclientmultiple', 'acceuilController@store')->name('enrgclientmultiple');
Route::get('nombre.contact', 'acceuilController@index')->name('nombre.contact');

/*----------------------------------------------------------------------*/


/*-----------------------Route Email-----------------------------------------------*/
Route::get('email', 'emailController@create')->name('email');
//Route::get('listeemail', 'emailController@index')->name('listeemail');
Route::post('mail.envoi', 'emailController@store')->name('mail.envoi');
/*----------------------------------------------------------------------*/

/*-----------------------Route Visite-----------------------------------------------*/
Route::get('ajoutevisite', 'visiteController@create')->name('ajoutevisite');
Route::get('listevisite', 'visiteController@index')->name('listevisite');
Route::get('visite.modifie', 'visiteController@show')->name('visite.modifie');
Route::post('enregistrevisite', 'visiteController@store')->name('enregistrevisite');

Route::get('/editvisite/{id}', 'visiteController@edit');
Route::post('/updateVisite/{id}', 'visiteController@update')->name('/updateVisite');
/*----------------------------------------------------------------------*/



/*-----------------------Route Reclamation-----------------------------------------------*/
Route::get('ajoutereclamation', 'reclamationController@create')->name('ajoutereclamation');
Route::get('listeclamation', 'reclamationController@index')->name('listereclamation');

Route::get('reclamation.modifie', 'reclamationController@show')->name('reclamation.modifie');

Route::post('enregistrereclamation', 'reclamationController@store')->name('enregistrereclamation');


Route::get('/editreclamation/{id}', 'reclamationController@edit');
Route::post('/updatereclamation/{id}', 'reclamationController@update')->name('/updatereclamation');



Route::get('/archiverreclamation/{id}', 'reclamationController@edit2');
Route::post('/updatearchiverreclamation/{id}', 'reclamationController@update2')->name('/updatearchiverreclamation');


Route::get('/reclamationclient/{id}', 'reclamationController@reclamation');

Route::post('/enrgreclamationdclient/{id}', 'reclamationController@update4')->name('/enrgreclamationdclient');

/*----------------------------------------------------------------------*/




/*-----------------------route Archive-----------------------------------------------*/
Route::get('achive.reclamation', 'archiveController@index')->name('achive.reclamation');
Route::get('achive.rdv', 'archiveController@index1')->name('achive.rdv');
Route::get('achive.evernement', 'archiveController@index2')->name('achive.evernement');

/*----------------------------------------------------------------------*/


/*-----------------------Route Rdv-----------------------------------------------*/
Route::get('rdv', 'rdvController@create')->name('rdv');
Route::get('reporte.rdv', 'rdvController@index')->name('reporte.rdv');
Route::get('rdv.modifie', 'rdvController@show')->name('rdv.modifie');
Route::get('rdv.archive', 'rdvController@archive')->name('rdv.archive');
Route::post('enregistrerdv', 'rdvController@store')->name('enregistrerdv');

Route::get('/editrdv/{id}', 'rdvController@edit');
Route::post('/updaterdv/{id}', 'rdvController@update')->name('/updaterdv');


Route::get('/editarchiverdv/{id}', 'rdvController@edit2');
Route::post('/updatearchiverdv/{id}', 'rdvController@update2')->name('/updatearchiverdv');



Route::get('/editreportrdv/{id}', 'rdvController@edit3');
Route::post('/updatereportrdv/{id}', 'rdvController@update3')->name('/updatereportrdv');


Route::get('/detailRdvReport/{id}', 'rdvReportController@index');

Route::get('/prendrerdvclient/{id}', 'rdvController@prendreRdv');

Route::post('/programmerrvdclient/{id}', 'rdvController@update4')->name('/programmerrvdclient');

Route::get('rdvReporte', 'rdvReportController@index1');


/*----------------------------------------------------------------------*/


/*-----------------------Route evernement-----------------------------------------------*/
Route::get('evernement', 'evernementController@create')->name('evernement');
Route::get('reporte.evernement', 'evernementController@index')->name('reporte.evernement');

/*----------------------------------------------------------------------*/



/*-----------------------Route Admin-----------------------------------------------*/
Route::get('liste.user', 'adminController@index')->name('liste.user');
Route::get('listReclame', 'adminController@index02')->name('listReclame');
Route::get('liste2comcial', 'adminController@index01')->name('liste2comcial');

Route::get('transferer.Client', 'adminController@transfertClient')->name('transferer.Client');
Route::get('/clientTransfereCommercial/{id}', 'adminController@transfertClientCommercial');

Route::get('client.Commercial/{id}', 'adminController@index1');
Route::get('acceuiAdmin', 'adminController@index2')->name('acceuiAdmin');
Route::get('rdv.commercial/{id}', 'adminController@index3');
Route::get('reclamation.commercial/{id}', 'adminController@index4');

Route::get('listeAdm', 'adminController@index5')->name('listeAdm');
Route::get('listClient', 'adminController@index6')->name('listClient');
Route::get('listRdv', 'adminController@index7')->name('listRdv');
Route::get('listReclamation', 'adminController@index8')->name('listReclamation');
Route::get('/detailreclam/{id}', 'adminController@edit');


Route::get('userDesactif/{id}', 'adminController@show');
Route::get('userActif/{id}', 'adminController@show1');

Route::get('/detailRdvReportComm/{id}', 'adminController@detailRvdReport');
Route::get('reclamation.commercialArchive/{id}', 'adminController@create');
Route::get('rdv.commercialArchive/{id}', 'adminController@create1');

Route::get('rapport.commercial/{id}', 'RapportController@show');


Route::get('infoSurClient/{id}', 'adminController@create2');

//Route::get('listReclamationArchive/{id}', 'adminController@reclamationArchive')->name('listReclamationArchive/{id}');
Route::get('listRdvarchive/{id}', 'adminController@rdvarchive');

/*----------------------------------------------------------------------*/


/*---------------------------------ROUTE RAPPORT-------------------------------------*/
Route::post('rapport', 'RapportController@store')->name('rapport');
Route::get('listeRapport', 'RapportController@index')->name('listeRapport');

/*----------------------------------------------------------------------*/




/*---------------------------------Route Gestion User Auth------------------------------------*/


Route::get('AjoutUser', 'createUserController@index')->name('AjoutUser');
Route::get('deconnexion', 'createUserController@create')->name('deconnexion');

Route::post('createUser', 'createUserController@store')->name('createUser');

Route::post('userlog', 'userContrller@store')->name('userlog');

Route::post('modifPasswordUser', 'createUserController@store2')->name('modifPasswordUser');
Route::post('modifPasswordUserAdmin', 'createUserController@store21')->name('modifPasswordUserAdmin');

Route::get('acceuilcommercial', 'createUserController@show')->name('acceuilcommercial');
Route::get('acceuilAdminn', 'adminController@index22')->name('acceuilAdminn');


Route::get('password.oublie', 'createUserController@store3')->name('password.oublie');

Route::post('userPassWordForgot', 'createUserController@store4')->name('userPassWordForgot');
/*----------------------------------------------------------------------*/



Route::get('agent', function () {
    return view('welcome');
})->name('agent');





Route::get('cop', function () {
    return view('corps');
})->name('cop');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
