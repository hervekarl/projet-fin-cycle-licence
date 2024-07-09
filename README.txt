#Pour exceuter ces modules assurer vous d'avoir "PostgreSQL", "Php" et "Composer"  installer sur votre machine.

#Dans le fichier ".env" à la racine du projet renseigner les informations de votre base de données comme il suit:
DB_PORT= [PORT]
DB_DATABASE= [NOM_DE_LA_BD]
DB_USERNAME= [UTILISATEUR]
DB_PASSWORD= [MOT_DE_PASSE]

#Ouvrez un terminal à la racine du projet et taper la commande "composer install" pour télécharger les dépendences nécessaires

#Créez l'ensemble des tables nécessaires avec la commande "php artisan migrate"

#Si vous souhaitez utiliser des données de test tapez la commande "php artisan db:seed" qui placera 20 eregistrements dans chaque table

#Enfin lancer le serveur avec la commande "php artisan serve" qui occupera le projet sur le projet 8000

http://127.0.0.1:8000


http://127.0.0.1:8000/batiment/read
http://127.0.0.1:8000/batiment/read/{id_bat}
http://127.0.0.1:8000/batiment/create/{nbre_niveau}
http://127.0.0.1:8000/batiment/create
http://127.0.0.1:8000/batiment/update/{id_bat}/{nbre_niveau}
http://127.0.0.1:8000/batiment/delete/{id_bat}


http://127.0.0.1:8000/niveau/read
http://127.0.0.1:8000/niveau/read/{id_niv}
http://127.0.0.1:8000/niveau/create/{num_etage}/{nbre_salle}/{id_bat}
http://127.0.0.1:8000/niveau/create
http://127.0.0.1:8000/niveau/update/{id_niv}/{num_etage}/{nbre_salle}/{id_bat}
http://127.0.0.1:8000/niveau/delete/{id_niv}


http://127.0.0.1:8000/salle/read
http://127.0.0.1:8000/salle/read/{id_sal}
http://127.0.0.1:8000/salle/create/{nom}/{type}/{id_niv}
http://127.0.0.1:8000/salle/create
http://127.0.0.1:8000/salle/update/{id_sal}/{nom}/{type}/{id_niv}
http://127.0.0.1:8000/salle/delete/{id_sal}


http://127.0.0.1:8000/equipement/read
http://127.0.0.1:8000/equipement/read/{id_equip}
http://127.0.0.1:8000/equipement/create/{nom}/{type}
http://127.0.0.1:8000/equipement/create
http://127.0.0.1:8000/equipement/update/{id_equip}/{nom}/{type}
http://127.0.0.1:8000/equipement/delete/{id_equip}


http://127.0.0.1:8000/posseder/read
http://127.0.0.1:8000/posseder/read/{id_sal}/{id_equip}/{date_debut}
http://127.0.0.1:8000/posseder/read/{id_sal}/{id_equip}
http://127.0.0.1:8000/posseder/create/{id_sal}/{id_equip}
http://127.0.0.1:8000/posseder/create
http://127.0.0.1:8000/posseder/update/{id_sal}/{id_equip}/{date_debut}/{date_fin}
http://127.0.0.1:8000/posseder/delete/{id_sal}/{id_equip}/{date_debut}
http://127.0.0.1:8000/posseder/delete
