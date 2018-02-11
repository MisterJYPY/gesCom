<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rdvreporte;
use App\Rdv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Rdvrarchive;
use App\Reclamationachive;
use App\Client;
use App\Visite;
use App\Reclamation;


class rdvReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,Request $request)
    {

        $title=$request->path();

        $nom= Auth::user()->name;
        $user=Auth::user()->id;

        $liste=Rdvreporte::whereRdvAndUser($id,$user)->get();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;

        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();

        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();

        // $rdvr=session('rdvr');
        //$listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();


        return view('rdv.detailRdvReporte',compact('user','title','listerdvreport','reclamationarchives','nom','clients','liste','rdv','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }



    public function index1($id,Request $request)
    {

        $title=$request->path();

        $nom= Auth::user()->name;
        $user=Auth::user()->id;
        $liste=Rdvreporte::whereRdvAndUser($id,$user)->get();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $rdvrep=Rdvreporte::whereUser($user);
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();

        // $rdvr=session('rdvr');
        //$listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();


        return view('rdv.rdvReporteListe',compact('user','rdvrep','title','listerdvreport','reclamationarchives','nom','clients','liste','rdv','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $title=$request->path();
        $rdvreport=Rdv::find($id);
        session(['rdvr' => $rdvreport]);
        $nom= Auth::user()->name;


        $rdvr=$rdvreport->id;
        $nomclient=$rdvreport->nom;
        $contact=$rdvreport->contact;
        $date=$rdvreport->date ;
        $adresse=$rdvreport->adresse;
        $objet=$rdvreport->objet;
        $heure=$rdvreport->heure;
        $datereport=$request->datereport;
        $heurereport=$request->heurereport;
        $user= Auth::user()->id;




        Rdvreporte::firstOrCreate(['nom'=>$nomclient,'contact'=>$contact,
            'adresse'=>$adresse,'dateprevu'=>$date,'datereport'=>$datereport,
            'heureprevu'=>$heure,'heurereport'=>$heurereport,'objet'=>$objet,
            'rdv'=>$rdvr,'user'=>$user,]);

        $listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();

        Session::flash('sucessReportRdv','RDV reporté à une nouvelle date');




       // $nom= Auth::user()->name;
        $user= Auth::user()->id;
        //$liste=Rdv::where('user','=',$user)->get();
        $liste=Rdv::where('user','=',$user)->get();
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();


        return view('rdv.index',compact('user','title','listerdvreport','nom','reclamationarchives','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));






      //  return view('rdv.index',compact('nom','liste','listerdvreport'));

       // return redirect()->route('rdv');

    }







    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
