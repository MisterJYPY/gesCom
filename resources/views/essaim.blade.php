

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


Client::firstOrCreate(['nom'=>$nomclient,
'prenom'=>$prenom,
'email'=>'emailnull@g.com',
'adresse'=>$adresse,'contact'=>$contact,
'groupe'=>$groupe,
'etoile'=>$etoile,
'code'=>$code_aleatoire,
'user'=>$user]);

}
