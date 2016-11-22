<?php
session_start();
require "controleurConnection.php";
require "controleurJeu.php";
class Base{

  private $ctrlConnect;
  private $ctrlJeu;

  function __construct(){
    $this->ctrlConnect = new ControleurConnection();
    $this->ctrlJeu = new ControleurJeu();
  }

  function lancement(){
    if(isset($_POST['sendType'])){ //Si la variable de formulaire est presente
      $sd = $_POST['sendType'];

      if($sd == 1){ //Si le formulaire est le premier (connection)
        //Recuperation des pseudo et mdp
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        //Envoi des information pour la connection
        $this->ctrlConnect->connection($nom,$mdp);
      } else if($sd == 2) { //Si le formulaire est le deuxieme (deconnection)
        $this->ctrlConnect->deco();
      } else if($sd == 3) { //Si le formulaire est le 3eme (Affichage de la partie)
        $this->ctrlJeu->affichage();
      } else if($sd == 4) { //Si les formulaire est le 4eme (envoi d'une partie)
        $this->ctrlJeu->jeu($_POST['pion1'], $_POST['pion2'], $_POST['pion3'], $_POST['pion4']);
      }
    } else { //Si aucun formulaire n'est renseigné
      if(!isset($_SESSION['pseudo'])){ //Si l'utilisateur n'existe pas
        $this->ctrlConnect->information("Utilisateur non connecté");
      } else { //Si l'utilisateur existe
        $this->ctrlJeu->affichage();
      }
    }
  }

}
