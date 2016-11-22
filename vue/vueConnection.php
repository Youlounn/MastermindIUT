<?php
class VueConnection{


  function acceuil(){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <head>
      <style>
        <?php include 'style/acceuil.css'; ?>
      </style>
    </head>
    <body>
      <header>
        <div class="page">Connexion</div>
        <div class="title">Mastermind</div>
      </header>
      <div class="form">
      <form method="post" action="index.php">
        <input type="text" name="nom"  placeholder="Pseudo"/><br />
        <input type="password" name="mdp" placeholder="Mot De Passe"/><br />
        <input type="hidden" name="sendType" value="1">
        <input type="submit" name="connection" value="Connexion"/>
      </form>
      </div>
      <br/>
      <br/>
    </body>
    <?php
  }

  function echec($e){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <head>
      <style>
        <?php include 'style/acceuil.css'; ?>
      </style>
    </head>
    <body>
      <header>
        <div class="page">Erreur de connexion</div>
        <div class="title">Mastermind</div>
      </header>
      <br/>
      <br/>
      <div class="erreur">
        <b>Erreur ! </b>
        <?php echo $e ; ?>
      </div>
      <div class="form">
      <form method="post" action="index.php">
        <input type="text" name="nom"  placeholder="Pseudo"/><br />
        <input type="password" name="mdp" placeholder="Mot De Passe"/><br />
        <input type="hidden" name="sendType" value="1">
        <input type="submit" name="connection" value="Connexion"/>
      </form>
      </div>
      <br/>
      <br/>
    </body>
    <?php
  }

  function info($e){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <head>
      <style>
        <?php include 'style/acceuil.css'; ?>
      </style>
    </head>
    <body>
      <header>
        <div class="page">Information</div>
        <div class="title">Mastermind</div>
      </header>
      <br/>
      <br/>
      <div class="info">
        <b>Information : </b>
        <?php echo $e ; ?>
      </div>
      <div class="form">
      <form method="post" action="index.php">
        <input type="text" name="nom"  placeholder="Pseudo"/><br />
        <input type="password" name="mdp" placeholder="Mot De Passe"/><br />
        <input type="hidden" name="sendType" value="1">
        <input type="submit" name="connection" value="Connexion"/>
      </form>
      </div>
      <br/>
      <br/>
    </body>
    <?php
  }

}
