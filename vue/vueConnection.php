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
        <div class="page">Connection</div>
        <div class="title">Mastermind</div>
      </header>
      <br/>
      <br/>
      <div class="form">
      <form method="post" action="index.php">
        <input type="text" name="nom"  placeholder="Pseudo"/><br />
        <input type="password" name="mdp" placeholder="Mot De Passe"/><br />
        <input type="hidden" name="sendType" value="1">
        <input type="submit" name="connection" value="Connection"/>
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
      <h1>Connection</h1>
      <div class="erreur">
        <b>Echec de connection !</b><?php echo " ".$e ;?>
      </div>
      <br/>
      <br/>
      <form method="post" action="index.php">
        Entrer votre pseudo : <input type="text" name="nom"/><br />
        Entrer votre mot de passe : <input type="password" name="mdp"/><br />
        <input type="hidden" name="sendType" value="1">
        <input type="submit" name="connection" value="Envoyer"/>
      </form>
      <br/>
      <br/>
    </body>
    <?php
  }

}
