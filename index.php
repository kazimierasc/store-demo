<?php
	require('shop.php');
	$shop = new Shop();
	$priceRange = $shop->getColumnMinMax('price');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Store Demo</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-slider.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
	</head>
	<body>
		<img id="ajaxLoader" src="images/ajax-loader.gif"/>
		<div class="main container-fluid">
			<div class="row">
				<section class="sidebar col-md-offset-1 col-md-2">
					<h2>Filtruoti</h2>
					<?php
						foreach ($shop->features as $key => $value) {
							echo <<<EOT
							<div>
								<div class="collapsableLink">
									<a href="#">{$value}<span class="glyphicon glyphicon-menu-down"></span></a>
									<div class="line"></div>
								</div>
								<div class="featureSelections">
EOT;
							$uniqueFromColumn = $shop->getUniqueValues($key);
							foreach ($uniqueFromColumn as $iterator => $feature) {
								echo "<input class=\"featureCheckbox\" type=\"checkbox\" name=\"{$key}_{$feature}\" id=\"{$key}_{$feature}\"/><label for=\"{$key}_{$feature}\"><span></span>{$feature}</label><br>";
							}
							echo '</div></div>';
						}
					?>
					<div>
						<div class="collapsableLink">
							<a href="#">Kaina<span class="glyphicon glyphicon-menu-down"></span></a>
							<div class="line"></div>
						</div>
						<div class="featureSelections">
							<input 
								id="price" 
								class="slider" 
								data-slider-id='priceSlider' 
								type="text" 
								data-slider-handle="custom" 
								data-slider-min="<?php echo $priceRange['min'];?>" 
								data-slider-max="<?php echo $priceRange['max'];?>" 
								data-slider-value="<?php echo '['.$priceRange['min'].','.$priceRange['max'].']';?>"
							/>
						</div>
					</div>
				</section>
				<section class="mainArea col-md-8">
					
					<div class="suggestions col-md-12">
						<h1><?php echo $shop->title;?></h1>
						<?php
							$brands = $shop->getUniqueValues('brand');
							$x = 0;
							foreach ($brands as $key => $value) {
								if($x%3 == 0) {
									echo '<div class="brandCard col-md-2">';
								}
								$encodedValue = htmlentities($value);
								echo "<a href=\"#\" class=\"brandLink\" data-value=\"{$encodedValue}\">{$encodedValue}</a>";
								if($x%3 == 2 || count($brands) == $x+1) {
									echo '</div>';
								}
								$x++;
							}
						?>
					</div>
					<div class="productArea col-md-12">
						<?php
							$allProducts = $shop->getAllProducts();
							foreach ($allProducts as $key => $product) {
								echo <<<EOT
								<div class="productCard col-md-3">
									<img class="productImage" src="images/products/{$product->image}"/>
									<p class="price">&euro;{$product->price}</p>
									<p class="description">{$product->description}</p>
								</div>
EOT;
							}
						?>
					</div>
				</section>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-slider.min.js"></script>
		<script src="js/shop.js"></script>
	</body>
</html>