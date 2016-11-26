<?php
require_once __DIR__."/../modele/bd.php";
require_once __DIR__."/../vue/vueConnexion.php";
class ControleurConnexion{

  private $bd;
  private $vueCo;


    /* Constructeur de la classe ControleurConnexion
    * Pré-condition :
    * Post-condition : Une vue connexion est créée ainsi qu'un objet de la classe Bd
    */
  function __construct(){
    $this->vueCo = new VueConnexion();
    try {
      $this->bd = new Bd();
    } catch (MonException $e){
      $this->vueCo->echec($e->afficher());
    }
  }

  /* Fonction qui vérifie des identifiants de connexion
  * Pré-condition :
  * Post-condition : Une vue connexion est créée ainsi qu'un objet de la classe Bd
  * Parameters : $nom le nom du joueur, $mdp le mot de passe du joueur
  */
  function connexion($nom,$mdp){
    $ret = false;
    try {
      $passBDD = $this->bd->getMdp($nom);
      if (crypt($mdp,$passBDD)==$passBDD) { //Connecion reussie
        $_SESSION['pseudo'] = $nom;
        $_POST['sendType'] = 3; //On demande l'affichage de la page de base
        echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
      } else {
          $this->vueCo->echec("Erreur dans le pseudo ou le mot de passe");
      }
    } catch (MonException $e) {
      $this->vueCo->echec($e->afficher());
    }
  }

  /* Méthode qui déconnecte un joueur
  * Pré-condition : Le joueur doit être connecté
  * Post-condition : La sesion est détruite
  */
  function deco(){
    if(isset($_SESSION['pseudo'])){
      unset($_SESSION['pseudo']);
      session_destroy();
    }
    $this->vueCo->acceuil();
  }

  /* Méthode affichant les informations sur la vue de connexion
  * Pré-condition : La vue est instanciée
  * Post-condition : affichage des informations
  */
  function information($info){
    $this->vueCo->info($info);
  }
}
