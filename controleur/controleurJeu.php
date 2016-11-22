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
    if(!isset($_SESSION['jeu']) || $_SESSION['jeu'] == null){
      $_SESSION['jeu'] = new Jeu();
    }
    try {
      $this->bd = new Bd();
    } catch (MonException $e){
      return $e->afficher();
    }
    $this->vuePart = new vuePartie();
  }

  function jeu($p1, $p2, $p3, $p4){
    $send = array($p1, $p2, $p3, $p4);
    $test = $_SESSION['jeu']->joue($send);
    if($_SESSION['jeu']->gagne($test) == false){
      if($_SESSION['jeu']->getTentative() < 10){
        $this->vuePart->acceuil($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative());
        var_dump($_SESSION['jeu']->getRes());
      } else {
        $this->vuePart->solution($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $_SESSION['jeu']->getRes(), 0);
      }
    } else {
      $this->vuePart->solution($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $_SESSION['jeu']->getRes(), 1);
    }
  }

  function newGame(){
    $_SESSION['jeu'] = new Jeu();
    $this->vuePart->acceuil(0,0,0);
  }

  function affichage(){
    //$this->jeu->getRes();
    $this->vuePart->acceuil(0,0,0);
  }
}
