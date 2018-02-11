<?php

namespace App\Http\Controllers;

use App\Rdv;
use App\Client;
use App\Rdvrarchive;
use App\Rdvreporte;
use App\Reclamationachive;
use App\Reclamation;
use App\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
class rdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title=$request->path();
        $nom= Auth::user()->name;

        $user= Auth::user()->id;
        $liste=Rdv::where('user','=',$user)->get();


        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();

        $rdvr=session('rdvr');
        $listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();

        return view('rdv.listeRdvReporte',compact('user','title','listerdvreport','nom','reclamationarchives','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));



    }

    public function index1(Request $request)
    {
        $user= Auth::user()->id;
        $title=$request->path();
        $rdvr=session('rdvr');
        $listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();

        $nom= Auth::user()->name;
        $user= Auth::user()->id;
        $liste=Rdv::where('user','=',$user)->get();
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
      //  $rdvr=session('rdvr');
        //$listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();

        return view('rdv.index',compact('user','titel','listerdvreport','nom','reclamationarchives','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));


    }

    public function archive(Request $request)
    {
        $nom= Auth::user()->name;
        $user= Auth::user()->id;

        $title=$request->path();
        $liste=Rdv::where('user','=',$user)->get();
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
       // $listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();

        return view('rdv.archive',compact('user','title','listerdvreport','nom','reclamationarchives','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));



    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nom= Auth::user()->name;
        $user= Auth::user()->id;
        $title=$request->path();
        //$liste=Rdv::where('user','=',$user)->get();
        $liste=Rdv::where('user','=',$user)->get();
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();

      //$rdvr=session('rdvr');
      //$listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();


        return view('rdv.index',compact('user','title','listerdvreport','nom','reclamationarchives','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nom= Auth::user()->name;
        $title=$request->path();
        $user= Auth::user()->id;
        $liste=Rdv::where('user','=',$user)->get();

        $nomclient=$request->nom;
        $contact=$request->contact;
        $date=$request->date ;
        $adresse=$request->adresse;
        $objet=$request->objet;
        $heure=$request->heure;
        $heuref=$request->heuref;
        $nbre=0;
        Rdv::firstOrCreate(['nom'=>$nomclient,'contact'=>$contact,'adresse'=>$adresse,'date'=>$date,'heure_debut'=>$heure,'heure_fin'=>$heuref,'objet'=>$objet,'nombre_report'=>$nbre,'user'=>$user,]);
        Session::flash('sucess','Ajouter avec succes');

        view('rdv.index',compact('nom','liste','title'));
        return redirect()->route('rdv');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $title=$request->path();
        $nom= Auth::user()->name;

        $user= Auth::user()->id;
        $liste=Rdv::where('user','=',$user)->get();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        //$rdvr=session('rdvr');
        //$listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();

        return view('rdv.modifie',compact('user','title','listerdvreport','nom','reclamationarchives','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title=$request->path();
        $rdv=Rdv::find($id);

        $nom= Auth::user()->name;
        $user=Auth::user()->id;
        $liste=Rdv::where('user','=',$user)->get();
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        //$rdvr=session('rdvr');
       // $listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();


        return view('rdv.modifie',compact('user','title','listerdvreport','reclamationarchives','nom','clients','liste','rdv','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }





    public function edit2($id,Request $request)
    {
        $title=$request->path();

        $rdv=Rdv::find($id);

        $nom= Auth::user()->name;
        $user=Auth::user()->id;
        $liste=Rdv::where('user','=',$user)->get();
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
       // $listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();

        return view('rdv.archive',compact('user','title','listerdvreport','reclamationarchives','nom','clients','liste','rdv','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }




    public function edit3($id,Request $request)
    {

        $title=$request->path();
        $rdv=Rdv::find($id);

        $nom= Auth::user()->name;
        $user=Auth::user()->id;
        $liste=Rdv::where('user','=',$user)->get();
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


        return view('rdv.report',compact('user','title','listerdvreport','reclamationarchives','nom','clients','liste','rdv','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }




    public function prendreRdv($id,Request $request)
    {
        $title=$request->path();

        $rdv=Client::find($id);


        $nom= Auth::user()->name;
        $user=Auth::user()->id;
        $liste=Rdv::where('user','=',$user)->get();
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


        return view('rdv.prendreRdv',compact('user','title','listerdvreport','reclamationarchives','nom','clients','liste','rdv','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

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
        $nbre=0;
        $data = array(
            'nom' => $request->nom,
            'contact' => $request->contact,
            'adresse' => $request->adresse,
            'date' => $request->date,
            'heure_debut' => $request->heured,
            'heure_fin' => $request->heuref,
            'objet' => $request->objet,
            'user' => Auth::user()->id,
            'nombre_report'=>$nbre

        );

        Rdv::where('id',$id)->update($data);
        Session::flash('sucessModif','Modification avec succes');
        return redirect()->route('rdv');

    }




    public function update2(Request $request, $id)
    {
        $title=$request->path();
        $rdvarchiv=Rdv::find($id);


        $nom= Auth::user()->name;

        $nomclient=$rdvarchiv->nom;


        $contact=$rdvarchiv->contact;

        $date=$rdvarchiv->date ;
        $adresse=$rdvarchiv->adresse;
        $objet=$rdvarchiv->objet;
        $heured=$rdvarchiv->heure_debut;
        $heuref=$rdvarchiv->heure_fin;
        $motif=$request->motif;

        $user= Auth::user()->id;


        Rdvrarchive::firstOrCreate(['nom'=>$nomclient,'contact'=>$contact,
            'adresse'=>$adresse,'date'=>$date,'heure_debut'=>$heured,
            'heure_fin'=>$heuref,'objetrdv'=>$objet,'motif'=>$motif,'user'=>$user,]);
        Session::flash('sucessArchiveRdv','RDV archivé avec succes');
        view('reclamation.ajoute',compact('nom','liste','title'));

        $rdvarchiv->delete();

        return redirect()->route('rdv');

    }








    public function update3(Request $request, $id)
    {
        $title=$request->path();
        $i=0;

        if ($id){
            $i+=$i++;

           // $rdvEnQuestion=Rdv::whereId($id)->get(['nombre_report']);

           // $nbrereport=$i + $rdvEnQuestion;


        $rdvreport=Rdv::find($id);
        session(['rdvr' => $rdvreport]);
        $nom= Auth::user()->name;

       $nombrereport=$rdvreport->nombre_report + $i;



        $rdvr=$rdvreport->id;
        $nomclient=$rdvreport->nom;
        $contact=$rdvreport->contact;
        $date=$rdvreport->date ;
        $adresse=$rdvreport->adresse;
        $objet=$rdvreport->objet;
        $heuredp=$rdvreport->heure_debut;
        $heurefp=$rdvreport->heure_fin;

        $datereport=$request->datereport;
        $heuredr=$request->heuredr;
        $heurefr=$request->heurefr;
        $motif=$request->motifReport;

        $user= Auth::user()->id;

            if (strlen($datereport)>0 and strlen($heuredr)>0 and strlen($heurefr)>0){



                Rdvreporte::firstOrCreate(['nom'=>$nomclient,'contact'=>$contact,
                    'adresse'=>$adresse,'dateprevu'=>$date,'datereport'=>$datereport,
                    'heure_debutprevu'=>$heuredp,'heure_finprevu'=>$heurefp,
                    'heure_debutreport'=>$heuredr,'heure_finreport'=>$heurefr,
                    'objet'=>$objet,
                    'motif'=>$motif,
                    'rdv'=>$rdvr,'user'=>$user,]);



                $data = array(
                    'nom' =>$nomclient,
                    'contact' =>$contact,
                    'adresse' =>$adresse,
                    'date' =>$date,
                    'heure_debut' =>$heuredp,
                    'heure_fin' =>$heurefp,
                    'objet' =>$objet,
                    'nombre_report'=>$nombrereport,
                    'user' => $user,


                );


                Rdv::where('id',$id)->update($data);

                Session::flash('sucessReportRdv','RDV reporté à une nouvelle date');

                $listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();

                view('rdv.index',compact('nom','title','liste','listerdvreport','rdvReports'));

                return redirect()->route('rdv');

            } else{

                Session::flash('echecReportRdv','Date du report ou Les Heures du Report non Renseignée.');

                view('rdv.index',compact('nom','title','liste','listerdvreport','rdvReports'));

                return redirect()->route('rdv');

            }


    }

    }





    public function update4(Request $request, $id)
    {
        $title=$request->path();
        $nom= Auth::user()->name;
        $user= Auth::user()->id;

        $rdvclient=Client::find($id);


     //  $RdvclientArchiv=Rdvrarchive::whereId();

        $nomclient=$rdvclient->nom;
        $prenomclient=$rdvclient->prenom;
        $nomclt=$nomclient.' '.$prenomclient;

        $contact=$rdvclient->contact;
        $adresse=$rdvclient->adresse;

        $date=$request->date ;
        $objet=$request->objet;
        $heured=$request->heured;
        $heuref=$request->heuref;
        $nbre=0;
        if (strlen($date)>0 and strlen($heuref)>0 and strlen($heured)>0){

            Rdv::firstOrCreate(['nom'=>$nomclt,'contact'=>$contact,'adresse'=>$adresse,'date'=>$date,'heure_debut'=>$heured,'heure_fin'=>$heuref,'objet'=>$objet,'nombre_report'=>$nbre,'user'=>$user,]);
            Session::flash('sucessRDv','RDV programmé avec le client');

            return redirect()->route('listeclient');

        } else {

            Session::flash('echecRDv','DATE ou HEURE non renseignée.Merci');

            return redirect()->route('listeclient');
        }
        

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
