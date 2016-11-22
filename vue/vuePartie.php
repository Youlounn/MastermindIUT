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
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>result</td>
            </thead>
            <tbody>
              <?php
              $cpt = 0;
              echo "<tr>";
              while($cpt <= $tentative){
                foreach($partie[$cpt] as $essai){
                  if($essai == 0){
                    echo "<td class='h'></td>";
                  } else if($essai == 1){
                    echo "<td class='a'></td>";
                  } else if($essai == 2){
                    echo "<td class='d'></td>";
                  } else if($essai == 3){
                    echo "<td class='c'></td>";
                  } else if($essai == 4){
                    echo "<td class='b'></td>";
                  } else if($essai == 5){
                    echo "<td class='g'></td>";
                  } else if($essai == 6){
                    echo "<td class='f'></td>";
                  } else if($essai == 7){
                    echo "<td class='e'></td>";
                  }
                }

                echo "<td><table><tr>";
                foreach($result[$cpt] as $res){
                  if($res == 1){
                    echo "<td class='black'></td>";
                  } else if($res == 2){
                    echo "<td class='white'></td>";
                  } else {
                    echo "<td></td>";
                  }
                }

                $cpt ++;
              }
              echo "</td></table></tr>";

              ?>
            </tbody>
          </table>
          <table id="form">
            <form method="POST" action="index.php">
            <tr>
              <td><input type="button" name="pion1" value="0"/></td>
              <td><input type="button" name="pion2" value="1"/></td>
              <td><input type="button" name="pion3" value="2"/></td>
              <td><input type="button" name="pion4" value="3"/></td>
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
