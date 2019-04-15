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
      <li class="breadcrumb-item 6 page-label" data-page="7">7</li>
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
var type = "Mortgage";
jQuery(function($) {
  $(document).on('keypress',function(e) {
    if(e.which == 13) {
      total();
    }
  });
});
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
  function total(){
    jQuery(function($){
      // totals
      var x10 = $("#x10"),
          x15 = $("#x15"),
          x20 = $("#x20"),
					x25 = $("#x25"),
					x50 = $("#x50"),
					x99 = $("#x99"),
          errors = $("#error_msg");
      var flag = true;
      // User Inputs
      var freq = $("#frequency").val(),
          mFees = parseFloat($("#mFees").val()),
          fees = parseFloat($("#mFees").val()) * freq,
          inc = parseFloat($("#increase").val()) / 100,
          membership = parseFloat($("#rci").val()),
          exchange = parseFloat($("#ecd").val())
      var mPay = parseFloat($('#in-MPA').val()) , ogPay = parseFloat($('#in-OP').val()), dPay = parseFloat($('#in-DP').val());
      var initialCalc = 0;
      var mortgageTotal;
      var annualMort;
      // Validate the form
      function validateForm() {
        isNaN(membership) ? membership = 0 : membership = membership;
        isNaN(exchange) ? exchange = 0 : exchange = exchange;
        isNaN(inc) ? inc = 0 : inc = inc;
        isNaN(fees) ? fees = 0 : fees = fees;
        isNaN(mPay) ? mPay = 0 : mPay = mPay;
        isNaN(ogPay) ? ogPay = 0 : ogPay = ogPay;
        isNaN(dPay) ? dPay = 0 : dPay = dPay;
        isNaN(mFees) ? mFees = 0 : mFees = mFees;
        isNaN(membership) ? membership = 0 : membership = membership;
        isNaN(exchange) ? exchange = 0 : exchange = exchange;
        // if (isNaN(fees)) {
        //   errors.html("Payment amount missing!");
        //   flag = false;
        // }else if (inc == 0){
        //   errors.html("No annual increase")
        // }else {
        //   errors.html("");
        // }
      }validateForm();

      // Calculate initial
      function initial(){
        if(flag == true) {
          initialCalc = (mPay * 12) + fees + membership + exchange;
          
          var totalInitial = $("#x-CAO");
          var mortgageTotalOut = $("#x-MGT");
          totalInitial.html("$"+addCommas(initialCalc.toFixed(0)));
          mortgageTotal = (mPay * ogPay) + dPay;
          mortgageTotalOut.html("$"+addCommas(mortgageTotal.toFixed(0)));
          
        }
      }initial();
      // Calculate over the years
      function calcYears(){
        if(flag == true) {
          var currentFee = mFees * freq;
          var nextFee, 
              totalFees = currentFee;
          var currentMem = membership;
          var currentExc = exchange;
          var totalDues, totalAdd = currentMem + currentExc, nextMem, nextExc;
          // Loop to calculate
          var yearsToPay = ogPay / 12; // if 120 payments then 10 years
          var terms = ogPay / 12;
          for(var i = 0; i < 100; i++){
            // Pay Mortgage Only for the Term.
            if( i <= terms ){
              annualMort = mPay * 12;
            }else{
              annualMort = 0;
            }
            // First Year Obligation.
            if( i == 0 ){
              totalFees = dPay;
            } else {
              totalFees += currentFee + annualMort + currentMem + currentExc;
            }
            
            if( mFees == 0 ){
              totalFees = mortgageTotal;
            }
            nextFee = currentFee + (currentFee * inc); //increase current Maintenance Fees
            nextMem = currentMem + (currentMem * inc); //increase current Membership Dues
            nextExc = currentExc + (currentExc * inc); //increase current Exchange Dues
            totalDues = currentMem + currentExc;
            currentMem = nextMem;
            currentExc = nextExc;
            currentFee = nextFee;
            // 8 13 18 23 48 97 = 10 15 20 25 50 99 years respectively toFixed(2)
            if(i == 10){ 
							x10.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>10 years</div>").css("display", "block"); 
            }
            if(i == 20){ 
              x15.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>20 years</div>").css("display", "block"); 
						}
						if(i == 30){ 
              x20.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>30 years</div>").css("display", "block"); 
						}
						if(i == 40){ 
              x25.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>40 years</div>").css("display", "block"); 
						}
						if(i == 50){ 
              x50.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>50 years</div>").css("display", "block"); 
            }
            if(i == 99){ 
							x99.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>99 years</div>").css("display", "block");
							x99.removeClass('blue').addClass('red');
							jQuery.cookie('showPrice', '$'+addCommas(totalFees.toFixed(2)));
              showPriceBanner();
            }
          };
        }
      }calcYears();
      function showPrice(sum){
        $("#show-price").show().find(".thirtyYears").html("<h1>$"+addCommas(sum)+"</h1>Expected Debt To Resort");
      }
    });
  }
