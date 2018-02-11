<?php

namespace App\Http\Controllers;

use App\Client;
use App\Rdvrarchive;
use App\Rdv;
use App\Rdvreporte;
use App\Visite;
use App\Reclamationachive;
use App\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Session;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //$nom= Auth::user()->name;
        $user= Auth::user()->id;
        $liste=Client::where('user','=',$user)->get();
        $title=$request->path();


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

        return view('client.liste',compact('user','reclamationarchives',
            'nom','title','clients','liste','rdvs','visites','reclamations',
            'archives','archiveRdvs','archiveReclams','rdvreports'));


    }

    public function index1(Request $request)
    {

        $user= Auth::user()->id;

        $liste=Client::where('user','=',$user)->get();

        $title=$request->path();
        $nom= Auth::user()->name;

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($user)->count();
        $commcia='';
        return view('client.ajoute',compact('user','title',
            'reclamationarchives','nom','clients','liste','rdvs','visites','commcia',
            'reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));


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
        $liste=Client::where('user','=',$user)->orderBy('created_at')->take(10)->get();
        $title=$request->path();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();
        $commcia='';
        return view('client.ajoute',compact('user','title','commcia',
            'reclamationarchives','nom','clients','liste','rdvs','visites',
            'reclamations','archives','archiveRdvs',
            'archiveReclams','rdvreports'));


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
        $user= Auth::user()->id;
        $liste=Client::where('user','=',$user)->orderBy('created_at')->take(10)->get();
        $title=$request->path();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();

if ( !is_numeric($request->contact)){

    Session::flash('ErreurContact','ERREUR DE SAISIE DU CONTACT');
    return redirect()->route('ajouteclient');

}

else{



    $characts = 'C';
    $characts .= '123456789';
    $code_aleatoire = '';


    for($i=0;$i <4;$i++)
    {
        $code_aleatoire .= $characts[ rand() % strlen($characts) ];
        // $nbrechoisi = session('choix');
        session(['code' => $code_aleatoire]);
    }


        $nom= Auth::user()->name;
       // $user=User::all();
        $title=$request->path();

        $nom= strtoupper($request->nom);
        $prenom= strtoupper($request->prenom);

        $contact=$request->contact;
        $adresse=ucfirst($request->adresse);
        $groupe=$request->choix;
        $email=$request->email;

   // return strlen($email);

        $etoile=$request->etoile;
         $code=$code_aleatoire;
        $user= Auth::user()->id;

        $verifierClient=Client::whereNomAndPrenomAndContactAndEmail($nom,$prenom,$contact,$email)->get();
          foreach ($verifierClient as $value){
             $idCommercial= $value['user'];
          }
if ($tailleTabloClient=sizeof($verifierClient)>0){
    $comm=User::whereId($idCommercial)->get();

    foreach ($comm as $values){
        $commcia= $values['name'];
       // session(['comer' =>$ccial]);

    }

    Session::flash('clientExiste','Ce client existe déja.Il est enregistré par le');

    // view('client.ajoute',compact('nom','liste','title'));
    return view('client.ajoute',compact('user','title','commcia',
        'reclamationarchives','nom','clients','liste','rdvs','visites',
        'reclamations','archives','archiveRdvs',
        'archiveReclams','rdvreports'));

}

      else{

          if (strlen($email)>0){

              $liste=Client::where('user','=',$user)->get();

              Client::firstOrCreate(['nom'=>$nom,
                  'prenom'=>$prenom,
                  'email'=>$email,
                  'adresse'=>$adresse,
                  'contact'=>$contact,
                  'groupe'=>$groupe,
                  'etoile'=>$etoile,
                  'code'=>$code,
                  'user'=>$user]);

              Session::flash('sucess','Ajouter avec sucess');
              view('client.ajoute',compact('nom','liste'));
              return redirect()->route('listeclient');
          }
            else{

              $liste=Client::where('user','=',$user)->get();
              Client::firstOrCreate(['nom'=>$nom,'prenom'=>$prenom,
                  'email'=>'emailnull@g.com',
                  'adresse'=>$adresse,
                  'contact'=>$contact,
                  'groupe'=>$groupe,
                  'etoile'=>$etoile,
                  'code'=>$code,
                  'user'=>$user]);
              Session::flash('sucess','Ajouter avec sucess');
              view('client.ajoute',compact('nom','liste'));
              return redirect()->route('listeclient');

           }


        }

      }
    }





    public function store2(Request $request)
    {


        $nom= Auth::user()->name;
        $user= Auth::user()->id;
        $liste=Client::where('user','=',$user)->orderBy('created_at')->take(10)->get();
        $title=$request->path();

        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();


        if ( !is_numeric($request->contact)){

            Session::flash('ErreurContact','ERREUR DE SAISIE DU CONTACT');
            return redirect()->route('listeclient');

        }
        else{




            $characts = 'C';
            $characts .= '123456789';
            $code_aleatoire = '';


            for($i=0;$i <4;$i++)
            {
                $code_aleatoire .= $characts[ rand() % strlen($characts) ];
                // $nbrechoisi = session('choix');
                session(['code' => $code_aleatoire]);
            }


        $nom= strtoupper($request->nom) ;
        $prenom= strtoupper($request->prenom);
        $contact=$request->contact;
        $adresse=ucfirst($request->adresse);
        $groupe=$request->choix;
        $email=$request->email;
        $etoile=$request->etoile;
        $code=$code_aleatoire;
        $user= Auth::user()->id;
        //$user_id= Auth::user()->id;
        // $liste=Client::where('user','=',$user)->get();
       // $verifierClient=Client::whereNomAndPrenomAndEmailAndContact($nom,$prenom,$email,$contact)->get();


            $verifierClient2=Client::whereNomAndPrenomAndContactAndEmail($nom,$prenom,$contact,$email)->get();
            foreach ($verifierClient2 as $value){
                $idCommercial2= $value['user'];
            }


            if ($tailleTabloClient=sizeof($verifierClient2)>0){
                $comm=User::whereId($idCommercial2)->get();

                foreach ($comm as $values){
                    $commcia= $values['name'];
                    //session(['comer2' =>$ccial2]);

                }

                Session::flash('clientExiste2','Ce client existe déja.Il est enregistré par le');

                // view('client.ajoute',compact('nom','liste','title'));
                return view('client.ajoute',compact('user','title','commcia',
                    'reclamationarchives','nom','clients','liste','rdvs','visites',
                    'reclamations','archives','archiveRdvs',
                    'archiveReclams','rdvreports'));

            }


            else{

            if (strlen($email)>0){

        $liste=Client::where('user','=',$user)->get();
        Client::firstOrCreate(['nom'=>$nom,
            'prenom'=>$prenom,
            'email'=>$email,'adresse'=>$adresse,
            'contact'=>$contact,
            'groupe'=>$groupe,
            'etoile'=>$etoile,
            'code'=>$code,

            'user'=>$user]);
        Session::flash('sucess2','Ajouter avec sucess');
        view('client.ajoute',compact('nom','liste'));
        return redirect()->route('listeclient');
    }
         else{

             $liste=Client::where('user','=',$user)->get();
             Client::firstOrCreate(['nom'=>$nom,
                 'prenom'=>$prenom,
                 'email'=>'emailnull@g.com',
                 'adresse'=>$adresse,
                 'contact'=>$contact,
                 'groupe'=>$groupe,
                 'etoile'=>$etoile,
                 'code'=>$code,
                 'user'=>$user]);
             Session::flash('sucess2','Ajouter avec sucess');
             view('client.ajoute',compact('nom','liste'));
             return redirect()->route('listeclient');

         }


        }

    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $nom= Auth::user()->name;
        //$user=User::all();
        $user= Auth::user()->id;
        $liste=Client::where('user','=',$user)->get();


        return view('client.modifie',compact('nom','user','liste'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {

        $client=Client::find($id);

        $title=$request->path();
        $nom= Auth::user()->name;
        $user= Auth::user()->id;
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();

        $reclamations= Reclamation::select('nom')->whereUser($user)->count();

        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($nom)->count();

        $archiveReclams=Reclamationachive::select('nom')->whereUser($nom)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($nom)->count();
        $reclamationarchives= Reclamationachive::select('nom')->whereUser($nom)->count();

        return view('client.modifie',compact('user','title','reclamationarchives','nom','clients','client','liste','rdvs','visites','reclamations','archives','archiveRdvs','archiveReclams','rdvreports'));



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
        if ( !is_numeric($request->contact)){

            Session::flash('ErreurContact','ERREUR DE SAISIE DU CONTACT');
            return redirect()->route('ajouteclient');

        }

        else{


        $title=$request->path();
        $data = array(
            'nom' => strtoupper($request->nom),
            'prenom' => strtoupper($request->prenom),
            'email' => $request->email,
            'adresse' =>ucfirst( $request->adresse),
            'contact' => $request->contact,
            'groupe' => $request->choix,
            'user' => Auth::user()->id

        );

        Client::where('id',$id)->update($data);

        Session::flash('sucessModif','Modification avec succes');
        return redirect()->route('listeclient');

    }

    }



 public function etoile1(Request $request, $id)
    {
        $title=$request->path();

        $clientEtoile=Client::whereId($id)->get();

        foreach ($clientEtoile as $client){
            $etoile=$client->etoile+1;
        }

        $data = array(
            'etoile' => $etoile,

        );


 if ($etoile<4){


     Client::where('id',$id)->update($data);

     Session::flash('succesEtoile','Etoile Ajoutée avec succes');
     return redirect()->route('listeclient');


 }
 else{
     Session::flash('echecEtoile','Ce client a atteint le maximum étoile qui est 3');
     return redirect()->route('listeclient');

 }


    }









    public function etoile2(Request $request, $id)
    {
        $title=$request->path();

        $clientEtoile=Client::whereId($id)->get();

        foreach ($clientEtoile as $client){
            $etoile=$client->etoile-1;
        }

        $data = array(
            'etoile' => $etoile,

        );


        if ($etoile>=1){


            Client::where('id',$id)->update($data);

            Session::flash('succesEtoileMoin','Nombre Etoile diminué avec succes');
            return redirect()->route('listeclient');


        }
        else{
            Session::flash('echecEtoileMoin','Ce client a atteint le minimun étoile qui est 1');
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
