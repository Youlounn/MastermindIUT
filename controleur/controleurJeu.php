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

  /* Constructeur de la classe ControleurJeu
  * Pré-condition : La session doit être active
  * Post-condition : Une vue partie est créée ainsi qu'un objet Jeu puis un objet de la classe Bd
  */
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

  /* Fonction appelée pour lancer le jeu
  * Pré-condition : La session doit être active
  * Post-condition : La proposition est envoyée au jeu, la fonction actualisation de cette classe est appelée
  * Parameters : $p1 le pion 1, $p2 le pion 2, $p3 le pion 3, $p4 le pion 4
  */
  function jeu($p1, $p2, $p3, $p4){
    $send = array($p1, $p2, $p3, $p4);
    $_SESSION['jeu']->joue($send);
    $this->actualisation();
  }

  /* Fonction appelée pour actualiser la vue
  * Pré-condition : La session doit être active
  * Post-condition : La vue est modifiée en fonction du résultat du joueur
  */
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

  /* Fonction appelée pour lancer une nouvelle partie du jeu
  * Pré-condition : La session doit être active
  * Post-condition : Un nouveau jeu est créé, la fonction actualisation de cette classe est appelée
  */
  function newGame(){
    $_SESSION['jeu'] = new Jeu();
    $this->actualisation();
  }

  /* Fonction appelée pour lancer l'affichage du jeu
  * Pré-condition :
  * Post-condition : La fonction actualisation de cette classe est appelée si une session est présente sinon elle rétablit tout commme à l'origine de la partie
  */
  function affichage(){
    if(isset($_SESSION['jeu'])){
      $this->actualisation();
    } else {
      $this->vuePart->acceuil(0,0,0,$this->bd->getStat(), $this->bd->getStatJoueur($_SESSION['pseudo']));
    }
  }
}
