<section>
  <div class="container text-center">
    <h1 class="h-number">1</h1>
    <h1>Industry Fact Video</h1>
    <div class="timeshare-video">

    </div>
    <!-- <iframe src="https://www.resortrelease.com/video/?wvideo=l8ry3ssbwk" frameborder="0"></iframe> -->
      <img id="begin" data-page="2" src="../wp-content/themes/understrap-child/assets/logos/ResortRelease.png" alt="Resort Release Logo" style="max-width:300px;">
  </div>
</section>
<script>
jQuery(window).ready(function(){
  jQuery('.breadcrumb li').each(function( index ){
    jQuery(this).removeClass('active').removeAttr( "aria-current" );
  });
  jQuery('.breadcrumb li.1').addClass('active').attr("aria-current", "page");
  jQuery('#prev').addClass('disabled').attr('data-page', "1");
  jQuery('#next').removeClass('disabled').attr('data-page', "2");
});
</script>