<?php
session_start();
require "controleurConnection.php";
require "controleurJeu.php";
require __DIR__."/../vue/vueConnection.php";
class Base{

  private $ctrlConnect;
  private $ctrlJeu;
  private $vueCo;

  function __construct(){
    $this->ctrlConnect = new ControleurConnection();
    $this->ctrlJeu = new ControleurJeu();
    $this->vueCo = new VueConnection();
  }

  function lancement(){
    if(isset($_POST['sendType'])){
      $sd = $_POST['sendType'];

      //Formulaire de connection
      if($sd == 1){
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        if($this->ctrlConnect->connection($nom,$mdp) == "ok"){
          $_SESSION['pseudo'] = $nom;
          $this->vueCo->reussie();
        } else {
          $this->vueCo->echec($this->ctrlConnect->connection($nom,$mdp));
        }
      } else if($sd == 2){
        if($this->ctrlConnect->deco()){
          $this->vueCo->acceuil();
        } else {
          $this->vueCo->echec("Probleme de deconnection");
        }
      }
    } else {
      if(!isset($_SESSION['pseudo'])){
        $this->vueCo->acceuil();
      } else {
        $this->vueCo->reussie();
      }
    }
  }

}
