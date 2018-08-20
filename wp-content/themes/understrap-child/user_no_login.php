<?php
/**
 * Template Name: No-login Splash
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
<style>
  .hero, .signup, .fees, .testimonials {
    position: relative;
    height: auto;
    padding: 80px 0;
  }
  .signup h1, .signup h3, .signup span, .signup i {
    color: #898989;
    text-shadow: 1px 1px 0 rgba(255,255,255,0.5)!important; 
  }
  .signup .mautic-form{
    padding: 0 5px;
  }
  .signup {
    background: url('../wp-content/themes/understrap-child/assets/bg.png');

  }
  body {
    background: #FAFAFA;
  }
  #welcome .background {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    background: url('../wp-content/themes/understrap-child/assets/background_couple.jpg');
    background-size: cover;
    background-position: right;
    z-index: -1;
  }
  #welcome .overlay {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background: #084a79;
    opacity: 0.7;
    z-index: -1;
  }
  h1 {
    font-size: 7vmin;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    font-family: 'Verdana';
  }
  h3 {
    font-size: 5vmin;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    font-family: 'Verdana';
    margin-top: 5px;
  }
  #welcome .hero .content h1 {
    color: white;
  }
  .separator * {
    display: inline-block;
  }
  .separator .sep {
  } 
  .separator .line {
    width: 50px;
    height: 1px;
    background: #ACC5D6;
  }
  .separator .rr img {
    width: 40px;
    margin-top: 16px;
  }
  .mautic-form{
    padding: 10px!important;
    background: linear-gradient(white 28%, transparent 58%);
    border-radius: 3px;
  }
  .fees {
    box-shadow: inset 0px 5px 10px rgba(0, 0, 0, 0.09);
    
  }
  .fees .f, .fees .g {
    color: #898989;
    text-shadow: 1px 1px 0 rgba(255,255,255,0.5)!important; 
  }
  .pricely-label {
    display: block;
    font-size: 13px;
    letter-spacing: 1px;
    margin: 0 auto 0px;
    text-transform: uppercase;
	}
	.pricely-figure {
    padding: 20px 0 20px;
    position: relative;
	}
	.pricely-chart-two img {
		position: absolute;
    max-width: 70px;
    left: -14px;
    top: -30px;
	}
	.pricely-currency {
    display: inline-block;
    font-size: 20px;
    font-weight: 400;
    position: absolute;
		top: 30px;
		font-family: sans-serif;
	}
	.pricely-amount {
    display: inline-block;
    font-size: 70px;
    line-height: 70px;
		padding: 0 0 0 17px;
		font-family: sans-serif;
		position: relative;		
	}	
	.pricely-amount:before{
		content: "$";
    font-size: 2rem;
    position: absolute;
    left: 0px;
    top: -20px;
	}
	.pricely-foreword {
    display: block;
    font-family: 'Karla', sans-serif;
    font-size: 14px;
    font-style: italic;
    padding: 0;
	}
	@media screen and (max-width: 500px) {
		.pricely-amount {
			font-size: 45px;
		}	
		.pricely-amount:before{
			font-size: 25px;
		}
  }
  .special_amp {
    color: #f3b205;
    font-family: "Baskerville", "Palatino Linotype", "Palatino", "Times New Roman", serif;
    font-style: italic;
    font-size: 1.3em;
    line-height: 0.5em;
    font-weight: normal;
  }
  .testimonials{
    background: linear-gradient(rgba(8, 74, 121, 0.6), rgba(8, 74, 121, 0.88)), url('../wp-content/themes/understrap-child/assets/paradise.jpg');
    background-size: cover;
    background-position: right;
    color: white;
  }
  .testimonials h1 {
    font-weight: 600;
  }
  .video-container{
    cursor: pointer;
  }
  .video-container:hover .fa-youtube-play{
    transform: scale(1.2);
    transition: .5s;
  }
  .fa-youtube-play{
    position: absolute;
    left:0;right:0;
    margin: 0 auto;
    top: 43%;
    font-size: 3rem;
    color: #FF000B;
    max-width: 50px;
    background: radial-gradient(white 11%, transparent, transparent);
    transition: .5s;    
  }
  .youtube img {
    position:absolute;
    top:0;
    left: 0;
  }
  .fa-star{
    color: #f3b205;
  }
</style>
<div id="welcome">
  <div class="hero">
    <div class="background"></div>
    <div class="overlay"></div>
    <div class="container content">
      <div class="row">
        <h1 class="margin-auto text-uppercase">why resort release</h1>
      </div>
      <div class="row">
        <h3 class="margin-auto text-capitalize" style="color:#ACC5D6; font-weight: 300;">Timeshare Exit Guaranteed</h3>
      </div>
      <div class="row">
        <div class="margin-auto separator">
          <div class="sep line"></div>
          <div class="sep rr margin-auto"><img src="../wp-content/themes/understrap-child/assets/RR-logo.svg" alt="RR"></div>
          <div class="sep line"></div>
        </div>
      </div>
      <div class="margin-top-20 row">
        <div class="col-12 text-center" style="color: white;text-shadow: 0 2px 4px rgba(0,0,0,0.8);font-size: 1.4rem;">
          Lowest Fees <br> Price Match<br>
          Track Status, Anytime!<br>
          6+ Years in Business<br>
          BBB Accredited, A+
        </div>
        <div class="col-12 text-center">
          <div class="margin-top-40">
            <div class="button primary" onclick="toInput()" style="padding: 12px; font-size: 1.6rem;">
              Get Started!
            </div>
          </div>
        </div>
      </div>
      <img class="img-fluid margin-top-20 margin-auto row" src="../wp-content/themes/understrap-child/assets/3_badges.png" alt="RR badges" style="padding: 20px;">
    </div>
  </div>
  <div class="signup">
    <h1 class="text-center"><b>Get Started Today</b></h1>
    <h3 class="text-center">Free Consultation</h3>
    <div class="margin-top-20 text-center">
      <a href="tel:888-758-0993" ><div class="button primary" style="padding: 12px; font-size: 1.6rem;">
        Call Now! 888-758-0993
      </div></a>
    </div>
    <div class="margin-top-20 text-center">
      <span><i>Or</i></span>
    </div>
    <div class="margin-top-20">
      <div class="col-md-6 offset-md-3 col-12">
        <div class="mautic-form">
          <?php include('forms/master-form.php'); ?>
        </div>
      </div>
    </div>
    <div class="margin-top-20 text-center">
      <i class="fa fa-arrow-down"></i>
    </div>
  </div>
  <div class="testimonials text-center">
    <div class="container">
      <h1>Testimonials</h1>
      <div class="row margin-top-40">
        <div class="col-md-6">
          <div class="embed-responsive embed-responsive-16by9">
            <div id="dOOTQQmDwvQ" class="youtube" data-params="modestbranding=1&amp;showinfo=0&amp;rel=0&amp;controls=1&amp;vq=hd720"><img class="img-fluid margin-auto" src="https://resortr-webassets.s3.amazonaws.com/wp-content/themes/rnr_suite_ten/assets/youtube/dOOTQQmDwvQ.jpg"><i class="fa fa-youtube-play"></i></div>
          </div>
        </div>
        <div class="col-md-6 margin-top-20">
          <h4 class="comment-header">Suzanne and Roland</h4>
          <div class="top-comment">
            <div class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            <p class="text-left">"We are extremely satisfied with the service that we received from Resort Release.
            They could not have been more pleasant, more thorough, and guided us every step of the way"</p>
          </div>
        </div>
      </div>
      <div class="row margin-top-20">
        <div class="col-md-6 col-xs-12 order-xs-1 margin-top-20">
          <div class="embed-responsive embed-responsive-16by9">
            <div id="LGoqB9a3YwA" class="youtube" data-params="modestbranding=1&amp;showinfo=0&amp;rel=0&amp;controls=1&amp;vq=hd720"><img class="img-fluid margin-auto" src="https://resortr-webassets.s3.amazonaws.com/wp-content/themes/rnr_suite_ten/assets/youtube/LGoqB9a3YwA.jpg"><i class="fa fa-youtube-play"></i></div>
          </div>
        </div>
        <div class="col-md-6 col-xs-12 margin-top-20">
          <h4 class="comment-header">Randy and Stella</h4>
          <div class="top-comment">
            <div class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            <p class="text-left">"We are very satisfied with the results that Resort Release achieved... Everyone we 
            talked to there was helpful and knowledgeable and exited us off the Timeshare in a very timely manner."</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fees">
    <h1 class="text-center f">Fees <span class="special_amp">&amp;</span> Guarantees</h1>
    <div class="col-md-6 offset-md-3 col-12 text-center margin-top-20">
      <div class="panel-heading panel-heading-gradient hsTextShadow0" style="background-color: rgb(66, 185, 159); border-color: rgb(245, 245, 245); color: rgb(255, 255, 255);"> <div class="pricely-label ne" data-gramm="false" contenteditable="false">Unbeatable prices</div> <div class="pricely-figure">
      <h1 class="pricely-amount ne" contenteditable="false">Price Match</h1>
      </div> <div class="pricely-foreword ne" data-gramm="false" contenteditable="false">INCLUDED WHEN YOU CALL</div> </div> <ul class="list-group ne" data-gramm="false" contenteditable="false"> <li class="list-group-item ">
      <span style="color: inherit;">FREE NO-RISK, NO-OBLIGATION CONSULTATION</span><br>
      </li> <li class="list-group-item">DESIGNATED ACCOUNT MANAGER</li> <li class="list-group-item">WELCOME PACKET</li>
      <li class="list-group-item">NO FUTURE FEES, GUARANTEED</li> </ul> 
    </div>
    <div class="col-12 text-center margin-top-20">
      <img src="../wp-content/themes/understrap-child/assets/logos/badges/3-Guarantees.png" alt="RR 3 guarantees" class="img-fluid">
    </div>
    <div class="col-12 text-center">
      <div class="margin-top-40">
        <div class="button primary" onclick="toInput()" style="padding: 12px; font-size: 1.6rem;">
          Get Started!
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function toInput(){	
	setTimeout(() => {
		jQuery('form').find('input').first().focus();
	}, 500);
}
</script>
<script>
	"use strict";
	jQuery(function($) {
		$(".youtube").each(function() {
      // maxresdefault
      $(this).append($('<img/>', {'class': 'img-fluid','src': 'https://i.ytimg.com/vi/' + this.id + '/maxresdefault.jpg'}));
			$(this).append($('<i class="fa fa-youtube-play"></i>'));
			$(document).delegate('#'+this.id, 'click', function() {
			  var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
				if ($(this).data('params')) iframe_url+='&'+$(this).data('params');
				var iframe = $('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': $(this).width() })
				$(this).replaceWith(iframe);
			});
		});
	});
</script>
<?php get_footer();?>