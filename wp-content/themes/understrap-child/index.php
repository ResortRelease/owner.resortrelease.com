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
<div id="splash" class="container">
	<div class="row">
		<div class="col-12">
			<h1>Choose your Current Timeshare Ownership</h1>
		</div>
		<div id="mortgage" class="col-6">
			<a href="mortgage">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/icon-mortgage.png" alt="Mortgage" alt="">
			</a>
			<h2>Mortgage</h2>
			<p>short description for mortgage</p>
	</div>
		<div id="transfer" class="col-6">
			<a href="#">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/icons/icon-transfer.png" alt="Transfer" alt="">
			</a>
			<h2>Transfer</h2>
			<p>short description for transfer</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>