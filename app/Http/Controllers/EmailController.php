<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Facades\Session;
use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title=$request->path();
        $title = "XIKKA LARA MAIL";
        $content = "je suis le contenu du mail";
        $user_email = "kassieric0@gmail.com";
        $user_name = "Kassi Eric";

        try
        {
            $data = ['email'=> $user_email,'name'=> $user_name,'subject' => $title, 'content' => $content];
            Mail::send('email/essai', $data, function($message) use($data)
            {
                $subject=$data['subject'];
                $message->from('kassieric60@gmail.com');
                $message->to('kassieric0@gmail.com', 'MRKASSI')->subject($subject);
            });

            return ' ok merci mail';
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title=$request->path();
        return view('email.index',compact('title'));
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
        $groupe=$request->choix;

        session(['group' => $groupe]);


        $title= strtoupper($request->sujet);

        $content=ucfirst($request->message);

        view('email/essai',compact('content'));

        $user_email = "kassieric0@gmail.com";
        $user_name = "Kassi Eric";



        try
        {
            $groupe=$request->choix;
            session(['groupechoisi' => $groupe]);


            $info_client= Client::where('groupe','=',$groupe)->get();
            // return $info_client;
            $inf="";
            foreach ($info_client as $client){
                $nom_client=$client['nom'];
                $mail_client=$client['email'];
                $inf.= $mail_client.'  '.$nom_client;

                $data = ['email'=> $mail_client,'name'=> $nom_client,'subject' => $title, 'content' => $content];
                Mail::send('email/essai', $data, function($message) use($data)
                {
                    $subject=$data['subject'];
                    $message->from('kassieric60@gmail.com');
                    $message->to($data['email'], $data['name'])->subject($subject);
                });
            }

            Session::flash('sucessEmail','Mails envoyés avec succes');
            return redirect()->route('listeclient');
        }
        catch (\Exception $e)
        {
            Session::flash('EchecEmail','Echec.
                Vérifiez votre connexion Internet.Merci de réessayer
                           ');

            return redirect()->route('listeclient');
        }




        // return'ok mail';
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }
}
