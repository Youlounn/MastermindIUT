<?php
session_start();
require "controleurConnection.php";
require "controleurJeu.php";
require __DIR__."/../vue/vueConnection.php";
require __DIR__."/../vue/vuePartie.php";
class Base{

  private $ctrlConnect;
  private $ctrlJeu;
  private $vueCo;
  private $vuePart;

  function __construct(){
    $this->ctrlConnect = new ControleurConnection();
    $this->ctrlJeu = new ControleurJeu();
    $this->vueCo = new VueConnection();
    $this->vuePart = new vuePartie();
  }

  function lancement(){
    if(isset($_POST['sendType'])){
      $sd = $_POST['sendType']; //Variable disans qu'elle formulaire est utilisé

      if($sd == 1){ //Si il sagit de la connection
        //Recuperation des pseudo et mdp
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        //tentative de connection
        if($this->ctrlConnect->connection($nom,$mdp) == "ok"){
          $_SESSION['pseudo'] = $nom;
          $this->vuePart->acceuil();
        } else { // Si echec on va a l'acceuil en affichant un message d'erreur
          $this->vueCo->echec($this->ctrlConnect->connection($nom,$mdp));
        }
      } else if($sd == 2){ //Si il sagit de la deconnection
        if($this->ctrlConnect->deco()){ //Deconnection
          $this->vueCo->acceuil();
        } else { //Si erreur de deconnection on retourne quand meme a l'acceuil avec un message d'erreur
          $this->vueCo->echec("Probleme de deconnection");
        }
      } else if($sd == 3){ //Si il sagit de l'envoi des pions en partie
        //On verifie que l'utilisateur est bien connecté
        if(isset($_SESSION['pseudo'])){
          $pseudo = $_SESSION['pseudo'];
          //On recupere les pions
          $p1 = $_POST['p1'];
          $p2 = $_POST['p2'];
          $p3 = $_POST['p3'];
          $p4 = $_POST['p4'];
          //On envoi les pions au controleur jeu et on recupere les bon ou mauvais pions
          $res = $this->ctrlJeu->verif($p1,$p2,$p3,$p4);
          //On init les var d'affichage
          //On trie le resultat
          foreach($res as $i){
            if($i == 3){//Si le pion est mal placé et n'appartient pas au resultat

            }
          }
        }
      }
    } else {
      if(!isset($_SESSION['pseudo'])){ //Si la var session pseudo n'existe pas on affiche l'acceuil
        $this->vueCo->acceuil();
      } else { //Si elle existe on affiche la vue en partie
        $this->vuePart->acceuil();
      }
    }
  }

}
