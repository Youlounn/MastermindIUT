<?php
/*
Copyright Quentin Nivelais - Yohan Rialet

-- Correspondance : int -> couleur --
0 -> blanc
1 -> bleu
2 -> jaune
3 -> vert
4 -> rouge
5 -> orange
6 -> violet
7 -> fushia

-- Description des var --
solution -> La combinaison de reponse
tentative -> le nombre de tentative du joueur

-- Description des fonction --
joue = retourne les differente sortie possible sous forme de tableaux :


*/

class Jeu{

  private $tentative;
  private $solution;

  function __construct(){
    $this->solution = array(rand(0,7), rand(0,7), rand(0,7), rand(0,7));

    $this->tentative = 0;
  }

  /*
  $test = tableaux correspondant au couleur joué

  return un tableaux de taille 4 et de type int
    3 -> Le pions n'est pas bien positionné et la couleur n'apparait pas dans le resultat
    2 -> La couleur apparait mais le pions et mal positionné
    1 -> le bon est bien placé et bien positionné
  */
  function joue($test){
    $res = array();
    $this->tentative += 1;
    foreach($test as $i){
      if($i == $this->solution[0]){
        $verif = 1;
      } else if (in_array($i, $this->solution)){
        $verif = 2;
      } else {
        $verif = 3;
      }
      array_push($res, $verif);
    }
    return $res;
  }

  function fin(){
    $res = false;
    if($this->tentative >= 10){
      $res = true;
    }
    return $res;
  }

  /*
  $check = tableaux correspondant au int de retour de la fonction joue
  return vraie si il a gagné, faux sinon
  */
  function gagne($check){
    $res = false;
    if($check == array(1,1,1,1)){
      $res = true;
    }
    return $res;
  }

}
