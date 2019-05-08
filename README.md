# livres
Site web contenant le synopsis de livres, selon leur catégorie.
Front-office : Affiche les livres par catégories, fiche livre
Back-office : Ajouter, modifier, supprimer des categories
              Ajouter des livres

Technologie : Symfony4

Prérequis
  - PHP > 7 installé
  - Serveur web installé : apache
  - Serveur de base de données : postgres (pour le script 'base.sql')
  - Gestionnaire de package installé: Composer
  
Prendre le projet : 
  - Ouvrir le lien "https://github.com/My-project-repository/livres" et sélectionner "Download Zip" sous "Clone or Download"
  - Dezipper le projet
  - Mettre le dossier dans www du serveur web
  
Installation:
  
  - Creer une base de donnees nommée "libraryproject" sous postgres
  - Importer le script "base.sql" dans postgresSQL et l'executer
  - Ouvrir le ficher .env ,commenter la ligne 27 "  DATABASE_URL=postgres://rijdrknmqqt ...", decommenter la ligne 28 et modifier 
  suivant : "DATABASE_URL=pgsql://USER:PASSWORD:@127.0.0.1:5432/libraryproject" et changer USER: l'utilisateur de votre base
  et PASSWORD le mot de passe de la base. ex: DATABASE_URL=pgsql://postgres:root:@127.0.0.1:5432/libraryproject
  - Executer " composer install " dans la ligne de commande  pour installer les dependances sur la racine du projet
  
  
 Affichage: 
  - Executer la commande " php bin/console server:run " pour demarrer le serveur
  - Aller sur le lien : "localhost:PORT" où PORT sera le port de votre serveur web. ex: localhost:8000
  
  
  
