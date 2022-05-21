# Projet Back
## Projet rendu le 22/05/2022

Le code ne sera plus maintenu sur ce repo. Il sera surement fork et améliorer par les contributeurs

## Structure du dossier

- components : Tout les parties visible ou nécéssaire sur plusieurs pages
- includes : toutes les fonctions php ou les partie de code non visibles nécéssaire au fonctionnement du site
- js : tout les fichiers javascript
- pages : les différentes page si il y a
- sql : la BDD à importer dans une base de donnée nommée "pathetic"
- styles : le scss/css pour les modes light/dark
- Les fichiers présents dans la racine du projet sont index.php et .gitattributes le reste doit être mis dans les dossiers concernées

## TODO LIST
- Authentification : 
  - Créer son compte ✅
  - Se connecter ✅
  - Se déco ✅

- Profil : **Team 1**
  - Modifier ses informations perso ✅
  - Modifier sa photo de profil et bannière ✅
  - Désactiver et réactiver son compte ❌
  - Supprimer son compte ✅

- Relations :
  - Pouvoir recherche un membre ✅
  - Pouvoir ajouter ou supprimer un membre comme connexion ✅

- Contenu : **Team 1**
  - Créer une publication apparaissant sur son profil ✅
  -  Commenter une publication ou un autre commentaire (Un niveau max) ❌
  -  Réagir à une publication ou un commentaire avec un emoji ❌

- Groupes: **Team 2**
  - Pouvoir créer un groupe public ou privé (DB : Boolean)❌
  - Pouvoir s'inscire à un groupe public, ou candidater à groupe privé (DB: Liste d'attente ?)❌
  - Pouvoir voir les publications des groupes public ❌ (DB: pas complicado on reprend le code du Flux.php)
  - En tant que membres :
    - Pouvoir voir les publications,publier et réagir au sein d'un groupe privé auquel on est inscrit (Pareil qu'au dessus)❌
    - Pouvoir inviter ses relations au groupe (Liste d'amis avec bouton "invite" qui mets un msg dans le chat ?)❌
  - En tant qu'admin :
    - Pouvoir accepter ou refuser les candidatures à groupe privé (Système de notif ? ou un channel spécial avec toute les demandes en tant que msg ?)❌
    - Pouvoir changer les droits d'un utilisateur (DB:Boolean Update)❌
    - Pouvoir exclure un membre d'un groupe (DB: DELETE user_id WHERE user_id = ?)❌
    - Pouvoir changer les informations du groupe (DB: UPDATE groupes_bio etc)❌

- Pages : **Team 2**
  - Pouvoir créer des pages publiques ❌
  - Pouvoir visualier le contenu des pages ❌
  - En tant qu'admin :
    - Pouvoir ajouter ou supprimer des admin à ces pages ❌
    - Pourvoir modifier les contenus de la page (nom, description,image) ❌

- Messagerie : **Team 3**
  - Pouvoir de envoyer un message privé à une relation ♻️
  - Pouvoir modifer un message privé envoyé à une relation ♻️
  - Pouvoir supprimer un message privé envoyé à une relation ♻️
  - Pouvoir créer une groupe de groupe de messagerie avec ses relations ♻️
  - Pouvoir définir le nom et l'image du groupe de messagerie ♻️

- Autre fonctionalité à rajouter:
  - voir message récents ♻️
  - Une navbar avec les options ✅
  - Compteur d'amis ✅
  - Ajout d'une User Page ✅

| Team   | Membre 1 | Membre 2 |
| ------ | -------- | -------- |
| Team 1 | Kader    | Adrien   |
| Team 2 | Veljko   | Arsène   |
| Team 3 | Ethan    | Carim    |

| Personne            | Rôle                        | Github                                   | Linkedin                                                                               |
| ------------------- | --------------------------- | ---------------------------------------- | -------------------------------------------------------------------------------------- |
| DOBROVOLSKYY Arsène | --                          | [@Daiiruin](https://github.com/Daiiruin) | [DOBROVOLSKYY Arsène](https://www.linkedin.com/in/ars%C3%A8ne-dobrovolskyy-458045226/) |
| GAOUSSOU Bakayoko   | Archi Réseau && Backend Dev | [@gaoubak](https://github.com/gaoubak)   | [Gaoussou Bakayoko](https://www.linkedin.com/in/kader-bakayoko-341b53190/)             |
| HA Adrien           | --                          | [@JinSu77](https://github.com/JinSu77)   | [Adrien HA](https://www.linkedin.com/in/adrien-ha-b39045226/)                          |
| Carim               | --                          | [@carim75](https://github.com/carim75)   | [--]()                                                                                 |
| VIDEAU Ethan        | Front End && Design         | [@Setsudan](https://github.com/Setsudan) | [Launay Ethan](https://www.linkedin.com/in/videau-launay-ethan/)                       |
| VOJINOVIC Veljko    | --                          | [@V-eljko](https://github.com/V-eljko)   | [Vojinovic Veljko](https://www.linkedin.com/in/veljko-vojinovic-365823226/)            |

## Progress tracker

#### 09/05/2022

- Design de l'archi réseau 
- Login/Logout/SignUp 
- Création du squelette de l'interface 
- Ajout du dark mode 

#### 10/05/2022

- update de l'ui 
- Implémentation du système de connection 
- Ajout du système des messages récent 
- Ajout des logos proposé
- Finalisation de l'archi réseau + ajout de la BDD SQL 

#### 11/05/2022

- Debug de la BDD + ajout de la fonctionalité des post 
- Ajouts de la fonctionnalité permettant de poster 

#### 12/05/2022

- Création de l'interface pour chercher les utilisateurs 
- Ajout de la fonctionalité d'ajout de post 

#### 13/05/2022

- Finalisation du backend permettant de chercher un utilisateur n
- Finialisation de l'option permettant d'ajouter une photo de profil 

#### 17/05/2022

- Changement de l'ui
- Ajout de la fonctionnalité de messagerie
- Ajout de la fonctionnalité de post
- Ajout de la fonctionnalité de changement de photo de profil
- Ajout de système followers

#### 18/05/2022

- Ajout de la suppression de compte
- Ajout du compteur d'amis
