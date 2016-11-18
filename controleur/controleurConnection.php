<?php
require __DIR__."/../modele/bd.php";
class ControleurConnection{

  private $bd;

  function __construct(){
    $this->bd = new Bd();
  }

  function connection($nom,$mdp){
    $ret = false;
    try {
      $passBDD = $this->bd->getMdp($nom);
    } catch (UserException $e) {
      $ret = $e;
    }
    if (crypt($mdp,$passBDD)==$passBDD) {
      $ret = "ok";
    }else {
      $ret = "Erreur dans pseudo ou mot de passe";
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
