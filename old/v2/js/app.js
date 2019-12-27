function dateFr(ajout = 0){

    // les noms de jours / mois
    var jours = new Array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
    var mois = new Array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
    // on recupere la date
    //var date = new Date();
    var date = new Date('January 12, 2009');

    if(ajout > 0){

        date.setDate(date.getDate() + ajout);

    }

    // on construit le message
    var message = jours[date.getDay()] + " ";   // nom du jour
    message += date.getDate() + " ";   // numero du jour
    message += mois[date.getMonth()] + " ";   // mois
    //message += date.getFullYear();

    return message;

}

function cycleTournante(day){

    var poste;

    if (day > 25){
        day = day % 25;
        if (day == 0) {
            day = 25 ;
        }
    }
    if (day <= 1 || day == 9 || day == 10 || day == 17 || day == 18){  poste = 'matin';
       }
       else if (day == 2 || day == 3 || day == 11 || day == 19 || day == 20){  poste = 'Aprés-Midi';
       }
       else if (day == 4 || day == 5 || day == 12 || day == 13 || day == 21){  poste = 'Nuit';
       }
       else if (day == 6 || day == 7 || day == 8 || day == 14 || day == 15 || day == 16 || day == 22 || day == 23 || day == 24 || day == 25){poste = 'Repos';
       }
       else {    alert("il y a un probleme.");
       }

       return poste;

}

function dateDiff(date1, date2){
    var diff = {}                           // Initialisation du retour
    var tmp = date2 - date1;

    tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
    diff.sec = tmp % 60;                    // Extraction du nombre de secondes

    tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
    diff.min = tmp % 60;                    // Extraction du nombre de minutes

    tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
    diff.hour = tmp % 24;                   // Extraction du nombre d'heures

    tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
    diff.day = tmp;

    return diff;
}

function viewCal(length = 0,ajout = 0){

    var debutCycle = new Date('January 12, 2009');// date de debut possible 12 janvier 2009
    var today = new Date();
    var view = [0];
    thisNbrDay = dateDiff(debutCycle,today);

    if (length <= 1) {

        req = thisNbrDay.day + ajout ;

        view['date'] = dateFr(req);
        view['equipe1'] = cycleTournante(1 + req);
        view['equipe2'] = cycleTournante(11 + req);
        view['equipe3'] = cycleTournante(21 + req);
        view['equipe4'] = cycleTournante(6 + req);
        view['equipe5'] = cycleTournante(16 + req);
    }else if (length > 1) {
        for (var i = 0; i < length; i++) {

            req = thisNbrDay.day + (ajout + i) ;

            view[i] = {'date' : dateFr(req),'equipe1' : cycleTournante(1 + req),'equipe2' : cycleTournante(11 + req), 'equipe3' : cycleTournante(21 + req), 'equipe4' : cycleTournante(6 + req), 'equipe5' : cycleTournante(16 + req)} ;
        }

    }

    return view ;

}

function searchDate(dateChoisi){

    var date = new Date(dateChoisi);
    var today = new Date();
    diffBDay = dateDiff(today,date);
    if(Math.sign(diffBDay.sec) <= -1){
        day = diffBDay.day  ;
    }else if (Math.sign(diffBDay.sec) >= 0) {
        day = diffBDay.day +1  ;

    }

    return viewCal(1,day);

}
