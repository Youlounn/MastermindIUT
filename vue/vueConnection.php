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

  function echec($e){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <body>
      <h1>Connection</h1>
      <b>Echec de connection !</b><?php echo " ".$e ;?>
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
