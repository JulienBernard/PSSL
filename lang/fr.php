<?php
	/* Traduction trié par tableaux : CTRL+F pour accès rapide ! */
	$navigation[] = Array();
	$login[] = Array();
	$header[] = Array();
	$error[] = Array();
	$admin[] = Array();
	$general[] = Array();
	$index[] = Array();
	
	/* navigation */
	$navigation["link1"] = "C'est quoi ?";
	$navigation["link2"] = "Commencer !";
	$navigation["link3"] = "Suivre / Fork";
	$navigation["connectedLink1"] = "Vous êtes connecté. Et maintenant ?";
	$navigation["connectedLink2"] = "Suivre / Fork";
	$navigation["returnToHome"] = "Revenir à l'accueil";

	/* login */
	$login["title1"] = "Connexion";
	$login["subtitle1"] = "J'ai déjà un compte";
	$login["text1"] = "Merci de renseigner les champs ci-dessous. Pas de compte, <a data-reveal-id='registerModal'>inscrivez-vous</a>.";
	$login["title2"] = "Inscription";
	$login["subtitle2"] = "Je n'ai pas de compte";
	$login["text2"] = "L'inscription au site vous permettra de vous inscrire aux tournois et de renseigner les jeux que vous possédez.<br />Merci de renseigner les champs ci-dessous.<br /><br /><span class='center italic smaller'>Nous garantissons un accès protégé et chiffré de toutes les informations personnelles stockées dans notre base de données.</span>";
	$login["title3"] = "S'inscrire à la prochaine LAN";
	$login["subtitle3"] = "Date : 29 novembre 2013<br />Lieu : IN'TECH INFO, 74 bis avenue Maurice Thorez 94200 Ivry-sur-Seine (M7 Pierre et Marie Curie)";
	$login["text3"] = "En vous inscrivant, vous vous engagez sur l'honneur à être présent. Si un contre-temps vous empêche de venir, vous pourrez vous désinscrire sur cette même page plus tard. Le coût d'entrée est de 1€ symbolique.<br /><br />Nous basons notre budget et nos achats selon ces inscriptions, merci de vérifier vos dispositions avant de valider !";
	$login["name"] = "Votre nom";
	$login["firstname"] = "Votre prénom";
	$login["username"] = "Votre pseudonyme";
	$login["password"] = "Votre mot de passe";
	$login["logme"] = "Se connecter";
	$login["subscribe"] = "S'inscrire";
	$login["unsubscribe"] = "Se désincrire";
	$login["IParticipate"] = "Je participe";
	$login["INotParticipate"] = "Je suis spectateur";
	$login["UoT"] = "Je certifie avoir lu et approuvé la <a href='charte.docx'>charte régissant la soirée</a>.";
	
	/* Header */
	$header["project"] = "Le projet";
	$header["team"] = "L'équipe";
	$header["participate"] = "Connexion";
	$header["account"] = "Mon compte";
	$header["tournament"] = "Liste des tournois";
	$header["logout"] = "Déconnexion";
	$header["subscribe"] = "S'inscrire à la prochaine LAN du 20 décembre 2013";

	/* error */
	$error["loginSuccess"] = "Connexion réussie. <a style='color: black;' href='index.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["loginError"] = "Une erreur important est survenu, merci de contacter l'administrateur du site.";
	$error["loginError1"] = "Ce PSEUDONYME n'existe pas dans notre base de données.";
	$error["loginError2"] = "Votre PSEUDONYME doit être supérieur à 3 caractères et être inférieur à 20 caractères.<br />Votre MOT DE PASSE doit être supérieur à 3 caractères.";
	$error["loginError3"] = "Votre PSEUDONYME ou votre MOT DE PASSE ne correspondent pas.";
	$error["loginError4"] = "Une importante erreur est survenue : impossible de générer un token sécurisé !";
	$error["loginError5"] = "Les caractères spéciaux autre que les lettres et les chiffres ne sont pas autorisés.";
	$error["subscribeSuccess"] = "Inscription réussie. <a style='color: black;' href='index.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["subscribeError"] = "Une erreur important est survenu, merci de contacter l'administrateur du site.";
	$error["subscribeError1"] = "Ce PSEUDONYME existe déjà dans notre base de données. Veuillez en choisir un autre.";
	$error["subscribeError2"] = "Votre PSEUDONYME doit être supérieur à 3 caractères et être inférieur à 20 caractères.<br />Votre MOT DE PASSE doit être supérieur à 3 caractères et inférieur à 100 caractères.";
	$error["subscribeError3"] = "Les caractères spéciaux autre que les lettres et les chiffres ne sont pas autorisés.";
	$error["addSuccess"] = "Inscription validée. <a style='color: black;' href='subscribe.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["delSuccess"] = "Désinscription validée. <a style='color: black;' href='subscribe.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["addError1"] = "Un des champs est vide.";
	$error["addError2"] = "Vous êtes déjà enregistré pour cette lan.";
	$error["addError3"] = "Ce mail n'est pas valide.";
	$error["addError4"] = "Une importante erreur est survenue : impossible de vous ajouter dans la base de données !";
	$error["suggestSuccess"] = "Le jeu a bien été proposé aux administrateurs. Merci de votre participation !<br />La validation d'un jeu (incluant la création de sa propre page) peut prendre quelque jours, merci de votre patience.";
	$error["suggestError"] = "Une erreur semble être survenue :<br />- Vous ne pouvez proposer qu'un seul jeu à la fois<br />- Ce jeu a déjà été proposé par un autre utilisateur.";
	$error["tournamentSuccess"] =  "Tournoi créé avec succès. <a style='color: black;' href='tournaments.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["tournamentError"] = "Une erreur importante semble être survenue. Merci de contacter l'administrateur du site.";
	$error["tournamentError1"] = "Une erreur semble être survenue :<br />- Le NOM doit être supérieur à 3 caractères.<br />- Le NOM doit être unique et ne pas déjà existé";
	$error["tournamentError2"] = "Vous devez renseigner les champs suivants : nom du tournoi, jeu du tournoi";
	$error["tournamentError3"] = "Les noms des tournois doivent être unique : ce nom est déja utilisé.";
	$error["tournamentUserSuccess"] = "Vous êtes désormais inscrit à ce tournoi. Merci de votre participation !";
	$error["tournamentUserError"] = "Une erreur semble être survenue :<br />- Ce tournoi n'existe plus ou n'est plus valide<br />- Vous êtes déjà inscrit à un autre tournoi.";

	/* admin */
	$admin["generalAccountType"] = "vous êtes connecté en tant que";
	$admin["usersBodyTitle11"] = "Liste des pages";
	$admin["usersBodyTitle21"] = "Données";
	$admin["usersBodyTitle12"] = "Utilisateurs";
	$admin["usersBodyTitle22"] = "Données";
	$admin["usersBodyTitle13"] = "Liste des jeux";
	$admin["usersBodyTitle23"] = "Données";
	$admin["usersBodyTitle14"] = "Liste des tournois";
	$admin["usersBodyTitle24"] = "Données";
	$admin["usersBodyTitle15"] = "Liste des participants";
	$admin["usersBodyTitle25"] = "Données";
	$admin["usersBodyTitle16"] = "Liste des actualités";
	$admin["usersBodyTitle26"] = "Données";
	$admin["newsLinkCreate"] = "Publier une actualité";
	$admin["pagesLinkCreate"] = "Créer une nouvelle page";
	$admin["gamesLinkCreate"] = "Ajouter un jeu à la liste";
	$admin["eventLinkCreate"] = "Ajouter un participant";
	$admin["tournamentsLinkCreate"] = "Ajouter un tournoi à la liste";
	$admin["visible"] = "Visible";
	$admin["hidden"] = "Caché";
	$admin["navLinkReturnTournament"] = "Revenir à la liste des tournois";	
	$admin["navLinkReturnEvent"] = "Revenir à la liste des participants";	
	$admin["navLinkReturnNew"] = "Revenir à la liste des actus";	
	$admin["navLinkReturnPage"] = "Revenir à la liste des pages";	
	$admin["navLinkReturnGame"] = "Revenir à la liste des jeux";	
	$admin["navLinkReturnMain"] = "Revenir à l'index";	
	$admin["IndexPages"] = "Administrer vos pages";
	$admin["IndexUsers"] = "Gérer les utilisateurs";
	$admin["IndexGames"] = "Controler la liste des jeux";
	$admin["IndexTournament"] = "Préparer les tournois";
	$admin["IndexPagesText"] = "La gestion de vos pages vous permet de créer, modifier et supprimer les différentes pages visiblent sur le site. Un éditeur complet vous aide à rédiger et à structurer facilement vos pages.";
	$admin["IndexUsersText"] = "Chaque création de compte est reporté ici. Vous pouvez vérifier le contenu du profil de chaque utilisateur, modifier son mot de passe ou lui attribuer un autre rang.";
	$admin["IndexGamesText"] = "Chaque utilisateur enregistré peut proposer un jeu aux administrateurs. Vous pouvez ainsi controler la liste des jeux présent à vos LANs, modifier leur présentation et leur attribuer une page spécifique.";
	$admin["IndexTournamentText"] = "Composante phare des vos LANs, vous pouvez créer et lister les joueurs présents à vos tournois pour une gestion simplifiée des différentes parties à organiser.";

	/* General */
	$general["tournamentHowWork"] = "Comment ça marche ?";
	$general["tournamentName"] = "Nom du tournoi";
	$general["tournamentTeam"] = "Mon équipe";
	$general["tournamentTeamsAndGamers"] = "Équipes présentes et participants à ce tournoi";
	$general["tournamentChangeTournament"] = "Rejoindre un tournoi / Changer de tournoi";
	$general["tournamentTextVisitor"] = "<p>Les tournois sont imaginés et proposés par les organisateurs selon la liste des jeux possèdés par les joueurs : <span class=\"bold\">si vous souhaitez un tournoi portant sur votre jeu préféré</span>, signalez que vous le possèdez via la page <a href=\"#\" data-reveal-id=\"loginModal\">mon compte</a>.</p><p>Attention : vous ne pouvez vous inscrire qu'à un seul tournoi par soirée !</p>";
	$general["tournamentTextUser"] = "<p>Les tournois sont imaginés et proposés par les organisateurs selon la liste des jeux possèdés par les joueurs : <span class=\"bold\">si vous souhaitez un tournoi portant sur votre jeu préféré</span>, signalez que vous le possèdez via la page <a href=\"#\" data-reveal-id=\"accountModal\">mon compte</a>.</p><p>Attention : vous ne pouvez vous inscrire qu'à un seul tournoi par soirée !</p>";
	$general["IParticipateTo"] = "Je participe à ...";
	$general["IParticipateTo"] = "Je participe à ...";
	$general["deconnection"] = "Vous avez été correctement déconnecté du site.";
	$general["gamer"] = "joueur";
	$general["spectator"] = "spectateur";
	$general["renting"] = "Location";
	$general["localization"] = "Localisation (provenance)";
	$general["users"] = "utilisateurs";
	$general["pages"] = "pages";
	$general["tournament"] = "Tournois";
	$general["games"] = "jeux";
	$general["event"] = "participants";
	$general["name"] = "Nom";
	$general["mail"] = "Mail";
	$general["price"] = "Prix";
	$general["status"] = "Statut";
	$general["tournaments"] = "tournois";
	$general["fastNavigation"] = "Navigation";
	$general["lastUpdateThe"] = "Mise à jour le";
	$general["publishedThe"] = "Publiée le";
	$general["by"] = "Par";
	$general["oupsTitle"] = "Vous ne devriez pas être là ...";
	$general["oupsText"] = " Vous n'avez pas les droits nécessaires pour accèder à cette page.<br />Merci de <a href='index.php'>retourner à la page d'accueil</a>. ";
	$general["emailValid"] = "Votre mail doit être valide ! (INACTIF POUR L'INSTANT)";
	$general["emailUse"] = "Votre mail sera uniquement utilisé pour vous prévenir des prochaines événements,<br />mais surtout pour vous demander de valider votre inscription à cette LAN !";
	$general["newbie"] = "Débutant";
	$general["level"] = "Mon niveau";
	$general["low"] = "Faible";
	$general["medium"] = "Moyen";
	$general["high"] = "Haut";
	$general["pro"] = "Pro";
	$general["IAm"] = "Je suis ...";
	$general["CallMe"] = "Je me fais appeler ...";
	$general["LastActivity"] = "Ma dernière activité date du ...";
	$general["IPlayThisGame"] = "Je joue a ce jeu : il est génial !";
	$general["MyLevelIs"] = "Je penses avoir ce niveau";
	$general["AddOrSuggest"] = "Ajouter ou suggérer un jeu";
	$general["AddGame"] = "Ajouter à ma liste";
	$general["SuggestGame"] = "Suggérer ce jeu";
	$general["DataPrivate"] = "Données privées";
	$general["DataPublic"] = "Données publiques";
	$general["createAccount"] = "Je crée un compte";
	$general["iLogin"] = "Je me connecte";
	$general["AllGames"] = "Vous possèdez tous les jeux présents à nos LANs.<br />Vous pouvez en proposer via le formulaire sur la droite de ce paragraphe.";

	/* Index */
	$index["stay"] = "Restez connectés !";
	$index["youtube"] = "Nous sommes sur Youtube !";
	$index["facebook"] = "Page Facebook";
	$index["twitter"] = "Page Twitter";
	$index["more"] = "En savoir plus";
	$index["new1"] = "La prochaine LAN aura lieu le vendredi 29 novembre 2013 à IN'TECH INFO : inscrivez-vous !";
	$index["new2"] = "Site en cours de construction. Retrouvez prochainement le site de l'événement de l'année PSSL entièrement fonctionnel.";
	$index["title"] = "Rejoignez un évenement unique en son genre";
	$index["subtitle"] = "Propulsé par un groupe d'étudiant passionné d'IN'TECH INFO, notre projet vous entraînera vers des sensations fortes à bout de claviers et de jeux en réseau à tout va !";
	$index["text"] = "<p>Projet de formation humaine inédit, notre équipe a pour mission d'organiser un évenement autour des <acronym title='Local Area Network'>LAN</acronym>.</p><p>Après quelques LAN amateurs dans nos locaux à Ivry-sur-Seine, nous organiserons un grand évenement E-Sport sur Paris !<br /><a href='pages.php?id=5' class='right'>Lire la suite</a></p>";
?>