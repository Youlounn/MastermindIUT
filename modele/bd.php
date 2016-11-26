<?php

/**
 *
 */
 // Classe generale de definition d'exception
 class MonException extends Exception{
   private $chaine;
   public function __construct($chaine){
     $this->chaine=$chaine;
   }

   public function afficher(){ return $this->chaine; }

 }


 // Exception relative à un probleme de connexion
 class ConnexionException extends MonException{}

 // Exception relative à un probleme d'accès à une table
 class TableAccesException extends MonException{}

 // User doesnt exist in table
 class UserException extends MonException{}


 // Classe qui gère les accès à la base de données

 class Bd{
 private $connexion;

 /* Constructeur de la classe
 * Pré-condition : Présence d'une base de données
 * Post-condition : La connexion a été établie
 *
 */
   public function __construct(){
    try{
        $chaine="mysql:host=localhost;dbname=mastermind";
        $this->connexion = new PDO($chaine,"root","");
       $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }
     catch(PDOException $e){
       $exception=new ConnexionException("problème de connexion à la base");
       throw $exception;
     }
   }




   /* Méthode permettant de se déconnecter
   * Pré-condition : Présence d'une connexion
   * Post-condition : La connexion a été éteinte
   *
   */
 public function deconnexion(){ $this->connexion=null; }


 /* Méthode permettant de récuperer tous les joueurs
 * Pré-condition : Présence d'une base de données et d'une table joueur avec comme attribut "pseudo"
 * Post-condition :
 * Return : $result : la liste des joueurs
 *
 */

 public function getJoueur(){
  try{

    $statement=$this->connexion->query("SELECT pseudo from joueurs;");

     while($ligne=$statement->fetch()){
        $result[] = $ligne['pseudo'];
      }
     return($result);

   } catch(PDOException $e){
     throw new TableAccesException("problème avec la table pseudonyme");
   }
 }

 /* Méthode permettant de récuperer le mot de passe d'un joueur
 * Pré-condition : Présence d'une base de données et d'une table joueur avec comme attributs "pseudo" et "motDePasse"
 * Post-condition : le mot de passe du joueur s'il existe
 * Return : $mdp : le mot de passe du joueur
 *
 */
 public function getMdp($joueur){
    try{

    $statement=$this->connexion->query("SELECT motDePasse FROM joueurs WHERE pseudo=\"".$joueur."\";");

     while($ligne = $statement->fetch()){
       $mdp=$ligne['motDePasse'];
     }
     if (!isset($mdp)) {
        throw new UserException("Erreur dans pseudo ou mot de passe");
     }
     return $mdp;

   } catch(PDOException $e){
     throw new TableAccesException("Problème avec la table Pseudonyme");
   }
 }

 /* Méthode permettant d'ajouter les statistiques
 * Pré-condition : Présence d'une base de données et d'une table parties avec comme attributs "pseudo", "nombreCoups" et "patieGagnee"
 * Post-condition : Une ligne a été insérée
 *
 */
 public function ajoutStat($joueur, $gagner, $nbcoups){
   try{
     $stmt=$this->connexion->query("INSERT INTO parties(pseudo,partieGagnee,nombreCoups) VALUE ('".$joueur."',".$gagner.",".$nbcoups.")");
   }
   catch(PDOException $e){
     throw new TableAccesException("Erreur avec la table partie");
   }
 }

 /* Méthode permettant de récupérer les statistiques
 * Pré-condition : Présence d'une base de données et d'une table parties avec comme attributs "pseudo", "nombreCoups" et "patieGagnee"
 * Post-condition : Affichage des statistiques
 * Return : $res : pseudo et nombreCoups FROM parties
 *
 */
 public function getStat() {
   $res = array();
   try {
     $stmt=$this->connexion->query("SELECT pseudo, nombreCoups FROM parties ORDER BY nombreCoups limit 5");
     $res = $stmt->fetchAll();
   } catch(PDOException $e) {
     throw new TableAccesException("Erreur avec la table partie lors de la recuperation des meilleur score");
   }
   return $res;
 }

 /* Méthode permettant de récupérer les statistiques d'un joueur ciblé
 * Pré-condition : Présence d'une base de données et d'une table parties avec comme attributs "pseudo", "nombreCoups" et "patieGagnee"
 *                 Présence du joueur
 * Post-condition : Affichage de ses statistiques
 * Return : $res : pseudo partieGagnee et nombreCoups FROM parties du joueur
 *
 */
 public function getStatJoueur($joueur) {
   $res = array();
   try {
       $stmt=$this->connexion->query("SELECT * FROM parties WHERE pseudo = '".$joueur."' ;");
       $res = $stmt->fetchAll();
   } catch(PDOException $e) {
     throw new TableAccesException("Erreur avec la table partie lors de la recuperation des statistiques du joueur");
   }
   return $res;
 }

}

?>
