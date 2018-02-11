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
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class createUserController extends Controller
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
        $user=User::all();;




        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();




        return view('auth.register',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listClient',
            'tousLesRdv','toutesLesReclam','commercial',
            'nombreCommercial','nombreAdmin'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      Auth::logout();
        $title=$request->path();



        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();

        Session::flash('Deconnex','Vous etes déconnecté.');


        return view('auth.login',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listClient',
            'tousLesRdv','toutesLesReclam','commercial',
            'nombreCommercial','nombreAdmin'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $characts = 'abcdefghijklmnpqrstuvwxyz';
        $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts .= '123456789';
        $code_aleatoire = '';


        for($i=0;$i <8;$i++)
        {
            $code_aleatoire .= $characts[ rand() % strlen($characts) ];
           // $nbrechoisi = session('choix');
            session(['code' => $code_aleatoire]);
        }


        $nom= Auth::user()->name;
        $user=User::all();
        $title=$request->path();

        $name=$request->name;
        $email=$request->email;
        $rol=$request->admin;

        session(['name' => $name]);
        if($rol==0){
            session(['role' => 'Commercial']);
        } else{
            session(['role' => 'Administrateur']);
        }


        // Envoi des acces de l'utilisateur cré par Mail


        $title = "Utilisateur Xikka";
        $content = "Xikka vous remercie pour votre confiance. Voici vos acces:";
        $user_email = $email;
        $user_name = $name;
        view('admin/emailUtilisateur',compact('code_aleatoire','name'));

        try
        {
            $data = ['email'=> $user_email,'name'=> $user_name,'subject' => $title, 'content' => $content];
            Mail::send('admin/emailUtilisateur', $data, function($message) use($data)
            {
                $subject=$data['subject'];
                $message->from('kassieric60@gmail.com');
                $message->to($data['email'], $data['name'])->subject($subject);
            });


        }
        catch (\Exception $e)
        {

            Session::flash('EchecUser','Echec de création du profil.
                Vérifiez votre connexion Internet.Merci de réessayer
                           ');

            return redirect()->route('acceuiAdmin');
        }


     //---------------------------------------------



        $passwd=Hash::make($code_aleatoire) ;



        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();




        Session::flash('succesUser','Profil utilisateur a été cré avec succes.
                           Vous avez reçu vos acces dans votre boîte Mail.
                           Merci');


        User::firstOrCreate(['name'=>$name,'password'=>$passwd,'etat'=>1,
            'email'=>$email,'admin'=>$rol]);
        return redirect()->route('acceuiAdmin');
    }







    public function store4(Request $request)
    {

        $characts = 'abcdefghijklmnpqrstuvwxyz';
        $characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts .= '123456789';
        $code_aleatoire = '';


        for($i=0;$i <8;$i++)
        {
            $code_aleatoire .= $characts[ rand() % strlen($characts) ];
            // $nbrechoisi = session('choix');
            session(['code' => $code_aleatoire]);
        }


        $user=User::all();
        $title=$request->path();

        $email=$request->email;
        $userResetPass=User::whereEmail($email)->get();
        $taillEmail=sizeof($userResetPass);
        if ($taillEmail>0){


          //  Envoi le nouveau mot de passe  de l'utilisateur par Mail


        $title = "Utilisateur Xikka";
        $content = "Xikka vous remercie pour votre confiance. Voici votre nouveau Mot de Passe:";
        $user_email = $email;
        view('admin/emailUtilisateur',compact('code_aleatoire','name'));

        try
        {
            $data = ['email'=> $user_email,'name'=>'Client','subject' => $title, 'content' => $content];
            Mail::send('admin/emailUtilisateurReset', $data, function($message) use($data)
            {
                $subject=$data['subject'];
                $message->from('kassieric60@gmail.com');
                $message->to($data['email'], $data['name'])->subject($subject);
            });


        }
        catch (\Exception $e)
        {

            Session::flash('echec1UserReset','Echec de Modification du profil.
            Vérifiez votre connexion Internet.Merci de réessayer
                           ');

            return redirect()->route('acceuilAuth');
        }





        $passwd=Hash::make($code_aleatoire) ;

            $data = array(
                'password' => $passwd
            );

            User::whereEmail($email)->update($data);

        Session::flash('succesUserReset','
            Vous avez reçu votre nouveau Mot de passe  dans votre boîte Mail.Merci
            ');

        return redirect()->route('acceuilAuth');


        }else{
            Session::flash('echecUserReset','
            ERREUR.
            ');

            return redirect()->route('acceuilAuth');

        }


    }










    public function store2(Request $request)
    {


        $user= Auth::user()->id;
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();
        $reclamations= Reclamation::select('nom')->whereUser($user)->count();
        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();
        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();
        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $nom= Auth::user()->name;
        $user=User::all();
        $title=$request->path();



        $email=$request->email;
       $password=$request->password;
        $taillpassword=strlen($password);


        if ($taillpassword<6){
            Session::flash('echecTaillpassword','Echec de Modification ');
            return redirect()->route('acceuilcommercial');
        }
        else{


        $verifiUserEmail=User::whereEmailAndAdmin($email,'false')->get();
       $emailUserConnecte= Auth::user()->email;

        $verifiUserEmailTaille=sizeof($verifiUserEmail);


        if($emailUserConnecte==$email){

            $data = array(
                'password' => Hash::make($request->password)
            );

            User::whereEmailAndAdmin($email,'false')->update($data);

            Session::flash('sucessModifPassWord','Modification ');
            return redirect()->route('acceuilcommercial');

        }
        else{
            Session::flash('echecModifPassWord','Echec de Modification ');
            return redirect()->route('acceuilcommercial');

        }


        }
    }








    public function store21(Request $request)
    {

        $title=$request->path();



        $email=$request->email;
        $password=$request->password;
        $taillpassword=strlen($password);


        if ($taillpassword<6){
            Session::flash('echecTaillpassword','Echec de Modification ');
            return redirect()->route('acceuilAdminn');
        }
        else{


            $verifiUserEmail=User::whereEmailAndAdmin($email,'true')->get();
            $verifiUserEmailTaille=sizeof($verifiUserEmail);

            $emailUserConnecte= Auth::user()->email;
            if($emailUserConnecte==$email){

                $data = array(
                    'password' => Hash::make($request->password)
                );

                User::whereEmailAndAdmin($email,'true')->update($data);

                Session::flash('sucessModifPassWord','Modification ');
                return redirect()->route('acceuilAdminn');

            }
            else{
                Session::flash('echecModifPassWord','Echec de Modification ');
                return redirect()->route('acceuilAdminn');

            }


        }
    }







    public function store3(Request $request){


    $title=$request->path();


    return view('auth.vuePasswordOublier',compact('title'));

}




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {


        $user= Auth::user()->id;
        $clients= Client::select('nom')->whereUser($user)->count();
        $rdvs= Rdv::select('nom')->whereUser($user)->count();
        $reclamations= Reclamation::select('nom')->whereUser($user)->count();
        $visites= Visite::select('nom')->whereUser($user)->count();
        $archiveRdvs= Rdvrarchive::select('nom')->whereUser($user)->count();
        $archiveReclams=Reclamationachive::select('nom')->whereUser($user)->count();
        $archives=$archiveRdvs + $archiveReclams;
        $rdvreports= Rdvreporte::select('nom')->whereUser($user)->count();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();
        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $nom= Auth::user()->name;
        $user=User::all();
        $title=$request->path();

        return view('layouts.corps',compact('user','nombreAdmin','tousLesRdv',
            'toutesLesReclam','nombreCommercial','title','reclamationarchives',
            'nom','clients','rdvs','visites','reclamations','archives','archiveRdvs',
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
