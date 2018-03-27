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


<div id="content" class="container margin-top-30">
	<?php include("mortgage-1.php");?>
</div>

<?php get_footer(); ?>
<script>
	// Click Next Change Page
	var prevNum, nextNum;
	jQuery('#next').click(function(){	
		prevNum = jQuery('#prev').attr('data-prev');
		nextNum = jQuery('#next').attr('data-next'); 
		jQuery.ajax({url: "wp-content/themes/understrap-child/mortgage-"+ nextNum +".php", 
		type: 'POST',
		success: function(result){
				jQuery("#content").html(result);
		}});
		nextNum == 5 ? nextNum = 5 : nextNum++;
		prevNum == 4 ? prevNum = 4 : prevNum++;
		jQuery('#next').attr('data-next', nextNum);
		jQuery('#prev').attr('data-prev', prevNum);
	});
	// Click Prev Change Page
	jQuery('#prev').click(function(){	
		prevNum = jQuery('#prev').attr('data-prev');
		nextNum = jQuery('#next').attr('data-next'); 
		jQuery.ajax({url: "wp-content/themes/understrap-child/mortgage-"+ prevNum +".php", 
		type: 'POST',
		success: function(result){
				jQuery("#content").html(result);
		}});
		nextNum == 2 ? nextNum = 2 : nextNum--;
		prevNum == 1 ? prevNum = 1 : prevNum--;
		jQuery('#next').attr('data-next', nextNum);
		jQuery('#prev').attr('data-prev', prevNum);
	});
</script>