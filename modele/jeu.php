<?php
/*
Copyright Quentin Nivelais - Yohann Rialet

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
  private $lastHit;
  private $historyGame;
  private $historyRes;

  /* Constructeur de la classe jeu
  * Pré-condition :
  * Post-condition : Un nouveau jeu est créé, une solution est tirée au sort, le nombre de tentative est à 0
  */
  function __construct(){
    $this->solution = array(rand(0,7), rand(0,7), rand(0,7), rand(0,7));
    $this->history = array();

    $this->tentative = 0;
  }

  /* Fonction appelée pour lancer une nouvelle partie du jeu
  * Pré-condition : $test doit être un tableau contenant 4 valeurs
  * Post-condition : Un nouveau tour de jeu est créé
  * Parameters : $test : tableau contenant la proposition du joueur
  * Return : $res : le resultat en fonction de cette proposition
  */
  function joue($test){
    $res = array();
    $cpt = 0;
    $bloqued = array();
    $tmp = $this->solution;
    foreach($test as $i){
      if($i == $tmp[$cpt]){
        $verif = 1;
        $tmp[$cpt] = -1;
      } else if (in_array($i, $tmp)){
        if(in_array($i, $bloqued)){
          $verif = 3;
        } else {
          $verif = 2;
          array_push($bloqued, $i);
        }
      } else {
        $verif = 3;
      }
      $cpt ++ ;
      array_push($res, $verif);
    }
    $this->historyRes[$this->tentative] = $res;
    $this->historyGame[$this->tentative] = $test;
    $this->tentative += 1;
    $this->lastHit = $res;
    return $res;
  }

  /* Fonction appelée pour récuperer l'attribut lastHit
  * Pré-condition : $lastHit doit exister
  * Post-condition : le dernier resultat du joueur
  * Return : $this->lastHit : le dernier resultat du joueur
  */
  function getLastHit(){
    return $this->lastHit;
  }

  /* Fonction appelée pour vérifier si la partie est finie
  * Pré-condition : $tentative doit exister
  * Post-condition : vrai si la partie est finie, faux sinon
  * Return : $this->lastHit : le dernier resultat du joueur
  */
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

  function getJeux(){
    return $this->historyGame;
  }

  function getResPartie(){
    return $this->historyRes;
  }

  function getRes(){
    return $this->solution;
  }

  /* Fonction appelée pour vérifier si la partie est gagnée
  * Pré-condition : $check doit être un tableau de 4 entiers
  * Post-condition : vrai si la partie est gagnée, faux sinon
  * Return : $res : le booléen de si la partie est gagnée ou pas
  */
  function gagne($check){
    $res = false;
    if($check == array(1,1,1,1)){
      $res = true;
    }
    return $res;
  }

}
