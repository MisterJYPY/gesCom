<?php

namespace App\Http\Controllers;
use App\User;
use App\Client;
use App\Rdv;
use App\Reclamationachive;
use App\Rdvrarchive;
use App\Rdvreporte;
use App\Visite;
use App\Reclamation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class essaicontro extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {




        $title=$request->path();




        $listeCommercial=User::whereAdmin('false')->get();
        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();

        $listeDesClients=Client::all()->count();




        $nom=Auth::user()->nom;
  $user=Auth::user()->id;
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();



        return view('essai',compact('nom',
            'listeClientEnFonctionDeComm','listeDesClients',
            'listeCommercial','user','title',
            'tousLesRdv','toutesLesReclam',
            'nombreCommercial','nombreAdmin'));

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
        //
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
