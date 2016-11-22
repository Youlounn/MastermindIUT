<?php
require_once __DIR__."/../modele/bd.php";
require_once __DIR__."/../vue/vueConnection.php";
class ControleurConnection{

  private $bd;
  private $vueCo;

  function __construct(){
    $this->vueCo = new VueConnection();
    try {
      $this->bd = new Bd();
    } catch (MonException $e){
      $this->vueCo->echec($e->afficher());
    }
  }

  //Connection
  function connection($nom,$mdp){
    $ret = false;
    try {
      $passBDD = $this->bd->getMdp($nom);
      if (crypt($mdp,$passBDD)==$passBDD) { //Connecion reussie
        $_SESSION['pseudo'] = $nom;
        $_POST['sendType'] = 3; //On demende l'affichage de la page de base
        echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
      } else {
          $this->vueCo->echec("Erreur dans pseudo ou mot de passe");
      }
    } catch (MonException $e) {
      $this->vueCo->echec($e->afficher());
    }
  }

  function deco(){
    if(isset($_SESSION['pseudo'])){
      unset($_SESSION['pseudo']);
      session_destroy();
    }
    $this->vueCo->acceuil();
  }

  function information($info){
    $this->vueCo->info($info);
  }
}
