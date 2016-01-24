# CARNET DE TOURNANTE 5x8
_______________________

Realisation de nikoumhook pour maografyst c'est mon premier vrai travail en php donc je me doute que des amelioration il peut y en avoir des centaines, je reviendrais dessus afin de l'ameliorer et si un passionné veut l'utiliser et l'ameliorer celui-ci pourrait m'aider pour mon apprentissage.

## fonctionnement :


**function *tournante***

celle-ci permet de fabriquer le rythme des tourantes donc adaptable en fonction de votre rythme.
 > - ici 5*(jour travaillé)* / 3*(jours de repos)* ; 5/3 ; 5/4) ; donc sur 3 tournantes differentes.
 > - **Matin, Aprés-Midi, Aprés-Midi, Nuit, Nuit**
 > - **Matin, Matin, Aprés-Midi, Nuit, Nuit**
 > - **Matin, Matin, Aprés-Midi, Aprés-Midi, Nuit**
 
Le return est un tableau numéroté, les paramètres ne sont pas vraiment necessaire pour le carnet mais utilisé sur un autre projet le premier etant le jour sur lequel ont commence la tournante (utilisé pour callé les equipes dans le carnet), et le second la durée du tableau en nombre de jour qui par defaut est a 365 jours.


UTILISATION DANS LA FONCTION D'UNE CLASS "repos" pour stylisé les repos
 
**function *datestournante***

A mon avis les plus grosses ameliorations sont de ce coté a faire.
cette fonction permet juste de mettre les jours dans un tableau numéroté avec comme parametre la durée du tableau en nombre de jour qui par defaut est a 365 jours comme celui de la fonction tournante.

Dans le fichier "date.nkm" j'y inscrit la date du debut d'un carnet qui est un element IMPORTANT !!!
LE DEBUT DU CYCLE DU CARNET DE TOURNANTE CE FAIT A PARTIR DU PREMIER ET UNIQUE MATIN DE L'EQUIPE 1
la premiere date utilisé est : '12-12-2015'

Celle-ci est modifié tous les 25 jours quand le debut de cycle change. C'est le debut de la fonction.

DES CLASS son directement créée dans la boucle :
 1. 'week_end' pour stylisé les weed-end (amelioration a proposer faire les jours ferié)
 2. 'today' pour stylisé le jour actuel
 3. 'dates' pour stylisé les dates en général
 4. 'befortoday' pour mettre un hidden et ainsi caché les jours précédent (qui sont au maximum 24)


dans les 2 fonctions la variable pour la durée est identique afin de pouvoir la modifier a une seul endroit.


## Mise en place du tableau


comme vu ci-dessus la variable '$delai_en_jours' permet de modifier la durée du tableau

les equipes sont callé grace au premier parametre de la fonction tournante

$Equipe_n = tournante( #ICI# ,$delai_en_jours);

ont fabrique la boucle du tableau en incrementant la valeur des arrays.

>je pense que l'on peut caller les equipe avec modifiant directement les arrays mais dans ma premiere version du carnet j'avais realisé une bidouille du genre ce qui faisait que le tableau etait mal structuré les colones n'avais pas toute la même taille etc... c'est pour sa que j'ai ajouté ce parametre dans la fonction tournante.


http://maozoo.fr/carnet
