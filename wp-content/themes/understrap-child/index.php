<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>

<div id="content">
	<?php include("mortgage-1.php");?>
</div>

<?php get_footer(); ?>
<script>
	// Click Next Change Page
	// To be removed
	jQuery(document).ready(function(){
		jQuery.ajax({url: "wp-content/themes/understrap-child/mortgage-"+ 2 +".php", 
		type: 'POST',
		success: function(result, textStatus, jqXHR){
				jQuery("#content").html(result);
		}});
	})


	var cp = jQuery('.current-page').attr('data-page');
	cp = parseInt(cp);
	jQuery('#next').click(function(){
		cp == 5 ? cp = 5 : cp = cp + 1;
		jQuery.ajax({url: "wp-content/themes/understrap-child/mortgage-"+ cp +".php", 
		type: 'POST',
		success: function(result, textStatus, jqXHR){
				jQuery("#content").html(result);
		}});
	});
	// Click Prev Change Page
	jQuery('#prev').click(function(){
		cp == 1 ? cp = 1 : cp = cp - 1;	
		jQuery.ajax({url: "wp-content/themes/understrap-child/mortgage-"+ cp +".php", 
		type: 'POST',
		success: function(result){
				jQuery("#content").html(result);
		}});
	});
</script>
<script>
	// Magnify Function
	function magnify(imgID, zoom) {
		var img, glass, w, h, bw;
		img = document.getElementById(imgID);
		/*create magnifier glass:*/
		glass = document.createElement("DIV");
		glass.setAttribute("class", "img-magnifier-glass");
		/*insert magnifier glass:*/
		img.parentElement.insertBefore(glass, img);
		/*set background properties for the magnifier glass:*/
		glass.style.backgroundImage = "url('" + img.src + "')";
		glass.style.backgroundRepeat = "no-repeat";
		glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
		bw = 3;
		w = glass.offsetWidth / 2;
		h = glass.offsetHeight / 2;
		/*execute a function when someone moves the magnifier glass over the image:*/
		glass.addEventListener("mousemove", moveMagnifier);
		img.addEventListener("mousemove", moveMagnifier);
		/*and also for touch screens:*/
		glass.addEventListener("touchmove", moveMagnifier);
		img.addEventListener("touchmove", moveMagnifier);
		function moveMagnifier(e) {
			var pos, x, y;
			/*prevent any other actions that may occur when moving over the image*/
			e.preventDefault();
			/*get the cursor's x and y positions:*/
			pos = getCursorPos(e);
			x = pos.x;
			y = pos.y;
			/*prevent the magnifier glass from being positioned outside the image:*/
			if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
			if (x < w / zoom) {x = w / zoom;}
			if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
			if (y < h / zoom) {y = h / zoom;}
			/*set the position of the magnifier glass:*/
			glass.style.left = (x - w) + "px";
			glass.style.top = (y - h) + "px";
			/*display what the magnifier glass "sees":*/
			glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
		}
		function getCursorPos(e) {
			var a, x = 0, y = 0;
			e = e || window.event;
			/*get the x and y positions of the image:*/
			a = img.getBoundingClientRect();
			/*calculate the cursor's x and y coordinates, relative to the image:*/
			x = e.pageX - a.left;
			y = e.pageY - a.top;
			/*consider any page scrolling:*/
			x = x - window.pageXOffset;
			y = y - window.pageYOffset;
			return {x : x, y : y};
		}
	}

	// Calculator Function
	jQuery(function($){
			$("input").keypress(function (e) {
					if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
							$('#calculate-btn').click();
							return false;
					} else {
							return true;
					}
			});
		});
		// Add Commas
		function addCommas(nStr) {
			nStr += "";
			var x = nStr.split(".");
			var x1 = x[0];
			var x2 = x.length > 1 ? "." + x[1] : "";
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, "$1" + "," + "$2");
			}
			return x1 + x2;
		}
		// Variables
		// Outputs
		function total(){
			jQuery(function($){
				// outputs
				var cao = $("#x-CAO"), // Current Annual Obligations 
						mgt = $("#x-MGT"), // Mortgage Grand Total.
						totalTenYears = $("#x-10Years"), // 10 Years.
						totalTwentyYears = $("#x-20Years"), // 20 Years.
						totalThirtyYears = $("#x-30Years"), // 30 Years.
						errors = $("#error-msg"); // Errors.
				var flag = true;
				// User Inputs
				var inMPA = parseFloat($("#in-MPA").val()),
						op = parseFloat($("#in-OP").val()),
						dp = parseFloat($("#in-DP").val());
				var initialCalc = 0;
				// Button Click
				// Calculating Current Annual Obligations & Mortgage Grand Total.
				if (inMPA){
					// Check for value
					isNaN(op) ? op = 0 : op = op;
					isNaN(dp) ? dp = 0 : dp = dp;
					var myCAO = inMPA * 12,
							myMGT = inMPA * op + dp;
					cao.html("$" + addCommas(myCAO.toFixed(0)));
					mgt.removeClass("blue").addClass("red").html("$" + addCommas(myMGT.toFixed(0)));
					errors.html("&nbsp;").attr("data-bg", "false");
					$('html, body').animate({
						scrollTop: $("#outputs").offset().top-220
					}, 800);
				}
				// Calculating Maintenance Fees.
				var freq = $("#frequency").val(),
						fees = parseFloat($("#mFees").val()) * freq,
						inc = parseFloat($("#increase").val()) / 100,
						membership = parseFloat($("#rci").val()),
						exchange = parseFloat($("#ecd").val()),
						initialCalc = 0;
				// Validate the form
				function validateForm() {
					isNaN(membership) ? membership = 0 : membership = membership;
					isNaN(exchange) ? exchange = 0 : exchange = exchange;
					isNaN(inc) ? inc = 0 : inc = inc;
					if (isNaN(fees)) {
						// errors.html("Payment amount missing!").attr("data-bg", "true");
						flag = false;
					}else if (inc == 0){
						// errors.html("No annual increase").attr("data-bg", "true");
					}else {
						// errors.html("&nbsp;").attr("data-bg", "false");
					}
				}validateForm();
				// Calculate initial
				function initial(){
					if(flag == true) {
						isNaN(myMGT) ? myMGT = 0 : myMGT = myMGT;
						initialCalc = myMGT + fees + membership + exchange;
					}
				}initial();
				// Calculate over the years
				function calcYears(){
					if(flag == true) {
						var a = fees,
								b = membership,
								c = exchange;
						var sumTotal = initialCalc;            
						myCAO = myCAO + fees + membership + exchange;          
						cao.html("$" + addCommas(myCAO.toFixed(0)));     
						// Loop to calculate
						for(var i = 0; i < 29; i++){
							// compound is initialCalc + every loop sum 
							var calcA = a + (a * inc),
									calcB = b + (b * inc),
									calcC = c + (c * inc);
							var total = calcA + calcB + calcC;
							sumTotal += total;
							
							// 8 18 28 = 10 20 30 years respectively toFixed(2)
							if(i == 8){
								totalTenYears.html("");
								totalTenYears.prepend("$"+addCommas(sumTotal.toFixed(2)) + "<div class='small-text text-center'>10 years</div>");
								cao.html();
							}
							if(i == 18){
								totalTwentyYears.html("");
								totalTwentyYears.prepend("$"+addCommas(sumTotal.toFixed(2)) + "<div class='small-text text-center'>20 years</div>"); 
							}
							if(i == 28){ 
								totalThirtyYears.html("");
								totalThirtyYears.removeClass("blue").addClass("red").prepend("$"+addCommas(sumTotal.toFixed(2)) + "<div class='small-text text-center red'>30 years</div>");
								showPrice(sumTotal.toFixed(2));
							}
							a = calcA
							b = calcB
							c = calcC
						};
					}
				}calcYears();
				// Show price banner
				function showPrice(sum){
					var showPrice = '<h1>$'+addCommas(sum)+'</h1>Expected Debt To Resort';
					$("#show-price-all").show().find(".thirtyYears").html(showPrice);
					createCookie('showPrice',showPrice);
					function createCookie(name,value) {
						document.cookie = name + "=" + value + "; path=/";
					}
				};
			});
		};


		// Cookie Script
		/*! jquery.cookie v1.4.1 | MIT */
	// All this code was backed up from footer-js.js
	// this is the minified Jquery.cookie ext script minified
	!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?a(require("jquery")):a(jQuery)}(function(a){function b(a){return h.raw?a:encodeURIComponent(a)}function c(a){return h.raw?a:decodeURIComponent(a)}function d(a){return b(h.json?JSON.stringify(a):String(a))}function e(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return a=decodeURIComponent(a.replace(g," ")),h.json?JSON.parse(a):a}catch(b){}}function f(b,c){var d=h.raw?b:e(b);return a.isFunction(c)?c(d):d}var g=/\+/g,h=a.cookie=function(e,g,i){if(void 0!==g&&!a.isFunction(g)){if(i=a.extend({},h.defaults,i),"number"==typeof i.expires){var j=i.expires,k=i.expires=new Date;k.setTime(+k+864e5*j)}return document.cookie=[b(e),"=",d(g),i.expires?"; expires="+i.expires.toUTCString():"",i.path?"; path="+i.path:"",i.domain?"; domain="+i.domain:"",i.secure?"; secure":""].join("")}for(var l=e?void 0:{},m=document.cookie?document.cookie.split("; "):[],n=0,o=m.length;o>n;n++){var p=m[n].split("="),q=c(p.shift()),r=p.join("=");if(e&&e===q){l=f(r,g);break}e||void 0===(r=f(r))||(l[q]=r)}return l};h.defaults={},a.removeCookie=function(b,c){return void 0===a.cookie(b)?!1:(a.cookie(b,"",a.extend({},c,{expires:-1})),!a.cookie(b))}});
	function showPriceBanner() {
		if(jQuery.cookie('showPrice') && jQuery.cookie('price') != ''){
			jQuery('#show-price-all').show().find(".thirtyYears").html(jQuery.cookie('showPrice'));
		}
	}showPriceBanner();
</script>