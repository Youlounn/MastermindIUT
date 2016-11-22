<?php
require_once __DIR__."/../modele/jeu.php";
require_once __DIR__."/../vue/vuePartie.php";

if(!isset($_SESSION)){
    session_start();
}

class ControleurJeu {

  private $jeu;
  private $vuePart;

  function __construct($new=false){
    if(!isset($_SESSION['jeu']) || $_SESSION['jeu'] == null){
      $_SESSION['jeu'] = new Jeu();
    }
    $this->vuePart = new vuePartie();
  }

  function jeu($p1, $p2, $p3, $p4){
    $send = array($p1, $p2, $p3, $p4);
    $test = $_SESSION['jeu']->joue($send);
    if($_SESSION['jeu']->gagne($test) == false){
      if($_SESSION['jeu']->getTentative() <= 10){
        $this->vuePart->acceuil($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative());
        var_dump($_SESSION['jeu']->getRes());
      } else {
        echo "Trop de tentative";
      }
    } else {
      echo "Ta gagné PD";
    }
  }

  function affichage(){
    //$this->jeu->getRes();
    $this->vuePart->acceuil(0,0,0);
  }
}
