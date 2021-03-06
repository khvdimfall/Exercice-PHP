<?php
class Validator {
    
    private $errors=[];

    public function getErrors(){
           return $this->errors;
    }

    public function is_valid(){
       return count($this->errors)===0;
    }


    public function  is_empty($nbre,$key,$sms=null){
        if(empty($nbre)){
            if($sms==null){
                $sms="Le Nombre  est Obligatoire";
            }
            $this->errors[$key]= $sms;
    
            }//$errors['longueur']="Le nombre est vide" => count($errors)=1
        }

 // Longueur et Largueur doivent etre numeric(entier,reel)
 public function is_number($nombre,$key,$errorMessage="Veuiller saisir un nombre"){
    $this->is_empty($nombre,$key);
    if($this->is_valid() || !(isset($this->errors[$key])) ){
        if(!is_numeric($nombre)){
        $this->errors[$key]= $errorMessage;
         }
}
}

/*
  Longueur positif
  Largeur positif
*/
public function is_positif($nombre,$key,$errorMessage="Veuiller saisir un nombre positif"){
                   $this->is_number($nombre,$key);
                   if($this->is_valid() || !(isset($this->errors[$key])) ){
                      if($nombre<=0){
                        $this->errors[$key]= $errorMessage;
                      }
             }
                   
}

/**
*   Longueur> Largeur
*/
//compare()
//Nbre1 =>plus grand
//Nbre2 =>plus petit
public function compare($nbre1,$nbre2,$key1,$key2,$errorMessage="Longueur doit superieur à la Largeur"){

           if($nbre1<=$nbre2){
              $this->errors['all']=$errorMessage;
           }
   

}


//Expressions Régulières
    public function  is_email($valeur,$key,$sms=null){
    
    }

    //9chiffres , commence par 77,78,75,76,70
    public function  is_telephone($valeur,$key,$sms=null){
    
    }





}



?>