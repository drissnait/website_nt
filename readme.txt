****************************************************************
    
                	Projet PHP
                ----------------------------
              


Par Steven EL KHOURY, Sefkan TAS, Driss NAIT BELKACEM


Pour l'installation du projet :

***** Prérequis *****

-PHP (version 7 minimum)
-Composer
-Un SGBD pour MariaDB
-Un serveur web local (ici Wamp)


***** Etapes *****

-Vous devez vous rendre à la racine du projet via un terminal.

-Taper la commande "composer install" pour installer toutes les dépendances
du projets (cela peut prendre du temps en fonction de votre connexion internet)

-A la racine du projet, modifier le nom du fichier ".env.example" en ".env"
et y ajouter les paramètres pour la connexion à la base de données
(DB_HOST, DB_PORT, DB_DATABSE, DB_USERNAME, DB_PASSWORD).

-Dans le terminal lancer la commande "php artisan key:generate"

-Créer un base de donnée.

-Executer le script SQL "BASE_DE_DONNEES" pour ajouter les données et structure dans la base de données.

-Lancer le serveur web

****************************************************************


*******
INDEX :
*******

1. Que fait notre site web ?
2. Pourquoi ?
3. Comment importer/exporter des données ?

****************************************************************
1. Que fait notre site web
****************************************************************

- Il permet la gestion des élèves de MIAGE allant de L3 à M2. 
- Il permet d'avoir la liste complète ou filtré des étudiants ainsi que d'avoir un suivi.
- Il propose une modification des fiches des étudiants.
- Il propose une importation des données pour ajouter des etudiants en 1 seule fois.
- Il permet d'avoir des informations sur le stage et l'entreprise effectué par l'étudiant.
- Enfin il propose d'avoir un suivi de carrière des anciens étudiants de la MIAGE.


****************************************************************
2. Pourquoi ?
****************************************************************

mettre en place une application Web permettant de garder
trace des contacts des étudiants ayant fait un parcours Miage depuis la L3 Miage , en passant
par le Master et puis ceux qui sont passé dans le monde professionnel.

un suivi du parcours universitaire et professionnel des étudiants en historisant l’évolution
de leur carrière une fois le diplôme obtenu.


****************************************************************
3. Comment importer/exporter des données
****************************************************************

Le fichier contenant les données doit etre un fichier xlx, 
de plus celui ci doit avoir doit avoir les colonnes id, nom, prenom, mail, promotion et voie
aller sur importer des étudiants et choisir votre fichier.

à l'inverse pour exporter des données vous devez aller sur Export des données
selectionner la Voie et la Promotion
et vous obtiendrez les données de la section que vous avez demandez.