</script>
<script>
	// Magnify Function, Minified 
	//function magnify(e,t){var n,i,o,a,s;function d(e){var d,g,r,f,l,p,u;e.preventDefault(),p=0,u=0,f=(f=e)||window.event,l=n.getBoundingClientRect(),p=f.pageX-l.left,u=f.pageY-l.top,p-=window.pageXOffset,u-=window.pageYOffset,r=(d={x:p,y:u}).y,(g=d.x)>n.width-o/t&&(g=n.width-o/t),g<o/t&&(g=o/t),r>n.height-a/t&&(r=n.height-a/t),r<a/t&&(r=a/t),i.style.left=g-o+"px",i.style.top=r-a+"px",i.style.backgroundPosition="-"+(g*t-o+s)+"px -"+(r*t-a+s)+"px"}n=document.getElementById(e),(i=document.createElement("DIV")).setAttribute("class","img-magnifier-glass"),n.parentElement.insertBefore(i,n),i.style.backgroundImage="url('"+n.src+"')",i.style.backgroundRepeat="no-repeat",i.style.backgroundSize=n.width*t+"px "+n.height*t+"px",s=3,o=i.offsetWidth/2,a=i.offsetHeight/2,i.addEventListener("mousemove",d),n.addEventListener("mousemove",d),i.addEventListener("touchmove",d),n.addEventListener("touchmove",d)};
	// jQuery(document).keypress(function(e) {
  //   if(e.which == 13) {
  //       total();
  //   }
	// });
	// // Calculator Function Minified
	// function addCommas(a){for(var e=(a+="").split("."),t=e[0],s=e.length>1?"."+e[1]:"",r=/(\d+)(\d{3})/;r.test(t);)t=t.replace(r,"$1,$2");return t+s}function total(){jQuery(function(a){var e=a("#x-CAO"),t=a("#x-MGT"),s=a("#x-10Years"),r=a("#x-20Years"),l=a("#x-30Years"),o=a("#error-msg"),d=!0,i=parseFloat(a("#in-MPA").val()),m=parseFloat(a("#in-OP").val()),n=parseFloat(a("#in-DP").val()),c=0;if(i){m=isNaN(m)?0:m,n=isNaN(n)?0:n;var p=12*i,v=i*m+n;e.html("$"+addCommas(p.toFixed(0))),t.removeClass("blue").addClass("red").html("$"+addCommas(v.toFixed(0))),o.html("&nbsp;").attr("data-bg","false"),a("html, body").animate({scrollTop:a("#outputs").offset().top-220},800)}var h=a("#frequency").val(),u=parseFloat(a("#mFees").val())*h,x=parseFloat(a("#increase").val())/100,f=parseFloat(a("#rci").val()),C=parseFloat(a("#ecd").val());c=0;function F(e){var t,s,r="<h1>$"+addCommas(e)+"</h1>Expected Debt To Resort";a("#show-price-all").show().find(".thirtyYears").html(r),t="showPrice",s=r,document.cookie=t+"="+s+"; path=/"}f=isNaN(f)?0:f,C=isNaN(C)?0:C,x=isNaN(x)?0:x,isNaN(u)&&(d=!1),1==d&&(v=isNaN(v)?0:v,c=v+u+f+C),function(){if(1==d){var a=u,t=f,o=C,i=c;p=p+u+f+C,e.html("$"+addCommas(p.toFixed(0)));for(var m=0;m<29;m++){var n=a+a*x,v=t+t*x,h=o+o*x;i+=n+v+h,8==m&&(s.html(""),s.prepend("$"+addCommas(i.toFixed(2))+"<div class='small-text text-center'>10 years</div>"),e.html()),18==m&&(r.html(""),r.prepend("$"+addCommas(i.toFixed(2))+"<div class='small-text text-center'>20 years</div>")),28==m&&(l.html(""),l.removeClass("blue").addClass("red").prepend("$"+addCommas(i.toFixed(2))+"<div class='small-text text-center red'>30 years</div>"),F(i.toFixed(2))),a=n,t=v,o=h}}}()})}jQuery(function(a){a("input").keypress(function(e){return!(e.which&&13==e.which||e.keyCode&&13==e.keyCode)||(a("#calculate-btn").click(),!1)})});

	// // Cookie Script
	// // All this code was backed up from footer-js.js
	// // this is the minified Jquery.cookie ext script minified
	!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?a(require("jquery")):a(jQuery)}(function(a){function b(a){return h.raw?a:encodeURIComponent(a)}function c(a){return h.raw?a:decodeURIComponent(a)}function d(a){return b(h.json?JSON.stringify(a):String(a))}function e(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return a=decodeURIComponent(a.replace(g," ")),h.json?JSON.parse(a):a}catch(b){}}function f(b,c){var d=h.raw?b:e(b);return a.isFunction(c)?c(d):d}var g=/\+/g,h=a.cookie=function(e,g,i){if(void 0!==g&&!a.isFunction(g)){if(i=a.extend({},h.defaults,i),"number"==typeof i.expires){var j=i.expires,k=i.expires=new Date;k.setTime(+k+864e5*j)}return document.cookie=[b(e),"=",d(g),i.expires?"; expires="+i.expires.toUTCString():"",i.path?"; path="+i.path:"",i.domain?"; domain="+i.domain:"",i.secure?"; secure":""].join("")}for(var l=e?void 0:{},m=document.cookie?document.cookie.split("; "):[],n=0,o=m.length;o>n;n++){var p=m[n].split("="),q=c(p.shift()),r=p.join("=");if(e&&e===q){l=f(r,g);break}e||void 0===(r=f(r))||(l[q]=r)}return l};h.defaults={},a.removeCookie=function(b,c){return void 0===a.cookie(b)?!1:(a.cookie(b,"",a.extend({},c,{expires:-1})),!a.cookie(b))}});
	function showPriceBanner() {
		if(jQuery.cookie('showPrice') && jQuery.cookie('price') != ''){
			jQuery('#show-price-all').show().find(".thirtyYears").html(jQuery.cookie('showPrice') + "<br><span>Total owed over 99 years</span>");
		}
	}showPriceBanner();
</script>