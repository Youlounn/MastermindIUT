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

  function joue($test){
    $res = array();
    $this->tentative += 1;
    $cpt = 0;
    foreach($test as $i){
      if($i == $this->solution[$cpt]){
        $verif = 1;
      } else if (in_array($i, $this->solution)){
        $verif = 2;
      } else {
        $verif = 3;
      }
      $cpy ++ ;
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

  function getTentative(){
    return $this->tentative;
  }

  function gagne($check){
    $res = false;
    if($check == array(1,1,1,1)){
      $res = true;
    }
    return $res;
  }

}
