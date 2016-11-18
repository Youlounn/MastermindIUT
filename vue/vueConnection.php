<?php
class VueConnection{


  function acceuil(){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <body>
      <h1>Connection</h1>
      <br/>
      <br/>
      <div class="form">
      <form method="post" action="index.php">
        Entrer votre pseudo : <input type="text" name="nom"/><br />
        Entrer votre mot de passe : <input type="password" name="mdp"/><br />
        <input type="hidden" name="sendType" value="1">
        <input type="submit" name="connection" value="Envoyer"/>
      </form>
      </div>
      <br/>
      <br/>
    </body>
    <?php
  }

  function reussie(){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <body>
      <h1>Connection</h1>
      <br/>
      <br/>
        <div class="succes">
          <h3>Connection reussie <?php echo $_SESSION['pseudo']; ?></h3>
        </div>
        <form method="post" action="index.php">
          <input type="hidden" name="sendType" value="2">
          <input type="submit" name="deco" value="Deconnection"/>
        </form>
      <br/>
      <br/>
    </body>
    <?php
  }

  function echec($e){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <body>
      <h1>Connection</h1>
      <div class="erreur"><b>Echec de connection !</b><?php echo " ".$e ;?></div>
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
