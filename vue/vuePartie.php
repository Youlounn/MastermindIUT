<?php
class VuePartie{

  //L'utilisateur est connecté, l'acceuil du jeu est affiché

  function acceuil($partie, $result, $tentative){
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
          <td class='hide'></td>
          <td class='hide'></td>
          <td class='hide'></td>
          <td class='hide'></td>
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
              asort($result[$cpt]);
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

      function solution($partie, $result, $tentative, $solution, $win){
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
          <div class="page"><?php if($win == 1) { echo "Gagné"; } else { echo "Perdu"; } ?></div>
          <div class="title">Mastermind</div>
        </header>
        <?php
        if($win == 1) {
          echo "<div class='information'><b>Bien joué !</b> Vous avez reussi a gagné</div>";
        } else {
          echo "<div class='erreur'><b>Echec !</b> Vous avez perdue</div>";
        }
        ?>
        <div id="jeu">
          <table id="result">
            <tr>
              <?php
              foreach($solution as $sol) {
                if($sol == 0){
                  ?> <td class='h'></td> <?php
                } else if($sol == 1){
                  ?> <td class='a'></td> <?php
                } else if($sol == 2){
                  ?> <td class='d'></td> <?php
                } else if($sol == 3){
                  ?> <td class='c'></td> <?php
                } else if($sol == 4){
                  ?> <td class='b'></td> <?php
                } else if($sol == 5){
                  ?> <td class='g'></td> <?php
                } else if($sol == 6){
                  ?> <td class='f'></td> <?php
                } else if($sol == 7){
                  ?> <td class='e'></td> <?php
                }
              }
              ?>
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
                  asort($result[$cpt]);
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

            <form method="post" action="index.php">
              <input type="hidden" name="sendType" value="5" />
              <input class="info" type="submit" value="Rejoué" />
            </form>

            <form method="post" action="index.php">
              <input type="hidden" name="sendType" value="2" />
              <input id="deco" type="submit" value="Deconnection" />
            </form>

            <div>
            </body>
            <?php
          }
        }
