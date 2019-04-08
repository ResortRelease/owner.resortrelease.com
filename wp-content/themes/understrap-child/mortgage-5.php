<section>
  <div class="container text-center mortgage-content">
  <h1 class="h-number">5</h1>
  <h1>Transfer Service Pricing Structure</h1>
  <hr>
  <div class="container margin-top-40">
    <div id="chart-container">
      <div id="chart-col-1">
        <ul class="ribbon-l">
          <li class="chart-color chart-header ribbon-content" >Annual Maintence Fees</li>
        </ul>
        <ul class="chart-content-l chart">
          <li><div>$750</div></li>
          <li><div>$751 - $999</div></li>
          <li><div>$1000 - $1,299</div></li>
          <li><div>$1,300 - $1,499</div></li>
          <li><div>$1,500+</div></li>
        </ul>
      </div>
      <div id="chart-col-2">
        <ul class="ribbon-r">
          <li class="chart-color chart-header ribbon-content" >Price</li>
        </ul>
        <ul class="chart-content-r chart">
          <li><div>$5,795</div></li>
          <li><div>$6,695</div></li>
          <li><div>$7,195</div></li>
          <li><div>$7,695</div></li>
          <li><div>$7,696+</div></li>
        </ul>
      </div>      
    </div>
    <div class="chart-color chart-footer text-right">&copy; 2018 ResortRelease</div>
  </div>
</div>
</section>
<script>
jQuery(document).ready(function(){  
  jQuery('#next').removeClass('disabled');
  jQuery('.breadcrumb li').each(function( index ){
    jQuery(this).removeClass('active').removeAttr( "aria-current" )
  });
  jQuery('.breadcrumb li.5').addClass('active').attr("aria-current", "page");
  jQuery('#prev').removeClass('disabled').attr('data-page', "4");
  jQuery('#next').removeClass('disabled').attr('data-page', "6");
  jQuery('.red-car').css('left', '73%');  
});
</script>