<?php

namespace App\Http\Controllers;
use App\Client;
use App\Rdv;
use App\Rdvrarchive;
use App\Rdvreporte;
use App\Reclamation;
use App\Reclamationachive;
use App\Visite;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class acceuilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nom= Auth::user()->name;
        //$user=User::all();
        $nombre=$request->get('choix');
        session(['choix' => $nombre]);

        $title=$request->path();


        $user= Auth::user()->id;
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams= Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        return view('client.insertionMutiple',compact('user','title','reclamationarchives','nom','nombre','clients','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));

    }


    public function adminIndex(Request $request)
{
    $user=User::all();
    $nom= Auth::user()->name;
    $user= Auth::user()->id;
    $rdv= Rdv::select('nom')->whereUser($user)->count();
    $reclamation= Reclamation::select('nom')->whereUser($user)->count();
    $title=$request->path();

    return view('admin.index',compact('user','title','nom','reclamation','rdv'));
}



    public function corps(Request $request)
    {
       // $user=User::all();
        $title=$request->path();
        $nom= Auth::user()->name;
        $user= Auth::user()->id;
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams= Reclamationachive::select('nom')->whereUser($user)->count();
         $archives=$archiveRdvs + $archiveReclams;
      $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
            view('layouts.index',compact('reclamations','title','reclamationarchives','rdvs','clients','archiveReclams','archiveRdvs','rdvreports'));
        return view('layouts.corps',compact('user','title','nom','clients','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$nom= Auth::user()->name;
        $title=$request->path();

        return view('auth.login',compact('user','title','nom','clients','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));
    }


    public function create22(Request $request)
    {
        //$nom= Auth::user()->name;
        $title=$request->path();

        return view('auth.login',compact('user','title','nom','clients','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));
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
        $user= Auth::user()->id;

        $nbrechoisi = session('choix');

        $user = Auth::user()->id;
      
        for ($i=1;$i<=$nbrechoisi;$i++){


   //    dd($request);

            $nom='nom'.$i;
            $prenom='prenom'.$i;
            $contact='contact'.$i;
            $adresse='adresse'.$i;

            $email='email'.$i;
            $group='group'.$i;
            $etoile='etoile'.$i;

            $nomclient = strtoupper($request->$nom) ;
            $prenom = strtoupper($request->$prenom);
            $contact = $request->$contact;
            $adresse =ucfirst( $request->$adresse);
            $groupe = $request->$group;
            $etoile = $request->$etoile;

            $email = $request->$email;

           if ( !is_numeric($contact)){

                Session::flash('ErreurContact','ERREUR DE SAISIE DU CONTACT');
                return redirect()->route('ajouteclient');

            }
            
            else{


                $characts = 'C';
                $characts .= '123456789';
                $code_aleatoire = '';
            $code_aleatoire="";
                    for($j=0;$j <4;$j++)
                     {
                    $code_aleatoire .= $characts[ rand() % strlen($characts) ];
                     }
                  session(['code' => $code_aleatoire]);

                 if (strlen($email)>0){


                    Client::firstOrCreate(['nom'=>$nomclient,
                        'prenom'=>$prenom,
                        'email'=>$email,
                        'adresse'=>$adresse,
                        'contact'=>$contact,
                        'groupe'=>$groupe,
                        'etoile'=>$etoile,
                        'code'=>$code_aleatoire,
                        'user'=>$user]);



                }
             else{


                  Client::create(['nom'=>$nomclient,
                        'prenom'=>$prenom,
                        'email'=>'emailnull@g.com',
                        'adresse'=>$adresse,'contact'=>$contact,
                        'groupe'=>$groupe,
                        'etoile'=>$etoile,
                        'code'=>$code_aleatoire,
                        'user'=>$user]);
                


              }


            }


        }

        Session::flash('sucess','Ajouter avec sucess');
        //view('client.ajoute',compact('nom','liste'));
     return redirect()->route('listeclient');

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
