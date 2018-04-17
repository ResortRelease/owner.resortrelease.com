<section>
  <div class="container text-center mortgage-content">
    <h1 class="h-number">2</h1>
    <h1>You Had The Right To Cancel</h1>
    <hr>
    <div class="row">
      <div class="col-md-8 offset-md-2 text-justify margin-top-20">
        <p>You were never aware of the cancel period</p>
        <p>Most timeshare owners were victim of fraudulent sales practices because their sales agents promise cant be verified for months or even years. These agents have seemingly no checks and balances because they know that your right to cancel will expire in a few days, but you might not even try to use it for a whole year. By the time you realize you have been deceived, there isn’t a way to easily cancel your contract without professional help.</p>
        <p>There's still a way to cancel!s</p>
      </div>
    </div>
    <div class="row margin-top-40" id="beat-the-clock">
      <div  class="text-center margin-top-20 col-md-6">
        <img id="beat-the-clock-img" src="../wp-content/themes/understrap-child/assets/slides/2/Beattheclock.png" alt="Beat the clock" class="img-fluid">
      </div>
      <div class="col-md-6">
      <div>
        <div class="form-group">
            <label class="control-label">Chose a state to see the cancellation period</label>
            <select class="form-control" id="select2-single-box" name="select2-single-box" data-placeholder="Pick a state" data-tabindex="1">
              <option></option>
              <option value="1">Alaska – 15 days</option>
              <option value="2">Arkansas – 5 days</option>
              <option value="3">Arizona – 7 days</option>
              <option value="4">California – 7 days</option>
              <option value="5">Colorado – 5 days</option>
              <option value="6">Connecticut – 3 days</option>
              <option value="8">District of Columbia – 0 days</option>
              <option value="9">Florida – 10 days</option>
              <option value="10">Georgia – 7 days (business)</option>
              <option value="11">Hawaii – 7 days</option>
              <option value="12">Idaho – 5 days</option>
              <option value="13">Illinois – 5 days</option>
              <option value="14">Indiana – 3 days (business)</option>
              <option value="15">Iowa – 5 days</option>
              <option value="16">Kentucky – 5 days (business)</option>
              <option value="17">Louisiana – 7 days</option>
              <option value="18">Maine – 10 days</option>
              <option value="19">Maryland – 10 days</option>
              <option value="20">Massachusetts – 3 days</option>
              <option value="21">Michigan – 5 days</option>
              <option value="22">Minnesota – 5 days</option>
              <option value="23">Mississippi – 7 days</option>
              <option value="24">Missouri – 7 days (business)</option>
              <option value="25">Montana – 7 days</option>
              <option value="26">Nevada – 5 days</option>
              <option value="27">New Hampshire – 5 days</option>
              <option value="28">New Jersey – 7 days</option>
              <option value="29">New Mexico – 7 days</option>
              <option value="30">New York – 7 days</option>
              <option value="31">North Carolina – 5 days</option>
              <option value="32">North Dakota – 0 Days</option>
              <option value="33">Ohio – 3 days</option>
              <option value="34">Oklahoma – 10 days</option>
              <option value="35">Oregon – 5 days</option>
              <option value="36">Pennsylvania – 5 days</option>
              <option value="37">Rhode Island – 5 days (business)</option>
              <option value="38">South Carolina – 5 days</option>
              <option value="39">South Dakota – 7 days</option>
              <option value="40">Tennessee – 10 days</option>
              <option value="41">Texas – 5 days</option>
              <option value="42">Utah – 5 days</option>
              <option value="43">Vermont – 3 days</option>
              <option value="44">Virginia – 7 days</option>
              <option value="45">Washington – 7 days</option>
              <option value="46">West Virginia – 10 days</option>
              <option value="47">Wisconsin – 5 days (business)</option>
              <option value="48">Wyoming –0 days</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  jQuery(document).ready(function(){
    jQuery('#prev').removeClass('disabled').attr('data-page', "1");
    jQuery('#next').removeClass('disabled').attr('data-page', "3");
    jQuery('.breadcrumb li').each(function( index ){
      jQuery(this).removeClass('active').removeAttr( "aria-current" )
    });
    jQuery('.breadcrumb li.2').addClass('active').attr("aria-current", "page");
    jQuery('.red-car').css('left', '25%');
    // Minified Selector Code
    for(var elements=jQuery(document).find("select.form-control"),i=0,l=elements.length;i<l;i++){var $select=jQuery(elements[i]),$label=$select.parents(".form-group").find("label");$select.select2({allowClear:!1,placeholder:$select.data("placeholder"),minimumResultsForSearch:0,theme:"bootstrap",width:"100%"}),$label.on("click",function(e){jQuery(this).parents(".form-group").find("select").trigger("focus").select2("focus")}),$select.on("keydown",function(e){var t=jQuery(this),r=t.data("select2"),o=r.$container;if(void 0===e.which||$.inArray(e.which,[0,8,9,12,16,17,18,19,20,27,33,34,35,36,37,38,39,44,45,46,91,92,93,112,113,114,115,116,117,118,119,120,121,123,124,144,145,224,225,57392,63289])>=0)return!0;if(o.hasClass("select2-container--open"))return!0;t.select2("open");var l=r.dropdown.$search||r.selection.$search,a=$.inArray(e.which,[13,40,108])<0?String.fromCharCode(e.which):"";""!==a&&l.val(a).trigger("keyup")}),$select.on("select2:open",function(e){var t=jQuery(this),r=t.data("select2"),o=r.dropdown.$dropdown||r.selection.$dropdown,l=r.dropdown.$search||r.selection.$search,a=t.select2("data");o.hasClass("select2-dropdown--above")&&o.append(l.parents(".select2-search--dropdown").detach()),l.attr("placeholder",""!==a[0].text?a[0].text:t.data("placeholder"))})}
  });
</script>