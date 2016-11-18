<?php
require __DIR__."/../modele/bd.php";
class ControleurConnection{

  private $bd;

  function __construct(){
    try {
      $this->bd = new Bd();
    } catch (MonException $e){
      return $e->afficher();
    }
  }

  function connection($nom,$mdp){
    $ret = false;
    try {
      $passBDD = $this->bd->getMdp($nom);
      if (crypt($mdp,$passBDD)==$passBDD) {
        $ret = "ok";
      }else {
        $ret = "Erreur dans pseudo ou mot de passe";
      }
    } catch (MonException $e) {
      $ret = $e->afficher();
    }
    return $ret;
  }

  function deco(){
    $ret = false;
    if(isset($_SESSION['pseudo'])){
      unset($_SESSION['pseudo']);
      $ret = true;
    }
    return $ret;
  }


}
