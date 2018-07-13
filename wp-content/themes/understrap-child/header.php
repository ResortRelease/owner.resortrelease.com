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
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PMJM9BD');</script>
<!-- End Google Tag Manager -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--  Main Nav -->
<?php if (!is_page( array( 'login', 'user dashboard') )) {?>
<div class="container-fluid bg-blue text-center main-nav">
	<a href="https://www.resortrelease.com" rel="noopener"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/logos/RR-logo.svg" alt="Resort Release Logo" class="logo margin-auto"></a>
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
<?php } ?>