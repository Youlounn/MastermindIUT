<?php
require __DIR__."/../modele/jeu.php";
require __DIR__."/../vue/vuePartie.php";
class ControleurJeu {

  private $jeu;
  private $vuePart;

  function __construct(){
    $this->jeu = new Jeu();
    $this->vuePart = new vuePartie();
  }

  function verif($p1, $p2, $p3, $p4){
    $send = array($p1, $p2, $p3, $p4);
    return $this->jeu->joue($send);
  }

  function affichage(){
    $this->vuePart->acceuil();
  }


}
