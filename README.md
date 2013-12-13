[PSSL](http://pssl.intechinfo.fr/) - Site officiel de l'événement Paris Sud Student Lan
==================================================

Projet de formation humaine inédit, notre équipe a pour mission d'organiser un évenement autour des LAN.<br />
Après quelques LAN amateurs dans nos locaux à Ivry-sur-Seine, nous organiserons un grand évenement E-Sport sur Paris !

Site polyvalent et imaginé sur un modèle MVC simple, vous pouvez d'un simple copier/coller créer votre propre site pour vos événements LAN.

Spécifications
--------------------------------------
1. Gestion des utilisateurs<br />
2. Gestion de page<br />
3. Gestion des participants/événement<br />
4. Gestion des tournois<br />
5. Gestion de la liste des jeux<br />
6. Intégration de Challonge (API Bracket)<br />
7. Gestion d'actualités<br />

**Dernière actualités**
* Version stable disponible sur la branche 'master'.

Equipe de développement
--------------------------------------
1. [Julien Bernard](https://github.com/JulienBernard)<br />

Membres du projet
--------------------------------------
1. [Brice Hoffmann](http://pssl.intechinfo.fr/pages.php?id=6)<br />
2. [Corentin Broux](http://pssl.intechinfo.fr/pages.php?id=6)<br />
3. [Lionel Adossou](http://pssl.intechinfo.fr/pages.php?id=6)<br />
4. [Romain Souyri](http://pssl.intechinfo.fr/pages.php?id=6)<br />
5. [Ludovic Tresson](https://github.com/LudovicT)<br />
6. [Johan Rain](http://pssl.intechinfo.fr/pages.php?id=6)<br />
7. [Julien Bernard](https://github.com/JulienBernard)<br />

Comment développer votre propre site de LAN
--------------------------------------
1. Le site est basé sur le moteur [Space Engine](https://github.com/JulienBernard/SpaceEngine)
2. Après avoir modifié le fichier `config.php` et créé la base de donnée, vous pouvez lancer le site
3. Faites les modifications visuelles que vous souhaitez
4. Ajouter autant de page que vous voulez, remplissez la liste de jeu, créez vos tournois etc.
5. Lancer le site et partager l'adresse à vos joueurs !

L'accès au panel d'administration (backoffice) se fait automatiquement pour les utilisateurs de rang `2` ou `3` (à modifier directement dans la base de données, table `users`.

Questions ?
--------------------------------------

Vous pouvez me contacter directement sur GitHub via les `issues` si vous démasquez un bug.
