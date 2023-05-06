<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Un petit verre de vino</title>

		<meta charset="utf-8">
		<meta http-equiv="cache-control" content="no-cache">
		<meta name="viewport" content="width=device-width, minimum-scale=0.5, initial-scale=1.0, user-scalable=yes">

		<meta name="description" content="Un petit verre de vino">
		<meta name="author" content="Jonathan Martel (jmartel@cmaisonneuve.qc.ca)">

		<link rel="stylesheet" href="<?php echo BASEURL ?>/css/normalize.css" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo BASEURL ?>/css/base_h5bp.css" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo BASEURL ?>/css/main.css" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo BASEURL ?>/css/custom.css" type="text/css" media="screen">
		<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

		<base href="<?php echo BASEURL; ?>">
		<!--<script src="./js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->
		<script src="./js/plugins.js"></script>
		<script src="<?php echo BASEURL ?>/js/main.js"></script>
		<script src="<?php echo BASEURL ?>/js/custom.js"></script>
		<script src="<?php echo BASEURL ?>/js/boutons.js"></script>
	</head>
	<body >
		<header class="header">
			<a href="<?php echo BASEURL ?>" class="logo">
				<img src="<?php echo BASEURL ?>/images/vinos-blues-icone.svg" alt="logo.svg">
				<span class="text_logo">Un petit verre de vino?</span>
			</a>
			<i class="bx bx-menu" id="menu-icon"></i>
			<nav class="navbar">
				<a href="<?php echo BASEURL ?>?requete=accueil">Mon cellier</a>
				<a href="<?php echo BASEURL ?>?requete=ajouterNouvelleBouteilleCellier">Ajouter une bouteille au cellier</a>
				<a href="<?php echo BASEURL ?>/updateSAQ.php">Importer les bouteilles</a>
			</nav>
		</header>
		<main>