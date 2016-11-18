<?php
require __DIR__."/../modele/jeu.php";
class ControleurJeu{

  private $jeu;

  function __construct(){
    $this->jeu = new Jeu();
  }


}
