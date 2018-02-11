<?php

namespace App\Http\Controllers;

use App\Rapport;
use Illuminate\Http\Request;
use App\Client;
use App\Rdvrarchive;
use App\Rdv;
use App\Rdvreporte;
use App\Visite;
use App\Reclamationachive;
use App\Reclamation;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Session;

class RapportController extends Controller
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

        $liste=Rapport::whereUser($user)->get();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();

        return view('rapport.liste',compact('user','reclamationarchives',
            'nom','title','clients','liste','rdvs','visites','reclamations',
            'archives','archiveRdvs','archiveReclams','rdvreports'));

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

        $sujet=$request->sujet;
        $description=$request->description;
        $fichier=$_FILES['fichier']['name'];

        $user=Auth::user()->id;


        $source=$_FILES['fichier']['tmp_name'];
        $des="C:/laragon/www/projet/public/rapports/".basename($_FILES['fichier']['name']);
        copy($source, $des);


        if (copy($source, $des)) {

            Rapport::firstOrCreate([
                'nom'=>$fichier,
                'sujet'=>$sujet,
                'description'=>$description,
                'user'=>$user]);
            Session::flash('SuccesRapport','Rapport envoyé avec sucess');

            return redirect()->route('listeRapport');

        } else{
            Session::flash('EchecRapport','Echec  denvoi');

            return redirect()->route('listeRapport');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       // $date=date("Y-m-d");
       // $aujr=Rapport::where(substr('created_at',0,9),'=',$date)->get();
       // return $aujr;
        $listeRapportEnfonctionComm=Rapport::whereUser($id)->paginate(5);

        $commercial=User::whereAdminAndId('false',$id)->get(['name']);
        //return $commercial;
        strtoupper($commercial);

        // $listeReclamEnFonctionDeComm=Reclamation::whereUser($id)->paginate(5);

        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.rapport',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeDesClients','listeRapportEnfonctionComm',
            'tousLesRdv','toutesLesReclam','commercial','listereclamArchiveEnfonctionComm',
            'nombreCommercial','nombreAdmin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapport $rapport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rapport $rapport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rapport $rapport)
    {
        //
    }
}
