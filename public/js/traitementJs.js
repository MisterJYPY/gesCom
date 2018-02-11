function is_int(value){
       if((parseFloat(value)==parseInt(value)) && !isNaN(value)){
           return true;
       }
       else{
           return false;
       }
   }
   function verifierContact(valeur,element)
   {
	   if(valeur.length>0)
	   {
	     if(!is_int(valeur))
		 {
	        var taille=valeur.length;
			var newValue=valeur.substr(0,taille-1); 
			document.getElementById(element).value=newValue;
		 }
	   }
	   
   }
   