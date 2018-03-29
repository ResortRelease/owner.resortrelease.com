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