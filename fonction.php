<?php 

      
function bonPhrase($texte)
{
    if(preg_match_all('#^[A-Z]{1}.+[.!?]$#',$texte))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function is_entier($n)
{ // pou voir si un carracter est un entier
      return ($n>0 || $n =='0');
}

      

function is_numeriq($chaine)
{ // fonction pour verifier si c du numerique
    $result = 1 ;
    if (isset($chaine)) 
    {
        for ($i=0; $i < taille_chaine($chaine); $i++) 
        { 
            if (is_entier($chaine[$i])!=1  ) 
            {
                $result = 0;
            }
        }
    }
    else
    {
        $result = 0;
    }
    return $result;
}

function is_Valide($chaine)
{  //  founction pour la valider u mots s'il contien que des lattre alphabetic
    for ($i=0; $i < taille_chaine($chaine); $i++) 
    { 
        if ( (!is_lower($chaine[$i])) && (!is_upper($chaine[$i])) ) 
        {
            return false;
        }
    }
    return true;
}
?>