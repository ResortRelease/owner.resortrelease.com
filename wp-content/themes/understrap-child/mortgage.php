<?php
/**
 * Template Name: Mortgage
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
<div id="breadcrumbs"><!-- Breadcrumbs -->
	<nav aria-label="breadcrumb" class="container">
		<ol class="breadcrumb">
			<div class="breadcrumb-more" ><i class="fa fa-ellipsis-h"></i></div>
			<li class="breadcrumb-item 1 page-label" data-page="1">1</li>
			<li class="breadcrumb-item 2 page-label" data-page="2">2</li>
			<li class="breadcrumb-item 3 page-label" data-page="3">3</li>
			<li class="breadcrumb-item 4 page-label" data-page="4">4</li>
			<li class="breadcrumb-item 5 page-label" data-page="5">5</li>
			<li class="breadcrumb-item 6 page-label" data-page="6">6</li>
		</ol>
	</nav>
</div><!-- End Breadcrumbs -->
<div id="content">
	<?php include("mortgage-1.php");?>
</div>
<?php get_footer(); ?>
<script>
	var type = "Mortgage";
	// Load Current Page
	jQuery(document).ready(function(){
		var lastPage = window.location.hash;
		lastPage == "" ? lastPage = 1 : lastPage = lastPage.replace("#", "");
		ajaxCall(lastPage);
	})
	// Click .page to Change Page
	jQuery('.page-label').on('click', function(e){
		var page = jQuery(this).attr('data-page');
		ajaxCall(page);
		e.stopImmediatePropagation();
    return false;
	});
	function ajaxCall(currentPage){
		jQuery.ajax({url: "../wp-content/themes/understrap-child/mortgage-"+ currentPage +".php", 
		type: 'GET',
		success: function(result){
				jQuery("#content").html(result);
				location.hash = currentPage;
				window.scrollTo(0, 0);
			},
      error: function(){}
    });
	}
	jQuery('.breadcrumb-more').on('click', function(){
		jQuery(this).toggle('slow');
		jQuery('.breadcrumb-item').toggle('slow');
	});
</script>
<script>
	// Magnify Function, Minified 
	function magnify(e,t){var n,i,o,a,s;function d(e){var d,g,r,f,l,p,u;e.preventDefault(),p=0,u=0,f=(f=e)||window.event,l=n.getBoundingClientRect(),p=f.pageX-l.left,u=f.pageY-l.top,p-=window.pageXOffset,u-=window.pageYOffset,r=(d={x:p,y:u}).y,(g=d.x)>n.width-o/t&&(g=n.width-o/t),g<o/t&&(g=o/t),r>n.height-a/t&&(r=n.height-a/t),r<a/t&&(r=a/t),i.style.left=g-o+"px",i.style.top=r-a+"px",i.style.backgroundPosition="-"+(g*t-o+s)+"px -"+(r*t-a+s)+"px"}n=document.getElementById(e),(i=document.createElement("DIV")).setAttribute("class","img-magnifier-glass"),n.parentElement.insertBefore(i,n),i.style.backgroundImage="url('"+n.src+"')",i.style.backgroundRepeat="no-repeat",i.style.backgroundSize=n.width*t+"px "+n.height*t+"px",s=3,o=i.offsetWidth/2,a=i.offsetHeight/2,i.addEventListener("mousemove",d),n.addEventListener("mousemove",d),i.addEventListener("touchmove",d),n.addEventListener("touchmove",d)};
	jQuery(document).keypress(function(e) {
    if(e.which == 13) {
        total();
    }
	});
	// Calculator Function Minified
	function addCommas(a){for(var e=(a+="").split("."),t=e[0],s=e.length>1?"."+e[1]:"",r=/(\d+)(\d{3})/;r.test(t);)t=t.replace(r,"$1,$2");return t+s}function total(){jQuery(function(a){var e=a("#x-CAO"),t=a("#x-MGT"),s=a("#x-10Years"),r=a("#x-20Years"),l=a("#x-30Years"),o=a("#error-msg"),d=!0,i=parseFloat(a("#in-MPA").val()),m=parseFloat(a("#in-OP").val()),n=parseFloat(a("#in-DP").val()),c=0;if(i){m=isNaN(m)?0:m,n=isNaN(n)?0:n;var p=12*i,v=i*m+n;e.html("$"+addCommas(p.toFixed(0))),t.removeClass("blue").addClass("red").html("$"+addCommas(v.toFixed(0))),o.html("&nbsp;").attr("data-bg","false"),a("html, body").animate({scrollTop:a("#outputs").offset().top-220},800)}var h=a("#frequency").val(),u=parseFloat(a("#mFees").val())*h,x=parseFloat(a("#increase").val())/100,f=parseFloat(a("#rci").val()),C=parseFloat(a("#ecd").val());c=0;function F(e){var t,s,r="<h1>$"+addCommas(e)+"</h1>Expected Debt To Resort";a("#show-price-all").show().find(".thirtyYears").html(r),t="showPrice",s=r,document.cookie=t+"="+s+"; path=/"}f=isNaN(f)?0:f,C=isNaN(C)?0:C,x=isNaN(x)?0:x,isNaN(u)&&(d=!1),1==d&&(v=isNaN(v)?0:v,c=v+u+f+C),function(){if(1==d){var a=u,t=f,o=C,i=c;p=p+u+f+C,e.html("$"+addCommas(p.toFixed(0)));for(var m=0;m<29;m++){var n=a+a*x,v=t+t*x,h=o+o*x;i+=n+v+h,8==m&&(s.html(""),s.prepend("$"+addCommas(i.toFixed(2))+"<div class='small-text text-center'>10 years</div>"),e.html()),18==m&&(r.html(""),r.prepend("$"+addCommas(i.toFixed(2))+"<div class='small-text text-center'>20 years</div>")),28==m&&(l.html(""),l.removeClass("blue").addClass("red").prepend("$"+addCommas(i.toFixed(2))+"<div class='small-text text-center red'>30 years</div>"),F(i.toFixed(2))),a=n,t=v,o=h}}}()})}jQuery(function(a){a("input").keypress(function(e){return!(e.which&&13==e.which||e.keyCode&&13==e.keyCode)||(a("#calculate-btn").click(),!1)})});

	// Cookie Script
	// All this code was backed up from footer-js.js
	// this is the minified Jquery.cookie ext script minified
	!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?a(require("jquery")):a(jQuery)}(function(a){function b(a){return h.raw?a:encodeURIComponent(a)}function c(a){return h.raw?a:decodeURIComponent(a)}function d(a){return b(h.json?JSON.stringify(a):String(a))}function e(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return a=decodeURIComponent(a.replace(g," ")),h.json?JSON.parse(a):a}catch(b){}}function f(b,c){var d=h.raw?b:e(b);return a.isFunction(c)?c(d):d}var g=/\+/g,h=a.cookie=function(e,g,i){if(void 0!==g&&!a.isFunction(g)){if(i=a.extend({},h.defaults,i),"number"==typeof i.expires){var j=i.expires,k=i.expires=new Date;k.setTime(+k+864e5*j)}return document.cookie=[b(e),"=",d(g),i.expires?"; expires="+i.expires.toUTCString():"",i.path?"; path="+i.path:"",i.domain?"; domain="+i.domain:"",i.secure?"; secure":""].join("")}for(var l=e?void 0:{},m=document.cookie?document.cookie.split("; "):[],n=0,o=m.length;o>n;n++){var p=m[n].split("="),q=c(p.shift()),r=p.join("=");if(e&&e===q){l=f(r,g);break}e||void 0===(r=f(r))||(l[q]=r)}return l};h.defaults={},a.removeCookie=function(b,c){return void 0===a.cookie(b)?!1:(a.cookie(b,"",a.extend({},c,{expires:-1})),!a.cookie(b))}});
	function showPriceBanner() {
		if(jQuery.cookie('showPrice') && jQuery.cookie('price') != ''){
			jQuery('#show-price-all').show().find(".thirtyYears").html(jQuery.cookie('showPrice'));
		}
	}showPriceBanner();
</script>