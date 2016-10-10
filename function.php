<?php
// $nombre_de_jour la passer en nombre de tournante avec une fonction.
function tournante($day=1,$delai_en_jours=365){
  $jour_de_taff = array();
  $count = 0;

  $matin = 'matin' ;
  $aprem = 'apr&eacute;s-midi' ;
  $nuit = 'nuit' ;
  $repos = '<span class=\'repos\'>repos</span>'


  while ($count <= $delai_en_jours){
                if ($day <= 1 || $day == 9 || $day == 10 || $day == 17 || $day == 18){  $jour_de_taff[] = $matin;
                                 $day = 2 ;
                                 $count ++ ;
                              }
                elseif ($day == 2 || $day == 3 || $day == 11 || $day == 19 || $day == 20){  $jour_de_taff[] = $aprem;
                                     $day ++ ;
                                     $count ++ ;
                                  }
                elseif ($day == 4 || $day == 5 || $day == 12 || $day == 13 || $day == 21){  $jour_de_taff[] = $nuit;
                                     $day ++ ;
                                     $count ++ ;
                                  }
                elseif ($day == 6 || $day == 7 || $day == 8 || $day == 14 || $day == 15 || $day == 16 || $day == 22 || $day == 23 || $day == 24 || $day == 25){$jour_de_taff[] = $repos ;
                                   $day ++ ;
                                   $count ++ ;
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
      $obj_date_suivante = new DateTime($date_suivante) ;
      $obj_today = new DateTime(date_format($today, 'd-m-Y')) ;
    if ( $obj_date_suivante < $obj_today ) {
        $debut_cycle = $date_suivante ;
      }
      fseek($debut_cycle_fichier, 0); // On remet le curseur au début du fichier
      fputs($debut_cycle_fichier, $debut_cycle); // On écrit le nouveau nombre de pages vues
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

