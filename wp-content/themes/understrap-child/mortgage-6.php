<section>
  <div class="container text-center mortgage-content">
  <h1 class="h-number">6</h1>
  <h1>Timeshare Cost Overview</h1>
  <hr>
  <?php include('calculator.php')?>  
  <div class="margin-top-20 text-center">
    <div class="text-center">
      <img src="../wp-content/themes/understrap-child/assets/slides/5/Mortgage-Packet.jpg" alt="Services Overview Resort Release">
    </div>
    <div class="margin-top-20 text-center">
      <img src="../wp-content/themes/understrap-child/assets/slides/5/badges.png" alt="Guarantees Resort Release">
    </div>
  </div>

  </div>
</section>
<script>
jQuery(document).ready(function(){ 
  jQuery('#prev').removeClass('disabled').attr("data-page", "5");  
  jQuery('#next').addClass('disabled').attr("data-page", "6");
  jQuery('.breadcrumb li').each(function( index ){
    jQuery(this).removeClass('active').removeAttr( "aria-current" )
  });
  jQuery('.breadcrumb li.6').addClass('active').attr("aria-current", "page");
  jQuery('.red-car').css('left', '89%');    
});
</script>