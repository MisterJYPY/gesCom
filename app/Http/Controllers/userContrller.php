<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Rdvreporte;
use App\Rdv;
use App\Reclamation;
use App\Reclamationachive;
use App\Visite;
use App\Rdvrarchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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



       $title=$request->path();




        if(Auth::attempt([

            'email'=>$request->email,
            'password'=>$request->password
        ])){
           // dd(Auth::check());
           $admin= Auth::user()->admin ;
           $email=   Auth::user()->email ;
            $nom=   Auth::user()->name ;




            $nom= Auth::user()->name;
            $user= Auth::user()->id;
            $clients= Client::select('nom')->whereUser($user)->count();
            $rdvs= Rdv::select('nom')->whereUser($user)->count();

            $reclamations= Reclamation::select('nom')->whereUser($user)->count();

            $visites= Visite::select('nom')->whereUser($user)->count();



            $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

            $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();



            $archives=$archiveRdvs + $archiveReclams;
            $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();


            $listeCommercial=User::whereAdmin('false')->get();

           $listeDesClients=Client::all()->count();

            $title=$request->path();
            $nombreAdmin=User::select('name')->whereAdmin('true')->count();
            $nombreCommercial=User::select('name')->whereAdmin('false')->count();
            $tousLesRdv=Rdv::all()->count();
            $toutesLesReclam=Reclamation::all()->count();

            $listRdvArchive=Rdvrarchive::all();
            $listReclmArchive=Reclamationachive::all();

            if($admin){
                $nom= Auth::user()->name ;

                $user=User::all();
                Session::flash('infoAdin','Vous ètes connecté entant que ADMINISTRATEUR');
                return view('admin.corps',compact('user','listeDesClients',
                    'tousLesRdv','toutesLesReclam','nombreCommercial','nombreAdmin',
                    'title','listeCommercial','reclamationarchives','nom','clients',
                    'rdvs','visites','reclamations','archives','archiveRdvs',
                    'listRdvArchive','listReclmArchive',
                    'archiveReclams','rdvreports'));

            } else{
                $etat= Auth::user()->etat ;

                if($etat==0){

                    Auth::logout();
                    Session::flash('userDesactive','Votre compte est bloqué.');
                          return redirect()->route('deconnexion');

                }

                Session::flash('infoAgent','Vous ètes connecté entant que Agent');
                return view('layouts.corps',compact('user','nombreAdmin','tousLesRdv',
                    'toutesLesReclam','nombreCommercial','title','reclamationarchives',
                    'nom','clients','rdvs','visites','reclamations','archives',
                    'archiveRdvs','archiveReclams','rdvreports'));


            }





        }

        Session::flash('ErreurConnexion','ERREUR de');
        return view('auth.login',compact('user','title','nom','clients',
            'rdvs','visites','reclamations','archives','archiveRdvs',
            'archiveReclams','rdvreports'));


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
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeDesClients=Client::all()->count();


        return view('admin.index',compact('user','listeDesClients',
            'toutesLesReclam','tousLesRdv','nombreAdmin','nombreCommercial',
            'title','reclamationarchives','nom','clients','rdvs','visites',
            'reclamations','archives','archiveRdvs',
            'archiveReclams','rdvreports'));

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
