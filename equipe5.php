
<!DOCTYPE HTML>
<html>
<head>
  <title>Carnet de tournante V2</title>
  <link rel="stylesheet" href="style.css" charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Anton|Shadows+Into+Light|Bangers' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/png" href="favicon.png" />
</head>
<body>
<?php

// PARAMETRE !!! ATENTION !!!!
$delai_en_jours=1054;

// Creations des TOURNANTES : Appel des tableaux grace aux fonctions
require 'function.php';
$Equipe_5 = tournante(16,$delai_en_jours);
$date_t = datestournante($delai_en_jours);

// Creation du tableau final pour la mise en forme
$a=0;

echo "<TABLE>";
while ($a <= $delai_en_jours) {
   echo "$date_t[$a] </TD><TD> $Equipe_5[$a] </TD>" ;
   echo "</TR>";

  $a++;
}
echo "</TABLE>";
// Fin du tableau
?>
</body>
</html>
