<?php

// $nombre_de_jour la passer en nombre de tournante avec une fonction.

function tournante($day=1,$delai_en_jours=365){

  $jour_de_taff = array();
  $count = 0;

  while ($count <= $delai_en_jours){
                if ($day <= 1){  $jour_de_taff[] = 'matin';
                                 $day = 2 ;
                                 $count ++ ;
                              }
                elseif ($day == 2){  $jour_de_taff[] = 'apr&eacute;s-midi';
                                     $day ++ ;
                                     $count ++ ;
                                  }
                elseif ($day == 3){  $jour_de_taff[] = 'apr&eacute;s-midi';
                                     $day ++ ;
                                     $count ++ ;
                                  }
                elseif ($day == 4){  $jour_de_taff[] = 'nuit';
                                     $day ++ ;
                                     $count ++ ;
                                  }
                elseif ($day == 5){  $jour_de_taff[] = 'nuit';
                                     $day ++ ;
                                     $count ++ ;
                                  }
                elseif ($day == 6){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                   $day ++ ;
                                   $count ++ ;
                                  }
                elseif ($day == 7){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                   $day ++ ;
                                   $count ++ ;
                                  }
                elseif ($day == 8){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                   $day ++ ;
                                   $count ++ ;
                                  }
                elseif ($day == 9){ $jour_de_taff[] = 'matin';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 10){$jour_de_taff[] = 'matin';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 11){$jour_de_taff[] = 'apr&eacute;s-midi';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 12){$jour_de_taff[] = 'nuit';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 13){$jour_de_taff[] = 'nuit';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 14){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 15){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 16){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 17){$jour_de_taff[] = 'matin';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 18){$jour_de_taff[] = 'matin';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 19){$jour_de_taff[] = 'apr&eacute;s-midi';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 20){$jour_de_taff[] = 'apr&eacute;s-midi';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 21){$jour_de_taff[] = 'nuit';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 22){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 23){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 24){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                    $day ++ ;
                                    $count ++ ;
                                  }
                elseif ($day == 25){$jour_de_taff[] = '<span class=\'repos\'>repos</span>';
                                    $day = 1 ;
                                    $count ++ ;
                                    $tournante ++ ;
                                  }
                elseif ($day > 25){$day = $day % 25;
                }
                else {    echo "il y a un probleme.";  }


}
return ($jour_de_taff);
}




function datestournante($delai_en_jours=365){

  // lecture de la variable $debut_cycle
      $debut_cycle_fichier = fopen('date.nkm', 'r+');
      $debut_cycle = fgets($debut_cycle_fichier);
      // Fin de la lecture du fichier
      //$debut_cycle='12-12-2015'; // !!!! ATTENTION BIEN INDIQUER UN JOUR UN L'EQUIPE 1 A QU'UN MATIN
      $date_suivante = date('d-m-Y', strtotime($debut_cycle.' +25 days'));

      $today = new DateTime();
      $today_totime = strtotime (date_format($today, 'd-m-Y'));

    // Enregistrement du jour dans date.nkm
  /*  var_dump($debut_cycle);
    var_dump($date_suivante);
    var_dump(date_format($today, 'd-m-Y'));
Précédent bug etait parce que je comparais des chaines de characteres et non des objets dans les dates c'est ce qui ne fonctionnait pas
parce que il calcul comme si c'etait un nombre c'est tout pas une date

    */
      $obj_date_suivante = new DateTime($date_suivante) ;
      $obj_today = new DateTime(date_format($today, 'd-m-Y')) ;

if ( $obj_date_suivante < $obj_today ) {
        $debut_cycle = $date_suivante ;
      }

      fseek($debut_cycle_fichier, 0); // On remet le curseur au début du fichier
      fputs($debut_cycle_fichier, $debut_cycle); // On écrit lanouvelle date
      fclose($debut_cycle_fichier);

  //fin enregistrement avec recup de la variable $debut_cycle et fermeture du fichier

  $date = new DateTime($debut_cycle);



// BOUCLE DES TOURNANTES AVEC LE PARAMETRE 'delai_en_jours' qui indique jusqu'a quand

  // Variable pour la boucle
  $jours = 0;
  $dates_tournantes = array();
  //

  while ($jours <= $delai_en_jours) {

        if (  strtotime(date_format($date, 'd-m-Y')) < $today_totime) {
          $dates_tournantes[] = '<TR class=\'befortoday\'><TD class=\'dates\'>' . date_format($date, 'd-m-Y') .'';
        }

        elseif (date_format($today, 'd-m-Y') == date_format($date, 'd-m-Y')) {
          $dates_tournantes[] = '<TR class=\'today\'><TD class=\'dates\'> Aujourd\'hui';
        }

        elseif (date_format($date, 'w') == 0 OR date_format($date, 'w') == 6) {
            $dates_tournantes[] = '<TR><TD class=\'week_end\'>' . date_format($date, 'd-m-Y') .'';
        }

        else {
            $dates_tournantes[] = '<TR><TD class=\'dates\'>' . date_format($date, 'd-m-Y') .'';
        }

        $date->modify('+1 day');
        $jours ++ ;
      }

      return ($dates_tournantes);

}
