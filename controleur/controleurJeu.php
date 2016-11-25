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
    $_SESSION['jeu']->joue($send);
    $this->actualisation();
  }

  function actualisation(){
    if($_SESSION['jeu']->gagne($_SESSION['jeu']->getLastHit()) == false){
      if($_SESSION['jeu']->getTentative() < 10){
        $this->vuePart->acceuil($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $this->bd->getStat(), $this->bd->getStatJoueur($_SESSION['pseudo']));
      } else {
        $msg = "Vous avez perdu";
        try {
          $this->bd->ajoutStat($_SESSION['pseudo'], 0, $_SESSION['jeu']->getTentative());
        } catch (MonException $e) {
          $msg = $msg."<br />".$e->afficher();
        }
        $this->vuePart->solution($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $_SESSION['jeu']->getRes(), 0, $msg, $this->bd->getStat(), $this->bd->getStatJoueur($_SESSION['pseudo']));
      }
    } else {
      $msg = "Vous avez reussi à gagner";
      try {
        $this->bd->ajoutStat($_SESSION['pseudo'], 1, $_SESSION['jeu']->getTentative());
      } catch (MonException $e) {
        $msg = $msg."<br />". $e->afficher();
      }
      $this->vuePart->solution($_SESSION['jeu']->getJeux(), $_SESSION['jeu']->getResPartie(), $_SESSION['jeu']->getTentative(), $_SESSION['jeu']->getRes(), 1, $msg, $this->bd->getStat(), $this->bd->getStatJoueur($_SESSION['pseudo']));
    }
  }

  function newGame(){
    $_SESSION['jeu'] = new Jeu();
    $this->actualisation();
  }

  function affichage(){
    if(isset($_SESSION['jeu'])){
      $this->actualisation();
    } else {
      $this->vuePart->acceuil(0,0,0,$this->bd->getStat(), $this->bd->getStatJoueur($_SESSION['pseudo']));
    }
  }
}
