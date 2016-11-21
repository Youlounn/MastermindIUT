<?php
require __DIR__."/../modele/jeu.php";
class ControleurJeu{

  private $jeu;

  function __construct(){
    $this->jeu = new Jeu();
  }

  function verif($p1, $p2, $p3, $p4){
    $send = array($p1, $p2, $p3, $p4);
    return $this->jeu->joue($send);
  }


}
