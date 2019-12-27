export default class Carnet {
    constructor() {
        this.start_date = new Date() ;

        this.equipeDisabled = []
        this.needRefresh = true

        this.jours = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
        this.mois = ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre"];

        this.today = new Date();
    }
    dateFr(ajout = 0) {
        // les noms de jours / mois
        // on recupere la date
        //let date = new Date();
        let date = new Date('January 12, 2009');
    
        if(ajout > 0){
            date.setDate(date.getDate() + ajout);
        }

        // on construit le message
        return {
            day: this.getJour( date.getDay() ),
            number: date.getDate(),
            month: this.getMois( date.getMonth() ),
            year: date.getFullYear(),
        };    
    }
    getJour(nbJour) {
        return this.jours[nbJour] ;
    }
    getMois(nbMois) {
        return this.mois[nbMois] ;
    }
    cycleTournante(day) {
    
        if (day > 25){
            day = day % 25;
            if (day == 0) day = 25 ;
        }

        switch ( day )
        {
            case 1:
            case 9:
            case 10:
            case 17:
            case 18:
                return 'matin' ;
            case 2:
            case 3:
            case 11:
            case 19:
            case 20:
                return 'aprés-midi' ;
            case 4:
            case 5:
            case 12:
            case 13:
            case 21:
                return 'nuit' ;
            case 6:
            case 7:
            case 8:
            case 14:
            case 15:
            case 16:
            case 22:
            case 23:
            case 24:
            case 25:
                return 'repos' ;
            default:
                return 'inconnus' ;
        }    
    }
    dateDiff(date1, date2) {
        let diff = {}                           // Initialisation du retour
        let tmp = date2 - date1;
    
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
    viewCal(length = 0,ajout = 0) {
    


        let debutCycle = new Date('January 12, 2009');// date de debut possible 12 janvier 2009
        let view = [0];
        let thisNbrDay = this.dateDiff(debutCycle,this.today);
    
        if (length <= 1) {
    
            let req = thisNbrDay.day + ajout ;
    
            view['date'] = this.dateFr(req);
            view['equipe1'] = this.cycleTournante(1 + req);
            view['equipe2'] = this.cycleTournante(11 + req);
            view['equipe3'] = this.cycleTournante(21 + req);
            view['equipe4'] = this.cycleTournante(6 + req);
            view['equipe5'] = this.cycleTournante(16 + req);

        }else if (length > 1) {
            for (let i = 0; i < length; i++) {
    
                let req = thisNbrDay.day + (ajout + i) ;
    
                view[i] = {
                    'date' : this.dateFr(req),
                    'equipe1' : this.cycleTournante(1 + req),
                    'equipe2' : this.cycleTournante(11 + req), 
                    'equipe3' : this.cycleTournante(21 + req), 
                    'equipe4' : this.cycleTournante(6 + req), 
                    'equipe5' : this.cycleTournante(16 + req)
                } ;
            }
    
        }
    
        this.needRefresh = false ;

        return view ;
    
    }
    searchDate(length) {
    
        let date = new Date(this.start_date.toJSON()); 
        // console.log(date)
        date = date.setDate( date.getDate() - 2 )

        let diffBDay = this.dateDiff(this.today,date);
        let day;

        if(Math.sign(diffBDay.sec) <= -1){
            day = diffBDay.day  ;
        }else if (Math.sign(diffBDay.sec) >= 0) {
            day = diffBDay.day +1  ;
    
        }
    
        return this.viewCal(length,day);
    
    }
    changeEquipeDisabled(num_equipe) {
        if( this.equipeIsDisabled(num_equipe) ){
            this.equipeDisabled = this.equipeDisabled.filter( equipeNew => num_equipe != equipeNew )
        }else{
          this.equipeDisabled.push( num_equipe );
        }
    }
    equipeIsDisabled(num_equipe) {
        return this.equipeDisabled.indexOf(num_equipe) >= 0 ;
    }
    nbEquipeVisible() {
        return 5 - this.equipeDisabled.length
    }
}