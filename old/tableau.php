<?php

// PARAMETRE !!! ATENTION !!!!
$delai_en_jours=1054;

// Creations des TOURNANTES : Appel des tableaux grace aux fonctions
require 'function.php';
$Equipe_1 = tournante(1,$delai_en_jours);
$Equipe_2 = tournante(11,$delai_en_jours);
$Equipe_3 = tournante(21,$delai_en_jours);
$Equipe_4 = tournante(6,$delai_en_jours);
$Equipe_5 = tournante(16,$delai_en_jours);
$date_t = datestournante($delai_en_jours);

// Creation du tableau final pour la mise en forme
$a=0;

echo "<TABLE>";
while ($a <= $delai_en_jours) {
   echo "$date_t[$a] </TD><TD> $Equipe_1[$a] </TD><TD> $Equipe_2[$a] </TD><TD> $Equipe_3[$a] </TD><TD> $Equipe_4[$a] </TD><TD> $Equipe_5[$a] </TD>" ;
   echo "</TR>";

  $a++;
}
echo "</TABLE>";
// Fin du tableau
