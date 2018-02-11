<?php

namespace App\Http\Controllers;
use App\Bloqueuser;
use App\User;
use App\Client;
use App\Rdvreporte;
use App\Rdv;
use App\Reclamation;
use App\Reclamationachive;
use Illuminate\Support\Facades\DB;
use App\Rdvrarchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index(Request $request)
    {

        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

    }


    public function index1(Request $request,$id)
    {
        session(['idccial'=>$id]);
        $commercial=User::whereAdminAndId('false',$id)->get(['name']);
        //return $commercial;
        strtoupper($commercial);
       $listeClientEnFonctionDeComm=Client::whereUser($id)->paginate(5);


        $listeCommercial=User::whereAdmin('false')->get();
       // $listeCommBloquer=Bloqueuser::all();


        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeDesClients=Client::all()->count();


        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeClientCommercial',compact('nom',
            'listeClientEnFonctionDeComm','commercial',
            'listeCommercial','user','title','listeCommBloquer','listeDesClients',
            'tousLesRdv','toutesLesReclam',
            'nombreCommercial','nombreAdmin'));

    }

 public function transfertClient(Request $request)
    {
        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();

        $listeCommercial=User::whereAdmin('false')->get();
        // $listeCommBloquer=Bloqueuser::all();
        $listeDesClients=Client::all()->count();
        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeComPourTransfertClient',compact('nom','listeCommercial','user','title',
            'tousLesRdv','toutesLesReclam','listeCommBloquer','listeDesClients',
            'nombreCommercial','nombreAdmin'));

    }

    public function transfertClientCommercial(Request $request,$id)
    {

        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();

        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();
        $nom= Auth::user()->name;
        $user=User::all();

        $idd=session('idccial');

        $nombreCientTrans=Client::whereUser($idd)->count();

        $data = array(
            'user' =>$id
        );

        if ($nombreCientTrans>0){
            for ($k=0;$k<$nombreCientTrans;$k++){
                Client::where('user',$idd)->update($data);
            }
            Session::flash('sucessTransfertclient','Client(s) transferé(s) avec succes');
            return view('admin.corps',compact('nom','listeCommercial','user','title',
                'tousLesRdv','toutesLesReclam','listeCommBloquer','listeDesClients',
                'nombreCommercial','nombreAdmin'));
        }
    else{
        Session::flash('EchecTransfertclient','Pas de client(s) pour ce commercial');
        return view('admin.corps',compact('nom','listeCommercial','user','title',
            'tousLesRdv','toutesLesReclam','listeCommBloquer','listeDesClients',
            'nombreCommercial','nombreAdmin'));
    }


    }



    public static function getChampTable($table,$id,$champ='name')
    {

        $sql = "SELECT $champ FROM $table WHERE id = '$id'";
        $result = DB::select(DB::raw($sql));

        return $result[0]->$champ;

    }




    public function index2(Request $request)
{

    $title=$request->path();
    $nombreAdmin=User::select('name')->whereAdmin('true')->count();
    $nombreCommercial=User::select('name')->whereAdmin('false')->count();

    $tousLesRdv=Rdv::all()->count();
    $toutesLesReclam=Reclamation::all()->count();

    $listeCommercial=User::whereAdmin('false')->get();
   // $listeCommBloquer=Bloqueuser::all();
    $listeDesClients=Client::all()->count();
    $nom= Auth::user()->name;
    $user=User::all();;

    return view('admin.corps',compact('nom','listeCommercial','user','title',
        'tousLesRdv','toutesLesReclam','listeCommBloquer','listeDesClients',
        'nombreCommercial','nombreAdmin'));
}

public function index01(Request $request)
{

    $title=$request->path();
    $nombreAdmin=User::select('name')->whereAdmin('true')->count();
    $nombreCommercial=User::select('name')->whereAdmin('false')->count();

    $tousLesRdv=Rdv::all()->count();
    $toutesLesReclam=Reclamation::all()->count();

    $listeCommercial=User::whereAdmin('false')->get();
   // $listeCommBloquer=Bloqueuser::all();
    $listeDesClients=Client::all()->count();
    $nom= Auth::user()->name;
    $user=User::all();;

    return view('admin.corps',compact('nom','listeCommercial','user','title',
        'tousLesRdv','toutesLesReclam','listeCommBloquer','listeDesClients',
        'nombreCommercial','nombreAdmin'));
}



