<?php


$toto=crypt('toto');
echo $toto."<br/>";

$titi=crypt('titi');
echo $titi."<br/>";

// il faut que la fonction crypt() connaisse la méthode de cryptage et le "sel" à utiliser.
//Il faut que ce soit les mêmes que ce qui a été utilisé lors du cryptage.
// ces 2 informations sont stockées au début de la chaîne de caractères résultant du cryptage
//C'est pour cette raison que l'on passe $toto comme 2ème paramètre.
// voir documentation php

if (crypt('toto', $toto)== $toto) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}

//$6$RTRffX4m9FBU$GQPzOIuRByEJMeT8r9fydj8eKfi7yurb0SQiT./3pHnG5ni2f96gboxLE4LZgCgEVMWMP6z.AxaOM8KaWJCmn0 -> toto
//$6$VsDCW/kqInRv$/bkDT4rmkNLGo704srZE1riI4u7IUUcSuuEqrdkeBJ.3RcsnEO.ihAnWvIWJ0fSoP3hVa/OpWTbhi50xQhzEk1 -> titi

?>
