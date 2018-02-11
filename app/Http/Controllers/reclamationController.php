<?php

namespace App\Http\Controllers;
use App\Reclamation;
use App\Client;
use App\Rdv;
use App\Rdvreporte;
use App\Reclamationachive;
use App\Rdvrarchive;
use App\Visite;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Http\Request;

class reclamationController extends Controller
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
        $liste=Reclamation::where('user','=',$user)->get();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();
        return view('reclamation.liste',compact('user','title','reclamationarchives','nom','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));



    }

    public function index1(Request $request)
    {
        $title=$request->path();
        $nom= Auth::user()->name;

        $user= Auth::user()->id;
        $liste=Reclamation::where('user','=',$user)->get();
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();
        return view('reclamation.ajoute',compact('user','liste','reclamationarchives','nom','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title=$request->path();
        $nom= Auth::user()->name;

        $user= Auth::user()->id;
        $liste=Reclamation::where('user','=',$user)->get();
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();




        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();
        return view('reclamation.ajoute',compact('user','title','reclamationarchives','nom','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));


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

       $nomclient=$request->nom;
        $contact=$request->contact;
        $date=$request->date ;
        $adresse=$request->adresse;
        $objet=$request->objet;
        $heure=$request->heure;
        $user= Auth::user()->id;
        $liste=Reclamation::where('user','=',$user)->get();

       Reclamation::firstOrCreate(['nom'=>$nomclient,'contact'=>$contact,'adresse'=>$adresse,'date'=>$date,'heure'=>$heure,'objet'=>$objet,'user'=>$user,]);
        Session::flash('sucess','Ajouter avec succes');
        view('reclamation.ajoute',compact('nom','liste'));
        return redirect()->route('ajoutereclamation');



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
       // $user=User::all();
        $user= Auth::user()->id;
        $liste=Reclamation::where('user','=',$user)->get();
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        return view('reclamation.modifie',compact('user','title','reclamationarchives','nom','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));


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
        $reclamation=Reclamation::find($id);

        $nom= Auth::user()->name;
        $user=Auth::user()->id;
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        return view('reclamation.modifie',compact('user','title','reclamationarchives','nom','reclamation','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }





    public function edit2($id,Request $request)
    {
        $reclamation=Reclamation::find($id);
        $title=$request->path();
        $nom= Auth::user()->name;
        $user=Auth::user()->id;
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        return view('reclamation.archive',compact('user','title','reclamationarchives','nom','reclamation','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

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

        $date= $request->date;
        $heure=$request->heure;

        if(strlen($heure)>0 and strlen($date)>0){


            $data = array(
                'nom' => $request->nom,
                'contact' => $request->contact,
                'adresse' => $request->adresse,
                'date' => $request->date,
                'heure' => $request->heure,
                'objet' => $request->objet,
                'user' => Auth::user()->id

            );

            Reclamation::where('id',$id)->update($data);
            Session::flash('sucessModif','Modification avec succes');
            return redirect()->route('ajoutereclamation');



        }  else{

            Session::flash('echecModifReclam','ERREUR de Modification');
            return redirect()->route('ajoutereclamation');

        }

    }



    public function update2(Request $request, $id)
    {

         $reclam=Reclamation::find($id);

        $nom= Auth::user()->name;

        $nomclient=$reclam->nom;


        $contact=$reclam->contact;

        $date=$reclam->date ;
        $adresse=$reclam->adresse;
        $objet=$reclam->objet;
        $heure=$reclam->heure;
        $motif=$request->motif;

        $user= Auth::user()->id;

        Reclamationachive::firstOrCreate(['nom'=>$nomclient,'contact'=>$contact,'adresse'=>$adresse,'date'=>$date,'heure'=>$heure,'objet'=>$objet,'motif'=>$motif,'user'=>$user,]);
        Session::flash('sucessArchiveReclam','Reclamation archivée avec succes');
        view('reclamation.ajoute',compact('nom','liste'));

       $reclam->delete();

        return redirect()->route('ajoutereclamation');


    }






    public function reclamation($id,Request $request)
    {
        $title=$request->path();

        $reclam=Client::find($id);


        $nom= Auth::user()->name;
        $user=Auth::user()->id;
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

        // $rdvr=session('rdvr');
        //$listerdvreport=Rdvreporte::whereUserAndRdv($user,$rdvr)->get();


        return view('reclamation.noteReclamation',compact('user','reclam','title','listerdvreport','reclamationarchives','nom','clients','liste','rdv','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }





    public function update4(Request $request, $id)
    {
        $title=$request->path();
        $nom= Auth::user()->name;
        $user= Auth::user()->id;

        $reclamationclient=Client::find($id);


        $nomclient=$reclamationclient->nom;
        $prenomclient=$reclamationclient->prenom;
        $nomclt=$nomclient.' '.$prenomclient;

        $contact=$reclamationclient->contact;
        $adresse=$reclamationclient->adresse;

        $date=$request->date ;
        $objet=$request->objet;
        $heure=$request->heure;
        if(strlen($heure)>0 and strlen($date)>0){

            Reclamation::firstOrCreate(['nom'=>$nomclt,'contact'=>$contact,'adresse'=>$adresse,'date'=>$date,'heure'=>$heure,'objet'=>$objet,'user'=>$user,]);
            Session::flash('sucess','Ajouter avec succes');
            view('reclamation.ajoute',compact('nom','liste','title'));
            // return redirect()->route('ajoutereclamation');

            return redirect()->route('listeclient');
        }
       else{

           Session::flash('echecReclamm','DATE ou HEURE non renseignée.Merci');
           view('reclamation.ajoute',compact('nom','liste','title'));
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