public function index02(Request $request)
{
    $title=$request->path();

    $listReclama=Reclamation::all();

    $nombreAdmin=User::select('name')->whereAdmin('true')->count();
    $nombreCommercial=User::select('name')->whereAdmin('false')->count();

    $tousLesRdv=Rdv::all()->count();
    $toutesLesReclam=Reclamation::all()->count();
    $listeCommercial=User::whereAdmin('false')->get();
    $listeDesClients=Client::all()->count();

    $nom= Auth::user()->name;
    $user=User::all();
    $clients='';
    $rdvs='';
    $archiveRdvs='';
    $archiveReclams='';
    $reclamations='';

    return view('admin.listeDesReclma',compact('nom','listeCommercial',
        'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv','listReclama',
        'tousLesRdv','toutesLesReclam','commercial','listeDesClients','clients','reclamations',
        'nombreCommercial','nombreAdmin','rdvs','archiveReclams','archiveRdvs'));
}





    public function index22(Request $request)
    {

        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();

        $listeCommercial=User::whereAdmin('false')->get();
        // $listeCommBloquer=Bloqueuser::all();
        $listeDesClients=Client::all()->count();
        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.corps',compact('nom','listeCommercial','user','title',
            'tousLesRdv','toutesLesReclam','listeCommBloquer','listeDesClients',
            'nombreCommercial','nombreAdmin'));
    }




    public function index3(Request $request,$id)
    {

        $commercial=User::whereAdminAndId('false',$id)->get(['name']);
        //return $commercial;
        strtoupper($commercial);

        $listeRdvEnFonctionDeComm=Rdv::whereUser($id)->paginate(5);

        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();


        $nom= Auth::user()->name;
        $user=User::all();;
        $listeDesClients=Client::all()->count();

        return view('admin.rdvCommercial',compact('nom','listeCommercial',
            'listeRdvEnFonctionDeComm','user','title','commercial',
            'tousLesRdv','toutesLesReclam','listeDesClients',
            'nombreCommercial','nombreAdmin'));

    }






    public function index4(Request $request,$id)
    {



        $commercial=User::whereAdminAndId('false',$id)->get(['name']);
        //return $commercial;
        strtoupper($commercial);

        $listeReclamEnFonctionDeComm=Reclamation::whereUser($id)->paginate(5);

        $title=$request->path();
        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.reclamationCommercial',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeDesClients',
            'tousLesRdv','toutesLesReclam','commercial',
            'nombreCommercial','nombreAdmin'));

    }







    public function index5(Request $request)
    {

        $title=$request->path();

        $listeAdmin=User::whereAdmin('true')->get();
        //return $commercial;
        strtoupper($listeAdmin);

       // $listeReclamEnFonctionDeComm=Reclamation::whereUser($id)->get();


        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeDesAdmin',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients',
            'nombreCommercial','nombreAdmin'));

    }




    public function index6(Request $request)
    {

        $title=$request->path();

        $listClient=Client::all();


        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeDesClient',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listClient',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients',
            'nombreCommercial','nombreAdmin'));

    }



    public function index7(Request $request)
    {

        $title=$request->path();

        $listRdv=Rdv::all();

        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeDesRdv',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients',
            'nombreCommercial','nombreAdmin'));

    }


    public function index8(Request $request)
    {

        $title=$request->path();

        $listReclm=Reclamation::all();
        //return $listReclm->id;

        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeDesReclamation',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv','listReclm',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients',
            'nombreCommercial','nombreAdmin'));

    }







    public function detailRvdReport($id,Request $request)
    {

        $liste=Rdvreporte::whereId($id)->get();

        $title=$request->path();

        $listReclm=Reclamation::all();
        //return $listReclm->id;

        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();

        return view('admin.DetailRdvReporté',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv','listReclm',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients','liste',
            'nombreCommercial','nombreAdmin'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request,$id)
    {
        $listereclamArchiveEnfonctionComm=Reclamationachive::whereUser($id)->paginate(5);

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

        return view('admin.reclamationArchiveCommercial',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeDesClients',
            'tousLesRdv','toutesLesReclam','commercial','listereclamArchiveEnfonctionComm',
            'nombreCommercial','nombreAdmin'));

    }







    public function create1(Request $request,$id)
    {
        $listeRdvArchiveEnfonctionComm=Rdvrarchive::whereUser($id)->paginate(5);

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

        return view('admin.rdvArchiveCommercial',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeDesClients','listeRdvArchiveEnfonctionComm',
            'tousLesRdv','toutesLesReclam','commercial','listereclamArchiveEnfonctionComm',
            'nombreCommercial','nombreAdmin'));

    }



    public function create2(Request $request,$id)
    {
      $id=$id;
        $title=$request->path();

        $listeClientInfo=Client::whereId($id)->get();


        foreach ($listeClientInfo as $listeClientInfo){

            $nominfoclt= $listeClientInfo->nom;
            $prenominfoClt= $listeClientInfo->prenom;

            $contactinfoClt= $listeClientInfo->contact;
            $nomPrenom=$nominfoclt.' '.$prenominfoClt;;

        }





      $infoRdvClient=Rdv::whereNomAndContact($nomPrenom,$contactinfoClt)->paginate(2);

        $infoReclamatinClient=Reclamation::whereNomAndContact($nomPrenom,$contactinfoClt)->paginate(2);


        $commercial=User::whereAdminAndId('false',$id)->get(['name']);
        //return $commercial;
        strtoupper($commercial);

        // $listeReclamEnFonctionDeComm=Reclamation::whereUser($id)->paginate(5);


        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.InfoRdvEnFonctionDuClient',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeDesClients','id',
            'listeRdvArchiveEnfonctionComm','infoRdvClient','infoReclamatinClient','nomPrenom',
            'tousLesRdv','toutesLesReclam','commercial','listereclamArchiveEnfonctionComm',
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



        $title=$request->path();

      //  $listReclmArchive=Reclamationachive::all();
        //return $listReclm->id;

        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeDesReclamationArchive',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv','listReclm',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients','listReclmArchive',
            'nombreCommercial','nombreAdmin'));


    }





    public function store1(Request $request)
    {



        $title=$request->path();

       // $listRdvArchive=Rdvrarchive::all();

        //return $listReclm->id;

        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeDesRdvArchive',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv','listReclm',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients','listRdvArchive',
            'nombreCommercial','nombreAdmin'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {


        //$idcom=$id;

   $title=$request->path();

        $nom= Auth::user()->name;

        $commercial=User::find($id);

        $name=$commercial->name;
        $email=$commercial->email;
        $rol=$commercial->admin;
        $passwd=$commercial->password;

        session(['nom' => $name]);

        $data = array(
            'name' => $name,
            'password' =>$passwd,
            'email' => $email,
            'admin' =>$rol,
            'etat' => 0,


        );

        User::where('id',$id)->update($data);


        Session::flash('userBloque','Compte du commercial bloqué');

       // $commercial->delete();

        return redirect()->route('acceuiAdmin');

    }







    public function show1($id,Request $request)
    {


        //$idcom=$id;

        $title=$request->path();

        $nom= Auth::user()->name;

        $commercial=User::find($id);

        $name=$commercial->name;
        $email=$commercial->email;
        $rol=$commercial->admin;
        $passwd=$commercial->password;

        session(['nom' => $name]);

        $data = array(
            'name' => $name,
            'password' =>$passwd,
            'email' => $email,
            'admin' =>$rol,
            'etat' => 1,


        );

        User::where('id',$id)->update($data);


        Session::flash('userDeBloque','Compte du commercial Debloqué');

        // $commercial->delete();

        return redirect()->route('acceuiAdmin');

    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $comm=User::whereId($id)->get();

        foreach ($comm as $comm){
            $nom=$comm->nom;
            $prenom=$comm->prenom;
        }

         $nomcom=$nom.' '.$prenom;



      $reclamation=Reclamationachive::whereNom($nomcom)->get();

        $comm=User::whereId($id)->get();

        $title=$request->path();

        $listReclm=Reclamation::all();
        //return $listReclm->id;

        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.detailReclamation',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv','listReclm',
            'tousLesRdv','toutesLesReclam','commercial','reclamation','comm','listeDesClients',
            'nombreCommercial','nombreAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */






    public function reclamationArchive(Request $request)
    {

        $title=$request->path();

        $listreclamArchiv=Reclamationachive::all();

        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeDesReclamationArchive',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients','listreclamArchiv',
            'nombreCommercial','nombreAdmin'));

    }







    public function rdvarchive(Request $request)
    {

        $title=$request->path();

        $listrdvArchiv=Rdvrarchive::all();

        $nombreAdmin=User::select('name')->whereAdmin('true')->count();
        $nombreCommercial=User::select('name')->whereAdmin('false')->count();

        $tousLesRdv=Rdv::all()->count();
        $toutesLesReclam=Reclamation::all()->count();
        $listeCommercial=User::whereAdmin('false')->get();
        $listeDesClients=Client::all()->count();

        $nom= Auth::user()->name;
        $user=User::all();;

        return view('admin.listeDesRdvArchive',compact('nom','listeCommercial',
            'listeReclamEnFonctionDeComm','user','title','listeAdmin','listRdv','listrdvArchiv',
            'tousLesRdv','toutesLesReclam','commercial','listeDesClients','listreclamArchiv',
            'nombreCommercial','nombreAdmin'));

    }




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
