<?php
class VuePartie{

//L'utilisateur est connecté, l'acceuil du jeu est affiché
  function acceuil(){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <head>
      <style>
        <?php include 'style/general.css'; ?>
      </style>
    <body>
      <h1>Bonne chance !</h1>
      <div id="jeu">
          <table id="result">
            <tr>
              <td>Pion à trouver 1</td>
              <td>Pion à trouver 2</td>
              <td>Pion à trouver 3</td>
              <td>Pion à trouver 4</td>
            </tr>
          </table>
          <table id="plateau">
            <thead>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
            </thead>
            <tbody>
              <tr>
                <td>Essai10</td>
                <td>Essai10</td>
                <td>Essai10</td>
                <td>Essai10</td>
              </tr>
              <tr>
                <td>Essai9</td>
                <td>Essai9</td>
                <td>Essai9</td>
                <td>Essai9</td>
              </tr>
              <tr>
                <td>Essai8</td>
                <td>Essai8</td>
                <td>Essai8</td>
                <td>Essai8</td>
              </tr>
              <tr>
                <td>Essai7</td>
                <td>Essai7</td>
                <td>Essai7</td>
                <td>Essai7</td>
              </tr>
              <tr>
                <td>Essai6</td>
                <td>Essai6</td>
                <td>Essai6</td>
                <td>Essai6</td>
              </tr>
              <tr>
                <td>Essai5</td>
                <td>Essai5</td>
                <td>Essai5</td>
                <td>Essai5</td>
              </tr>
              <tr>
                <td>Essai4</td>
                <td>Essai4</td>
                <td>Essai4</td>
                <td>Essai4</td>
              </tr>
              <tr>
                <td>Essai3</td>
                <td>Essai3</td>
                <td>Essai3</td>
                <td>Essai3</td>
              </tr>
              <tr>
                <td>Essai2</td>
                <td>Essai2</td>
                <td>Essai2</td>
                <td>Essai2</td>
              </tr>
              <tr>
                <td>Essai1</td>
                <td>Essai1</td>
                <td>Essai1</td>
                <td>Essai1</td>
              </tr>
            </tbody>
          </table>
          <table id="form">
            <tr>
              <td>Tentative pion 1</td>
              <td>Tentative pion 2</td>
              <td>Tentative pion 3</td>
              <td>Tentative pion 4</td>
            </tr>
          </table>
          test
          <form method="post" action="index.php">
            <input type="hidden" name="sendType" value="2" />
            <input type="submit" value="Deconnection" />
          </form>
      <div>
    </body>
    <?php
  }

}
