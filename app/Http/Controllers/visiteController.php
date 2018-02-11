<?php

namespace App\Http\Controllers;
use App\Visite;
use App\Rdvrarchive;
use App\Rdv;
use App\Client;
use App\Reclamationachive;
use App\Reclamation;
use App\Rdvreporte;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class visiteController extends Controller
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
        $liste=Visite::where('user','=',$user)->get();


        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        return view('visite.liste',compact('user','title','reclamationarchives','nom','clients','liste','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));



    }
    public function index1(Request $request)
    {
        $title=$request->path();
        $nom= Auth::user()->name;
        $user= Auth::user()->id;
        $liste=Visite::where('user','=',$user)->get();


        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        return view('visite.liste',compact('user','title','reclamationarchives','nom','clients','liste','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));


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
        //$user=User::all();
        $user= Auth::user()->id;
        $liste=Visite::where('user','=',$user)->get();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        return view('visite.ajoute',compact('user','title','reclamationarchives','nom','clients','liste','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));


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
        $adresse=$request->adresse;
        $contact=$request->contact;

        $heured=$request->heured;
        $heuref=$request->heuref;
        $date=$request->date;
        $objet=$request->objet;
        //$user= $nom= Auth::user()->id;
        $user= Auth::user()->id;
        $liste=Visite::where('user','=',$user)->get();

         Visite::firstOrCreate(['agence'=>$nomclient,'contact'=>$contact,'lieu'=>$adresse,'heure_debut'=>$heured,'heure_fin'=>$heuref,'date'=>$date,'objet'=>$objet,'user'=>$user,]);
        Session::flash('sucess','Ajouter avec sucess');
        view('visite.liste',compact('nom','liste'));
        return redirect()->route('listevisite');


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
        $liste=Visite::where('user','=',$user)->get;

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();
        return view('visite.modifie',compact('user','title','reclamationarchives','nom','clients','liste','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));


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
        $visite=Visite::find($id);
        $user=Auth::user()->id;
        $nom= Auth::user()->name;

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();
        return view('visite.modifie',compact('user','title','reclamationarchives','nom','clients','liste','rdvs','visites','visite','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));



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

        $data = array(
            'agence' => $request->nom,
            'contact' => $request->contact,
            'lieu' => $request->adresse,
            'heure_debut' => $request->heured,
            'heure_fin' => $request->heuref,
            'date' => $request->date,
            'objet' => $request->objet,
            'user' => Auth::user()->id

        );

        Visite::where('id',$id)->update($data);




        Session::flash('sucessModif','Modification avec succes');
        return redirect()->route('listevisite');

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
