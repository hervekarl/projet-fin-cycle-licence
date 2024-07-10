#Pour excécuter ces modules assurer vous d'avoir "PostgreSQL", "Php" et "Composer"  installer sur votre machine.

#Dans le fichier ".env" à la racine des modules renseigner les informations de votre base de données comme il suit:
DB_PORT= [PORT]
DB_DATABASE= [NOM_DE_LA_BD]
DB_USERNAME= [NOM_DE_L_UTILISATEUR]
DB_PASSWORD= [MOT_DE_PASSE]
DB_SCHEMA= [SCHEMA_DE_LA_BD]

#Ouvrez des terminaux à la racine des modules et taper la commande "composer install" pour télécharger le sous-dossier "/vendor" qui contient toutes les dépendences nécessaires.

#Créez l'ensemble des tables nécessaires avec la commande "php artisan migrate".

#Si vous souhaitez utiliser des données de test tapez la commande "php artisan db:seed" qui placera 20 eregistrements dans chaque table.

#Enfin lancer les serveurs avec la commande "php artisan serve --port=<####>" qui occupera chahque module sur le port précisé([port] par défaut).


http://127.0.0.1:[port]


(Module Batiment)
{
    http://127.0.0.1:[port]/batiment/read
    http://127.0.0.1:[port]/batiment/read/{id_bat}
    http://127.0.0.1:[port]/batiment/create/{nbre_niveau}
    http://127.0.0.1:[port]/batiment/create
    http://127.0.0.1:[port]/batiment/update/{id_bat}/{nbre_niveau}
    http://127.0.0.1:[port]/batiment/delete/{id_bat}
    
    
    http://127.0.0.1:[port]/niveau/read
    http://127.0.0.1:[port]/niveau/read/{id_niv}
    http://127.0.0.1:[port]/niveau/create/{num_etage}/{nbre_salle}/{id_bat}
    http://127.0.0.1:[port]/niveau/create
    http://127.0.0.1:[port]/niveau/update/{id_niv}/{num_etage}/{nbre_salle}/{id_bat}
    http://127.0.0.1:[port]/niveau/delete/{id_niv}
    
    
    http://127.0.0.1:[port]/salle/read
    http://127.0.0.1:[port]/salle/read/{id_sal}
    http://127.0.0.1:[port]/salle/create/{nom}/{type}/{id_niv}
    http://127.0.0.1:[port]/salle/create
    http://127.0.0.1:[port]/salle/update/{id_sal}/{nom}/{type}/{id_niv}
    http://127.0.0.1:[port]/salle/delete/{id_sal}
    
    
    http://127.0.0.1:[port]/equipement/read
    http://127.0.0.1:[port]/equipement/read/{id_equip}
    http://127.0.0.1:[port]/equipement/create/{nom}/{type}
    http://127.0.0.1:[port]/equipement/create
    http://127.0.0.1:[port]/equipement/update/{id_equip}/{nom}/{type}
    http://127.0.0.1:[port]/equipement/delete/{id_equip}
    
    
    http://127.0.0.1:[port]/posseder/read
    http://127.0.0.1:[port]/posseder/read/{id_sal}/{id_equip}/{date_debut}
    http://127.0.0.1:[port]/posseder/read/{id_sal}/{id_equip}
    http://127.0.0.1:[port]/posseder/create/{id_sal}/{id_equip}
    http://127.0.0.1:[port]/posseder/create
    http://127.0.0.1:[port]/posseder/update/{id_sal}/{id_equip}/{date_debut}/{date_fin}
    http://127.0.0.1:[port]/posseder/delete/{id_sal}/{id_equip}/{date_debut}
    http://127.0.0.1:[port]/posseder/delete
}


