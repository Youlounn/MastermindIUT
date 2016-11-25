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

 // Constructeur de la classe
 // remplacer X par les informations qui vous concernent

   public function __construct(){
    try{
        $chaine="mysql:host=localhost;dbname=projetWebServeur";
        $this->connexion = new PDO($chaine,"root","");
       $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }
     catch(PDOException $e){
       $exception=new ConnexionException("problème de connexion à la base");
       throw $exception;
     }
   }




 // A développer
 // méthode qui permet de se deconnecter de la base
 public function deconnexion(){ $this->connexion=null; }


 //A développer
 // utiliser une requête classique
 // méthode qui permet de récupérer les pseudos dans la table pseudo
 // post-condition:
 //retourne un tableau à une dimension qui contient les pseudos.
 // si un problème est rencontré, une exception de type TableAccesException est levée

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

 public function ajoutStat($joueur, $gagner, $nbcoups){
   try{
     $stmt=$this->connexion->query("INSERT INTO parties(pseudo,partieGagnee,nombreCoups) VALUE ('".$joueur."',".$gagner.",".$nbcoups.")");
   }
   catch(PDOException $e){
     throw new TableAccessException("Erreur avec la table partie");
   }
 }

 public function getStat() {
   $res = array();
   try {
     $stmt=$this->connexion->prepare("SELECT pseudo, nombreCoups FROM parties ORDER BY nombreCoups limit 5");
     $stmt->execute();
     $res = $stmt->fetchAll();
   } catch(PDOException $e) {
     throw new TableAccessException("Erreur avec la table partie");
   }
   return $res;
 }

}

?>
