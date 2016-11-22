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

  function jeu($p1, $p2, $p3, $p4){
    $send = array($p1, $p2, $p3, $p4);
    var_dump($this->jeu->joue($send));
    $this->vuePart->acceuil();
  }

  function affichage(){
    //$this->jeu->getRes();
    $this->vuePart->acceuil();
  }


}
