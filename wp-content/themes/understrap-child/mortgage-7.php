<section>
  <div class="container text-center mortgage-content">
  <h1 class="h-number">7</h1>
  <h1>Timeshare Cost Overview</h1>
  <hr>
  <?php include('calculator.php')?> 
  </div>
</section>
<script>
jQuery(document).ready(function(){ 
  jQuery('#prev').removeClass('disabled').attr("data-page", "5");  
  jQuery('#next').addClass('disabled').attr("data-page", "7");
  jQuery('.breadcrumb li').each(function( index ){
    jQuery(this).removeClass('active').removeAttr( "aria-current" )
  });
  jQuery('.breadcrumb li.7').addClass('active').attr("aria-current", "page");
  jQuery('.red-car').css('left', '89%');    
});
</script>