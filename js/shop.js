$(document).ready(function() {
	var sliderOptions = {
		range:true,
		formatter: function(value) {
			if(value instanceof Array) {
				return 'Nuo '+value[0]+' iki '+value[1];
			}
		}
	};
	var priceSlider = $('.slider').slider(sliderOptions);

	function closeSidebarPanel(e) {
		var element = $(e.target).parent().siblings('.featureSelections')[0];
		$(element).toggleClass('collapsed');
	};
	$('.collapsableLink a').on('click', closeSidebarPanel);

	function fillWithCheckboxes(envelope) {
		var checkboxes = $('.featureCheckbox');
		for (var i = checkboxes.length - 1; i >= 0; i--) {
			var checkbox = $(checkboxes[i]);
			if(checkbox.is(':checked')) {
				var parts = checkboxes[i].name.split('_');
				if(!envelope[parts[0]]) {
					envelope[parts[0]] = [];
				}
				envelope[parts[0]].push(parts[1]);
			}
		};
		return envelope;
	}

	function fillWithPriceSlider(envelope,priceSlider) {
		var value = priceSlider.slider('getValue');
		if(!envelope.price) {
			envelope.price = {};
		}
		envelope.price.min = value[0];
		envelope.price.max = value[1];
		return envelope;
	}



	function filterResult(e,envelope) {
		if(!envelope) {
			var envelope = {};
		}
		envelope = fillWithCheckboxes(envelope);
		envelope = fillWithPriceSlider(envelope,priceSlider);
		
		var ajaxLoader = $('#ajaxLoader');
	
		function refreshPage(data) {
			console.log(data);
			var newProducts = $(document.createElement('div'));
			newProducts.addClass('productArea col-md-12');
			for (var i = data.length - 1; i >= 0; i--) {
				var product = $(document.createElement('div'));
				product.addClass('productCard col-md-3');
				product.append('<img class="productImage" src="images/products/'+data[i].image+'"/>');
				product.append('<p class="price">&euro;'+data[i].price+'</p>');
				product.append('<p class="description">'+data[i].description+'</p>');
				newProducts.append(product);
			};
			if(data.length === 0) {
				newProducts.append('<h2>Atleiskite, prekių pagal šiuos kriterijus neturime.</h2>');
			}
			$('.productArea').remove();
			$('.mainArea').append(newProducts);
			ajaxLoader.toggleClass('visible');
		}
		function ajaxError(a,b,c) {
			ajaxLoader.toggleClass('visible');
		}

		var settings = {
			url:'data.php',
			data:envelope,
			dataType:'json',
			error:ajaxError,
			method:'GET',
			success:refreshPage
		};
		ajaxLoader.toggleClass('visible');
		$.ajax(settings);
	}

	function selectBrand(e) {
		var link = $(e.target);
		link.toggleClass('active');
		if(link.hasClass('active')) {
			var brandName = link.attr('data-value');
			filterResult(e,{"brand":[brandName]});
		} else {
			filterResult(e);
		}
	}

	$('.featureCheckbox').on('change', filterResult);
	$('.slider').on('change', filterResult);
	$('.brandLink').on('click', selectBrand);
});