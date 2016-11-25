<?php
require_once __DIR__."/../modele/jeu.php";
require_once __DIR__."/../modele/bd.php";
require_once __DIR__."/../vue/vuePartie.php";

if(!isset($_SESSION)){
  session_start();
}

class ControleurJeu {

  private $jeu;
  private $bd;
  private $vuePart;

  function __construct($new=false){
    $this->vuePart = new vuePartie();
    if(!isset($_SESSION['jeu']) || $_SESSION['jeu'] == null){
      $_SESSION['jeu'] = new Jeu();
    }
    try {
      $this->bd = new Bd();
    } catch (MonException $e){
      $this->vuePart->solution(0,0,0,0, $e->afficher());
    }
  }

  function jeu($p1, $p2, $p3, $p4){
    $send = array($p1, $p2, $p3, $p4);
    $test = $_SESSION['jeu']->joue($send);
    if($_SESSION['jeu']->gagne($test) == false){
      if($_SESSION['jeu']->getTentative() < 10){
        $this->vuePart->acceuil($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $this->bd->getStat());
        var_dump($_SESSION['jeu']->getRes());
      } else {
        $msg = "Vous avez perdue";
        try {
          $this->bd->ajoutStat($_SESSION['pseudo'], false, $_SESSION['jeu']->getTentative());
        } catch (MonException $e) {
          $msg += $e->afficher();
        }
        $this->vuePart->solution($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $_SESSION['jeu']->getRes(), 0, $msg, $this->bd->getStat());
      }
  } else {
    $msg = "Vous avez reussi a gagné";
    try {
      $this->bd->ajoutStat($_SESSION['pseudo'], true, $_SESSION['jeu']->getTentative());
    } catch (MonException $e) {
      $msg += $e->afficher();
    }
    $this->vuePart->solution($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $_SESSION['jeu']->getRes(), 1, $msg, $this->bd->getStat());
  }
}

function newGame(){
  $_SESSION['jeu'] = new Jeu();
  $this->vuePart->acceuil(0,0,0);
}

function affichage(){
  if(isset($_SESSION['jeu'])){
    $this->vuePart->acceuil($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $this->bd->getStat());
  } else {
    $this->vuePart->acceuil(0,0,0);
  }
}
}
