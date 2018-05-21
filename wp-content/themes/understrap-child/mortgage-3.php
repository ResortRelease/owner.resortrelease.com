<section>
  <div class="container text-center">
<!-- SMTN and Ebay -->
  <h1 class="h-number">3</h1>
  <h1>The Resale Market</h1>
  <hr>
  <div class="row margin-top-40 text-left">
      <div class="col-12">
        <div class="row">
          <div class="col-md-1">
            <div class="p-number">
              3A
            </div>
          </div>
          <div class="col-md-10">
            <a href="http://www.sellmytimesharenow.com/timeshare/All+Timeshare/vacation/buy-timeshare/sellPrice+asc%2Cresort+asc%2Cmin_week+asc/" target="_self" rel="nofollow"><p class="p-link">SellMyTimeshareNow.com</p></a>
            <div class="scroll-div img-fluid">
              <img id="smtn-shot" class="img-fluid scroll-img" src="../wp-content/themes/understrap-child/assets/slides/2/smtn.jpg" alt="SMTP Screenshot">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row margin-top-20 text-left">
      <div class="col-12">
        <div class="row">
          <div class="col-md-1">
            <div class="p-number">
              3B
            </div>
          </div>
          <div class="col-md-10">
            <a href="https://www.ebay.com/sch/Timeshares-for-Sale/15897/i.html?_from=R40&_nkw=timeshare&_sop=15" target="_self" rel="nofollow"><p class="p-link">eBay</p></a>
            <div class="scroll-div img-fluid">
              <img id="ebay-shot" class="img-fluid scroll-img" src="../wp-content/themes/understrap-child/assets/slides/2/ebay.jpg" alt="eBay Screenshot">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  jQuery(document).ready(function(){
    jQuery('#prev').removeClass('disabled').attr('data-page', "2");
    jQuery('#next').removeClass('disabled').attr('data-page', "4");
    jQuery('.breadcrumb li').each(function( index ){
      jQuery(this).removeClass('active').removeAttr( "aria-current" )
    });
    jQuery('.breadcrumb li.3').addClass('active').attr("aria-current", "page");
    jQuery('.red-car').css('left', '41%');    
    // Minified Selector Code
    for(var elements=jQuery(document).find("select.form-control"),i=0,l=elements.length;i<l;i++){var $select=jQuery(elements[i]),$label=$select.parents(".form-group").find("label");$select.select2({allowClear:!1,placeholder:$select.data("placeholder"),minimumResultsForSearch:0,theme:"bootstrap",width:"100%"}),$label.on("click",function(e){jQuery(this).parents(".form-group").find("select").trigger("focus").select2("focus")}),$select.on("keydown",function(e){var t=jQuery(this),r=t.data("select2"),o=r.$container;if(void 0===e.which||$.inArray(e.which,[0,8,9,12,16,17,18,19,20,27,33,34,35,36,37,38,39,44,45,46,91,92,93,112,113,114,115,116,117,118,119,120,121,123,124,144,145,224,225,57392,63289])>=0)return!0;if(o.hasClass("select2-container--open"))return!0;t.select2("open");var l=r.dropdown.$search||r.selection.$search,a=$.inArray(e.which,[13,40,108])<0?String.fromCharCode(e.which):"";""!==a&&l.val(a).trigger("keyup")}),$select.on("select2:open",function(e){var t=jQuery(this),r=t.data("select2"),o=r.dropdown.$dropdown||r.selection.$dropdown,l=r.dropdown.$search||r.selection.$search,a=t.select2("data");o.hasClass("select2-dropdown--above")&&o.append(l.parents(".select2-search--dropdown").detach()),l.attr("placeholder",""!==a[0].text?a[0].text:t.data("placeholder"))})}
  });
</script>