<?php
	require('shop.php');
	$shop = new Shop();
	header('Content-Type','application/json');
	echo json_encode($shop->getParticularProducts($_GET));