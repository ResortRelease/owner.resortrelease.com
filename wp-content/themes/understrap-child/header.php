<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-103418401-4"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-103418401-4');
	</script>
	<!-- End - Google Analytics -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--  Main Nav -->
<div class="container-fluid bg-blue text-center main-nav">
	<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/logos/RR-logo.svg" alt="Resort Release Logo" class="logo margin-auto">
</div>

<!--  Logos -->
<div id="accreditation-new-row" class="container-fluid text-center">
	<div id="header-credits">
		<div>
				<a href="https://www.resortrelease.com/about" rel="noopener">
				<img id="header-years" class="header-accreditation img-fluid" src="<?php bloginfo('stylesheet_directory'); ?>/assets/logos/badges/years-in-business.svg" type="image/svg+xml" alt="Resort Release 6 Years" style="width: 70px; height: auto;"/>
				</a>
				<a href="http://www.bbb.org/chicago/business-reviews/timeshare-advocates/american-resource-management-group-llc-in-rockford-il-88596110/" target="_blank" rel="noopener">
						<img id="header-bbb" class="header-accreditation img-fluid" src="<?php bloginfo('stylesheet_directory'); ?>/assets/logos/badges/Resort-Release-BBB.jpg" type="image/svg+xml" alt="Resort Release BBB" style="width: 150px; height: auto;"/>
				</a>
				<a href="http://web.rockfordchamber.com/Real-Estate,-Management/Resort-Release-3609" target="_blank" rel="noopener">
						<img id="header-rockford" class="header-accreditation img-fluid" src="<?php bloginfo('stylesheet_directory'); ?>/assets/logos/badges/rcc.png" type="image/svg+xml" alt="Resort Release Rockford" style="width: 150px; height: auto;"/>
				</a>
		</div>
	</div>
</div>