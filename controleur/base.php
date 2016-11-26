<?php
require "controleurConnexion.php";
require "controleurJeu.php";
if(!isset($_SESSION)){
    session_start();
}
class Base{

  private $ctrlConnect;
  private $ctrlJeu;

  /* Constructeur de la classe Base
  * Pré-condition :
  * Post-condition : Deux controleurs sont créés
  */
  function __construct(){
    $this->ctrlConnect = new ControleurConnexion();
    $this->ctrlJeu = new ControleurJeu();
  }

  /* Méthode permettant de lancer chaque controleur en fonction de ce qui est demandé
  * Pré-condition : L'envoi d'un formulaires
  * Post-condition : Appel d'une fonction d'un controleur en fonction du formulaire
  */
  function lancement(){
    if(isset($_POST['sendType'])){ //Si la variable de formulaire est presente
      $sd = $_POST['sendType'];

      if($sd == 1){ //Si le formulaire est le premier (connexion)
        //Recuperation des pseudo et mdp
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        //Envoi des information pour la connexion
        $this->ctrlConnect->connexion($nom,$mdp);
      } else if($sd == 2) { //Si le formulaire est le deuxieme (deconnexion)
        $this->ctrlConnect->deco();
      } else if($sd == 3) { //Si le formulaire est le 3eme (Affichage de la partie)
        $this->ctrlJeu->affichage();
      } else if($sd == 4) { //Si les formulaire est le 4eme (envoi d'une partie)
        $this->ctrlJeu->jeu($_POST['pion1'], $_POST['pion2'], $_POST['pion3'], $_POST['pion4']);
      } else if($sd == 5){ //Si le formulaire est le 5eme (rejoué)
        $this->ctrlJeu->newGame();
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