(Module Pharmacie)
{   
    http://127.0.0.1:[port]/patient/read
    http://127.0.0.1:[port]/patient/read/{id_pat}
    http://127.0.0.1:[port]/patient/create/{nom}/{prenom}/{age}/{sexe}/{adresse}/{tel}
    http://127.0.0.1:[port]/patient/create
    http://127.0.0.1:[port]/patient/update/{id_pat}/{nom}/{prenom}/{age}/{sexe}/{adresse}/{tel}
    http://127.0.0.1:[port]/patient/delete/{id_pat}
    http://127.0.0.1:[port]/patient/delete

    
    http://127.0.0.1:[port]/employe/read
    http://127.0.0.1:[port]/employe/read/{id_emp}
    http://127.0.0.1:[port]/employe/create/{nom}/{prenom}/{sexe}/{adresse}/{tel}/{date}/{compte}/{salaire}
    http://127.0.0.1:[port]/employe/create
    http://127.0.0.1:[port]/employe/update/{id_emp}/{nom}/{prenom}/{sexe}/{adresse}/{tel}/{date}/{compte}/{salaire}
    http://127.0.0.1:[port]/employe/delete/{id_emp}
    http://127.0.0.1:[port]/employe/delete

    
    http://127.0.0.1:[port]/medicamment/read
    http://127.0.0.1:[port]/medicamment/read/{id_med}
    http://127.0.0.1:[port]/medicamment/create/{intitule}/{quantite}/{categorie}
    http://127.0.0.1:[port]/medicamment/create
    http://127.0.0.1:[port]/medicamment/update/{id_med}/{intitule}/{quantite}/{categorie}
    http://127.0.0.1:[port]/medicamment/delete/{id_med}
    http://127.0.0.1:[port]/medicamment/delete

    
    http://127.0.0.1:[port]/fournisseur/read
    http://127.0.0.1:[port]/fournisseur/read/{id_fou}
    http://127.0.0.1:[port]/fournisseur/create/{nom}/{tel}/{adresse}
    http://127.0.0.1:[port]/fournisseur/create
    http://127.0.0.1:[port]/fournisseur/update/{id_fou}/{nom}/{tel}/{adresse}
    http://127.0.0.1:[port]/fournisseur/delete/{id_fou}
    http://127.0.0.1:[port]/fournisseur/delete
    

    http://127.0.0.1:[port]/acheter/read
    http://127.0.0.1:[port]/acheter/read/{id_pat}/{id_med}/{date}
    http://127.0.0.1:[port]/acheter/read/{id_pat}/{id_med}
    http://127.0.0.1:[port]/acheter/create/{id_pat}/{id_med}/{quantite}/{prix}
    http://127.0.0.1:[port]/acheter/create
    http://127.0.0.1:[port]/acheter/update/{id_pat}/{id_med}/{date}/{quantite}/{prix}
    http://127.0.0.1:[port]/acheter/delete/{id_pat}/{id_med}/{date}
    http://127.0.0.1:[port]/acheter/delete


    http://127.0.0.1:[port]/commander/read
    http://127.0.0.1:[port]/commander/read/{id_emp}/{id_med}/{date}
    http://127.0.0.1:[port]/commander/read/{id_emp}/{id_med}
    http://127.0.0.1:[port]/commander/create/{id_emp}/{id_med}/{quantite}
    http://127.0.0.1:[port]/commander/create
    http://127.0.0.1:[port]/commander/update/{id_emp}/{id_med}/{date}/{quantite}
    http://127.0.0.1:[port]/commander/delete/{id_emp}/{id_med}/{date}
    http://127.0.0.1:[port]/commander/delete
    

    http://127.0.0.1:[port]/livrer/read
    http://127.0.0.1:[port]/livrer/read/{id_fou}/{id_med}/{date}            
    http://127.0.0.1:[port]/livrer/read/{id_fou}/{id_med}
    http://127.0.0.1:[port]/livrer/create/{id_fou}/{id_med}/{quantite}/{montant}
    http://127.0.0.1:[port]/livrer/create
    http://127.0.0.1:[port]/livrer/update/{id_fou}/{id_med}/{date}/{quantite}/{montant}
    http://127.0.0.1:[port]/livrer/delete/{id_fou}/{id_med}/{date}
    http://127.0.0.1:[port]/livrer/delete
}