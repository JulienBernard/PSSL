<!DOCTYPE html>

<html lang="fr">
<head>

	<!--	SpaceEngine Copyright (C) 2013 Julien Bernard
			SpaceEngine is a free website engine under GPL license!
			Site propulsé sous le moteur de site web libre, le SpaceEngine.	-->

	<title><?php echo DEFAULT_TITLE.$Template->getTitle(); ?></title>
	<meta charset="utf-8" />
	<meta name="google-site-verification" content="v2Ddq6qw70xR2UAFJGCzfMQhrB-gJQDQjaRlS1J2dts" /> 
	<meta name="Author" lang="fr" content="Julien BERNARD">
	<meta name="Publisher" content="Julien BERNARD">
	
	<base href="<?php echo BASE_SITE; ?>" />
	
	<?php
		// Chargement de la description
		$rt = $Template->getDescription();
		if( !empty( $rt ) )
		{
			echo '<meta name="description" content="'.$Template->getDescription().'" />
			';
		}
		else
		{
			echo '<meta name="description" content="'.DEFAULT_DESCRIPTION.'" />
			';
		}
		
		// Chargement des CSS
		foreach( $Template->getCss() as $css )
		{
			echo '<link rel="stylesheet" media="screen" href="css/'.$css.'" />
			';
		}
	
		// Chargement des scripts
		foreach( $Template->getScript() as $script )
		{
			echo '<script type="text/javascript" src="./js/'.$script.'"></script>
			';
		}
	?>

</head>

<body>	
	<header id="header">
		<nav class="top-bar">
			<ul class="title-area">
				<li class="name">
					<a href="index.php"><h1 style="display: inline-block;">PSSL</a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>

			<section class="top-bar-section" style="padding: 0 5px 0 5px;">
				<ul class="right">
					<li class="link">
						<a href="#" data-reveal-id="tournamentModal" style="background: #191919;"><?php echo $Lang->getHeaderText('tournament'); ?></a>
					</li>
					<li class="divider"></li>
					<li class="link">
						<a href="#" data-dropdown="dropFeatureMedium" style="background: #191919;"><?php echo $Lang->getHeaderText('project'); ?></a>
					</li>
					<li class="link">
						<a href="#" data-dropdown="dropFeatureMedium" style="background: #191919;"><?php echo $Lang->getHeaderText('team'); ?></a>
					</li>
					<li class="has-button">
						<a href="" class="success button" data-reveal-id="accountModal"><?php echo $Lang->getHeaderText('account'); ?></a>
					</li>
					<li class="has-button">
						<a href="logout.php" class="alert button"><?php echo $Lang->getHeaderText('logout'); ?></a>
					</li>
					<!--<li>
					<?php
						if( isset($_SESSION['SpaceEngineLanguage']) && $_SESSION['SpaceEngineLanguage'] == 'en' )
							echo '<a href="'.$_SERVER["PHP_SELF"].'?lang=fr" style="background: #191919;"><img src="./img/language.png" alt="Hey, je suis Français !" /></a>';
						else
							echo '<a href="'.$_SERVER["PHP_SELF"].'?lang=en" style="background: #191919;"><img src="./img/language.png" alt="Hey, I am English!" /></a>';
					?>
					</li>-->
				</ul>
			</section>
		</nav>
	</header>

	<ul id="dropFeatureMedium" class="small f-dropdown content" data-dropdown-content>
		<p style="color: black;"><span class="bold">Fonctionnalité à venir</span><br />Accès aux pages informatives.</p>
		<p><span class="italic">Priorité haute</span></p>
	</ul>