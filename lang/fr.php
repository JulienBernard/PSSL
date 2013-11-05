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
	$login["text1"] = "Merci de renseigner les champs ci-dessous.";
	$login["title2"] = "Inscription";
	$login["subtitle2"] = "Je n'ai pas de compte";
	$login["text2"] = "L'inscription au site vous permettra de vous inscrire aux tournois et de renseigner les jeux que vous possédez. Vous aurez également accès à la messagere interne pour communiquer entre participants. Merci de renseigner les champs ci-dessous.<br /><br /><span class='center italic smaller'>Nous garantissons un accès protégé et chiffré de toutes les informations personnelles stockées dans notre base de données.</span>";
	$login["title3"] = "S'inscrire à la prochaine LAN";
	$login["subtitle3"] = "Date : 8 novembre 2013<br />Lieu : IN'TECH INFO, 74 bis avenue Maurice Thorez 94200 Ivry-sur-Seine (M7 Pierre et Marie Curie)";
	$login["text3"] = "En vous inscrivant, vous vous engagez sur l'honneur à être présent. Si un contre-temps vous empêche de venir, vous pourrez vous désinscrire sur cette même page plus tard. Le coût d'entrée ne sera que de 1€ si vous vous inscrivez et de 2€ sur place.<br /><br />Nous basons notre budget et nos achats selon ces inscriptions, merci de vérifier vos dispositions avant de valider !";
	$login["name"] = "Votre nom";
	$login["firstname"] = "Votre prénom";
	$login["username"] = "Votre pseudonyme";
	$login["password"] = "Votre mot de passe";
	$login["logme"] = "Se connecter";
	$login["subscribe"] = "S'inscrire";
	$login["unsubscribe"] = "Se désincrire";
	$login["IParticipate"] = "Je participe";
	$login["INotParticipate"] = "Je suis spectateur";
	$login["UoT"] = "Je certifie avoir lu et approuvé les <a href='CGU.htm'>conditions générales d'utilisation</a>.";
	
	/* Header */
	$header["project"] = "Le projet";
	$header["team"] = "L'équipe";
	$header["participate"] = "Connexion";
	$header["account"] = "Mon compte";
	$header["logout"] = "Déconnexion";
	$header["subscribe"] = "S'inscrire à la prochaine LAN du 8 novembre 2013";

	/* error */
	$error["loginSuccess"] = "Connexion réussie. <a style='color: black;' href='index.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["loginError"] = "Une erreur important est survenu, merci de contacter l'administrateur du site.";
	$error["loginError1"] = "Ce PSEUDONYME n'existe pas dans notre base de données.";
	$error["loginError2"] = "Votre PSEUDONYME doit être supérieur à 3 caractères et être inférieur à 20 caractères.<br />Votre MOT DE PASSE doit être supérieur à 3 caractères.";
	$error["loginError3"] = "Votre PSEUDONYME ou votre MOT DE PASSE ne correspondent pas.";
	$error["loginError4"] = "Une importante erreur est survenue : impossible de générer un token sécurisé !";
	$error["subscribeSuccess"] = "Inscription réussie. <a style='color: black;' href='index.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["subscribeError"] = "Une erreur important est survenu, merci de contacter l'administrateur du site.";
	$error["subscribeError1"] = "Ce PSEUDONYME existe déjà dans notre base de données. Veuillez en choisir un autre.";
	$error["subscribeError2"] = "Votre PSEUDONYME doit être supérieur à 3 caractères et être inférieur à 20 caractères.<br />Votre MOT DE PASSE doit être supérieur à 3 caractères et inférieur à 100 caractères.";
	$error["addSuccess"] = "Inscription validée. <a style='color: black;' href='subscribe.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["delSuccess"] = "Désinscription validée. <a style='color: black;' href='subscribe.php'>Si la redirection ne se fait pas, cliquez ici</a> !";
	$error["addError1"] = "Un des champs est vide.";
	$error["addError2"] = "Vous êtes déjà enregistré pour cette lan.";
	$error["addError3"] = "Ce mail n'est pas valide.";
	$error["addError4"] = "Une importante erreur est survenue : impossible de vous ajouter dans la base de données !";
	$error["suggestSuccess"] = "Le jeu a bien été proposé aux administrateurs. Merci de votre participation !<br />La validation d'un jeu (incluant la création de sa propre page) peut prendre quelque jours, merci de votre patience.";
	$error["suggestError"] = "Une erreur semble être survenue :<br />- Vous ne pouvez proposer qu'un seul jeu à la fois,<br />- Ce jeu a déjà été proposé par un autre utilisateur.";

	/* admin */
	$admin["generalAccountType"] = "vous êtes connecté en tant que";
	$admin["usersBodyTitle11"] = "Liste des pages";
	$admin["usersBodyTitle21"] = "Données";
	$admin["usersBodyTitle12"] = "Utilisateurs";
	$admin["usersBodyTitle22"] = "Données";
	$admin["pagesLinkCreate"] = "Créer une nouvelle page";
	$admin["visible"] = "Visible";
	$admin["hidden"] = "Caché";
	$admin["navLinkReturnPage"] = "Revenir à la liste des pages";	
	$admin["navLinkReturnMain"] = "Revenir à l'index";	
	
	/* General */
	$general["deconnection"] = "Vous avez été correctement déconnecté du site.";
	$general["users"] = "utilisateurs";
	$general["pages"] = "pages";
	$general["fastNavigation"] = "Navigation";
	$general["lastUpdateThe"] = "Mise à jour le";
	$general["by"] = "Par";
	$general["oupsTitle"] = "Vous ne devriez pas être là ...";
	$general["oupsText"] = " Vous n'avez pas les droits nécessaires pour accèder à cette page.<br />Merci de <a href='index.php'>retourner à la page d'accueil</a>. ";
	$general["emailValid"] = "Votre mail doit être valide ! (INACTIF POUR L'INSTANT)";
	$general["emailUse"] = "Votre mail sera uniquement utilisé pour vous prévenir des prochaines événements,<br />mais surtout pour vous demander de valider votre inscription à cette LAN !";
	
	/* Index */
	$index["stay"] = "Restez connectés !";
	$index["youtube"] = "Nous sommes sur Youtube !";
	$index["facebook"] = "Page Facebook";
	$index["twitter"] = "Page Twitter";
	$index["more"] = "En savoir plus";
	$index["new1"] = "La prochaine LAN aura lieu le vendredi 8 novembre 2013 à IN'TECH INFO : inscrivez-vous !";
	$index["new2"] = "Site en cours de construction. Retrouvez prochainement le site de l'événement de l'année PSSL entièrement fonctionnel.";
	$index["title"] = "Rejoignez un évenement unique en son genre";
	$index["subtitle"] = "Propulsé par un groupe d'étudiant passionné d'IN'TECH INFO, notre projet vous entraînera vers des sensations fortes à bout de claviers et de jeux en réseau à tout va !";
	$index["text"] = "<p>Projet de formation humaine inédit, notre équipe a pour mission d'organiser un évenement autour des <acronym title='Local Area Network'>LAN</acronym>.</p><p>Après quelques LAN amateurs dans nos locaux à Ivry-sur-Seine, nous organiserons un grand évenement E-Sport sur Paris !<br /><a href='#' class='right'>Lire la suite</a></p>";
?>