<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>
  <div id="footer" class="container-fluid">
    <div class="container text-center">
      <?php if (!is_home()) :?>
      <div class="row">
        <div class="col-md-6 col-12 text-center"><div class="button success page" id="prev" data-page="1">Prev</i></div></div>
        <div class="col-md-6 col-12 text-center"><div class="button success page" id="next" data-page="2">Next</div></div>    
      </div>
      <?php endif ;?>

      <div class="row">
        <div class="col-md-12 text-center margin-top-30">
          Resort Release is not a law firm, and the employees of Resort Release are not attorneys.
          <a href="https://www.resortrelease.com/terms-and-conditions" target="_blank" style="color: inherit; text-decoration: underline;"> Terms and Privacy.</a></br>
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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMJM9BD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</html>