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
          <td>Essai</td>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>4</td>
          <td>Résultat</td>
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
                  ?> <td id='pionAff' class='h'></td> <?php
                } else if($essai == 1){
                  ?> <td id='pionAff' class='a'></td> <?php
                } else if($essai == 2){
                  ?> <td id='pionAff' class='d'></td> <?php
                } else if($essai == 3){
                  ?> <td id='pionAff' class='c'></td> <?php
                } else if($essai == 4){
                  ?> <td id='pionAff' class='b'></td> <?php
                } else if($essai == 5){
                  ?> <td id='pionAff' class='g'></td> <?php
                } else if($essai == 6){
                  ?> <td id='pionAff' class='f'></td> <?php
                } else if($essai == 7){
                  ?> <td id='pionAff' class='e'></td> <?php
                }
              }

              ?> <td><table><tr> <?php
              asort($result[$cpt]);
              foreach($result[$cpt] as $res){
                if($res == 1){
                  ?> <td id='resAff' class='black'></td> <?php
                } else if($res == 2){
                  ?> <td id='resAff' class='white'></td> <?php
                }
              }
              ?> </tr></table></td></tr> <?php
              $cpt ++;
            }

            ?>
          </tbody>
        </table>
        <table id="form">
          <caption>Séléction</caption>
          <form method="POST" action="index.php">
            <tr>
              <td><input class="hide" onDblclick="colorClickDel('pion1')" onChange="colorClickEvol('pion1')" type="number" min="0" max="7" id="pion1" name="pion1" required><p class="edit">0</p></td>
              <td><input class="hide" onDblclick="colorClickDel('pion2')" onChange="colorClickEvol('pion2')" type="number" min="0" max="7" id="pion2" name="pion2" required><p class="edit">0</p></td>
              <td><input class="hide" onDblclick="colorClickDel('pion3')" onChange="colorClickEvol('pion3')" type="number" min="0" max="7" id="pion3" name="pion3" required><p class="edit">0</p></td>
              <td><input class="hide" onDblclick="colorClickDel('pion4')" onChange="colorClickEvol('pion4')" type="number" min="0" max="7" id="pion4" name="pion4" required><p class="edit">0</p></td>
              <td>
                <input type="hidden" name="sendType" value="4"  />
                <input type="submit" value="Valider" />
              </td>
            </tr>
          </form>
        </table>
        <table id="colors">
          <tr>
            <td class="h" onClick="colorClickPicker('h',0)">0</td>
            <td class="a" onClick="colorClickPicker('a',1)">1</td>
            <td class="d" onClick="colorClickPicker('d',2)">2</td>
            <td class="c" onClick="colorClickPicker('c',3)">3</td>
            <td class="b" onClick="colorClickPicker('b',4)">4</td>
            <td class="g" onClick="colorClickPicker('g',5)">5</td>
            <td class="f" onClick="colorClickPicker('f',6)">6</td>
            <td class="e" onClick="colorClickPicker('e',7)">7</td>
          </tr>
        </table>

        <table id="tutoriel">
          <tr>
            <td>Cliqué sur une couleur pour l'ajouté a une case</td>
            <td>Entré un nombre entre 0 et 7 dans une case pour lui ajouté une couleur</td>
            <td>Double cliqué sur une case qui possede une couleur pour lui enlevé</td>
          </tr>
        </table>
        <form method="post" action="index.php">
          <input type="hidden" name="sendType" value="2" />
          <input id="deco" type="submit" value="Deconnexion" />
        </form>
        <div>
        </body>
        <script>
        function colorClickDel(nom){
          var couleurBox = document.getElementById(nom);
          couleurBox.className = "hide";
          couleurBox.value = "";
          couleurBox.parentNode.children[1].innerHTML = 0;
        }

        function colorClickEvol(nom){
          var couleurBox = document.getElementById(nom);
            if(couleurBox.value == 0){
              couleurBox.className = "h";
            } else if(couleurBox.value == 1){
              couleurBox.className = "a";
            } else if(couleurBox.value == 2){
              couleurBox.className = "d";
            } else if(couleurBox.value == 3){
              couleurBox.className = "c";
            } else if(couleurBox.value == 4){
              couleurBox.className = "b";
            } else if(couleurBox.value == 5){
              couleurBox.className = "g";
            } else if(couleurBox.value == 6){
              couleurBox.className = "f";
            } else if(couleurBox.value == 7){
              couleurBox.className = "e";
            }
            if(couleurBox.parentNode.children[1].innerHTML == 0){
              couleurBox.parentNode.children[1].innerHTML = 1;
            }
        }

        function colorClickPicker(nomClass, valueClass) {
          var couleurInput = document.getElementById("pion1").parentNode.parentNode;
          var cpt = 0;
          while(cpt < 4){
            if(couleurInput.children[cpt].children[1].className == "edit"){
              var obj = couleurInput.children[cpt].children[1];
              if(obj.innerHTML == 0){
                obj.innerHTML = 1;
                couleurInput.children[cpt].children[0].value = valueClass;
                couleurInput.children[cpt].children[0].className = nomClass;
                cpt = 4;
                break;
              }
            }
            cpt ++;
          }
        }
        </script>
        <?php
      }

      function solution($partie, $result, $tentative, $solution, $win, $msg){
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
          echo "<div class='information'><b>Bien joué ! </b>".$msg."</div>";
        } else {
          echo "<div class='erreur'><b>Echec ! </b>".$msg."</div>";
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
              <td>Essai</td>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>Résultat</td>
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
              <input class="info" type="submit" value="Rejouer" />
            </form>

            <form method="post" action="index.php">
              <input type="hidden" name="sendType" value="2" />
              <input id="deco" type="submit" value="Deconnexion" />
            </form>

            <div>
            </body>
            <?php
          }
        }
