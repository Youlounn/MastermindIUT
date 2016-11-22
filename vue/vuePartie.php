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
    </head>
    <body>
      <header>
        <div class="page">Jeu</div>
        <div class="title">Mastermind</div>
      </header>
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
              <td>result</td>
            </thead>
            <tbody>
              <tr>
                <td>Essai10</td>
                <td>Essai10</td>
                <td>Essai10</td>
                <td>Essai10</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai9</td>
                <td>Essai9</td>
                <td>Essai9</td>
                <td>Essai9</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai8</td>
                <td>Essai8</td>
                <td>Essai8</td>
                <td>Essai8</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai7</td>
                <td>Essai7</td>
                <td>Essai7</td>
                <td>Essai7</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai6</td>
                <td>Essai6</td>
                <td>Essai6</td>
                <td>Essai6</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai5</td>
                <td>Essai5</td>
                <td>Essai5</td>
                <td>Essai5</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai4</td>
                <td>Essai4</td>
                <td>Essai4</td>
                <td>Essai4</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai3</td>
                <td>Essai3</td>
                <td>Essai3</td>
                <td>Essai3</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai2</td>
                <td>Essai2</td>
                <td>Essai2</td>
                <td>Essai2</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>Essai1</td>
                <td>Essai1</td>
                <td>Essai1</td>
                <td>Essai1</td>
                <td>
                  <table>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <table id="form">
            <form method="POST" action="index.php">
            <tr>
              <td><input type="number" name="pion1" value="0"/></td>
              <td><input type="number" name="pion2" value="1"/></td>
              <td><input type="number" name="pion3" value="2"/></td>
              <td><input type="number" name="pion4" value="3"/></td>
              <td>
                <input type="hidden" name="sendType" value="4"  />
                <input type="submit" value="Valider" />
              </td>
            </tr>
            </form>
          </table>
          <table id="colors">
            <tr>
              <td class="a"></td>
              <td class="b"></td>
              <td class="c"></td>
              <td class="d"></td>
              <td class="e"></td>
              <td class="f"></td>
              <td class="g"></td>
              <td class="h"></td>
            </tr>
          </table>
          <form method="post" action="index.php">
            <input type="hidden" name="sendType" value="2" />
            <input  id="deco" type="submit" value="Deconnection" />
          </form>
      <div>
    </body>
    <?php
  }

  function acceuilBis($partie, $result, $tentative){
    header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <head>
      <style>
        <?php include 'style/general.css'; ?>
      </style>
    </head>
    <body>
      <header>
        <div class="page">Jeu</div>
        <div class="title">Mastermind</div>
      </header>
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
              <td>Essaie</td>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>result</td>
            </thead>
            <tbody>
              <tr>
                <?php
              $cpt = 0;
              while($cpt < $tentative){
                $tmp = $cpt +1;
                echo "<td>N°".$tmp."</td>";
                foreach($partie[$cpt] as $essai){
                  if($essai == 0){
                    ?> <td class='h'></td> <?php
                  } else if($essai == 1){
                    ?> <td class='a'></td> <?php
                  } else if($essai == 2){
                    ?> <td class='d'></td> <?php
                  } else if($essai == 3){
                    ?> <td class='c'></td> <?php
                  } else if($essai == 4){
                    ?> <td class='b'></td> <?php
                  } else if($essai == 5){
                    ?> <td class='g'></td> <?php
                  } else if($essai == 6){
                    ?> <td class='f'></td> <?php
                  } else if($essai == 7){
                    ?> <td class='e'></td> <?php
                  }
                }

                ?> <td><table><tr> <?php
                foreach($result[$cpt] as $res){
                  if($res == 1){
                    ?> <td class='black'></td> <?php
                  } else if($res == 2){
                    ?> <td class='white'></td> <?php
                  } else {
                    ?> <td></td> <?php
                  }
                }
                ?> </tr></table></td></tr> <?php

                $cpt ++;
              }

              ?>
            </tbody>
          </table>
          <table id="form">
            <form method="POST" action="index.php">
            <tr>
              <td><input type="number" name="pion1" value="0"/></td>
              <td><input type="number" name="pion2" value="1"/></td>
              <td><input type="number" name="pion3" value="2"/></td>
              <td><input type="number" name="pion4" value="3"/></td>
              <td>
                <input type="hidden" name="sendType" value="4"  />
                <input type="submit" value="Valider" />
              </td>
            </tr>
            </form>
          </table>
          <table id="colors">
            <tr>
              <td class="a"></td>
              <td class="b"></td>
              <td class="c"></td>
              <td class="d"></td>
              <td class="e"></td>
              <td class="f"></td>
              <td class="g"></td>
              <td class="h"></td>
            </tr>
          </table>

          <form method="post" action="index.php">
            <input type="hidden" name="sendType" value="2" />
            <input id="deco" type="submit" value="Deconnection" />
          </form>
      <div>
    </body>
    <?php
  }

}
