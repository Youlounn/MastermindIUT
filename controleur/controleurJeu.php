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
      $this->vuePart->solution(0,0,0,0, $e->afficher());
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
        $this->vuePart->solution($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $_SESSION['jeu']->getRes(), 0, "Vous avez perdue");
        $this->bd->ajoutStat($_SESSION['pseudo'], false, $_SESSION['jeu']->getTentative());
      }
    } else {
      $this->vuePart->solution($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $_SESSION['jeu']->getRes(), 1, "Vous avez reussi a gagné");
      $this->bd->ajoutStat($_SESSION['pseudo'], true, $_SESSION['jeu']->getTentative());
    }
  }

  function newGame(){
    $_SESSION['jeu'] = new Jeu();
    $this->vuePart->acceuil(0,0,0);
  }

  function affichage(){
    if(isset($_SESSION['jeu'])){
        $this->vuePart->acceuil($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative());
      } else {
      $this->vuePart->acceuil(0,0,0);
    }
  }
}
