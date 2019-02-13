<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>
<style>
  #divider{
    border-color: #88bbde;
    width: 30%;
    float: left;
    margin-top: 0;
  }
  #show-price-all .thirtyYears {
    position: static;
    font-size: 1.5em;
    font-family: "Serif"!important;
  }
</style>
<?php if (!is_home()) :?>
  <div class="container svg-container">
    <img src="../wp-content/themes/understrap-child/assets/presentation-footer.svg" class="img-fluid" alt="Resort Release - Path To Timeshare Freedom">
    <img src="../wp-content/themes/understrap-child/assets/red-car.svg" width="55px"  alt="Resort Release - Red Car" class="red-car">    
  </div>
<?php endif ;?>
  <div id="footer" class="container-fluid">
    <div class="container text-center">
      <?php if (is_page( array('Mortgage', 'Transfer'))) :?>
      <div class="row" id="footer-buttons">
        <div class="col-md-6 col-12 text-center"><div class="button success page-label" id="prev" onclick="direction(this)" data-page="1">Prev</i></div></div>
        <div class="col-md-6 col-12 text-center"><div class="button success page-label" id="next" onclick="direction(this)" data-page="2">Next</div></div>    
      </div>
      <?php endif ;?>
      <div class="row text-left">
        <div class="col-md-4 margin-top-40">
          Resort Release is not a law firm, and the employees of Resort Release are not attorneys.
          <br><a href="https://resortrelease.com/terms-and-conditions" rel="noopener" style="color: #82b3d4;"><u> Terms and Privacy</u></a>
        </div>
        <div class="offset-md-4 col-md-4 margin-top-40">
          <h3 id="nav-links">Nav Links</h3>
          <hr id="divider">
          <br>
          <ul>
            <!-- <a href="<?php// echo home_url() ?>/login?login=true" style="color: inherit;"><li>User Login</li></a> -->
            <a href="https://www.resortrelease.com/" style="color: inherit;"><li>Home</li></a>
            <a href="https://www.resortrelease.com/3-reasons/" style="color: inherit;"><li>Client Survey</li></a>
          </ul>
          <br>
          <a href="http://www.bbb.org/chicago/business-reviews/timeshare-advocates/american-resource-management-group-llc-in-rockford-il-88596110/" target="_blank" rel="noopener">
						<img id="header-bbb" class="header-accreditation img-fluid" src="<?php bloginfo('stylesheet_directory'); ?>/assets/logos/badges/BBB.png" type="image/svg+xml" alt="Resort Release BBB" style="width: 150px; height: auto;"/>
				  </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center margin-top-30">
          © 2018 ResortRelease
        </div>
      </div>
    </div>
  </div>
  <!-- Show Price Banner -->
  <div id="show-price-all" class="text-center">
    <div class="text-danger thirtyYears text col-md-12">
    </div>
  </div>
  <?php wp_footer(); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.full.min.js"></script>
</body>
<script>
  function direction($this) {
    var dir = jQuery($this).attr('id');
    var page = jQuery($this).attr('data-page');
    buttonDirection(dir, page);
  }
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMJM9BD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</html>