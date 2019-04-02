<section>
  <div class="container text-center">
    <h1 class="h-number">1</h1>
    <h1>Our Qualification Process</h1>
    <hr>
    <div class="row margin-top-20">
      <!-- Bill of Rights -->    
      <div class="col-md-6 img-magnifier-container d-none d-sm-block" style="display:none!important;">
        <img id="bill-of-rights" src="../wp-content/themes/understrap-child/assets/slides/1/bill-of-rights.jpg" alt="Bill Of Rights">
      </div>
      <div class="col-12 d-block d-sm-none" style="display:none!important;">
        <img src="../wp-content/themes/understrap-child/assets/slides/1/bill-of-rights.jpg" alt="Bill Of Rights">
      </div>
      <!-- Mildred Video -->
      <div class="col-md-6 offset-md-3">
        <div class="video-container">
          <div class="video-container-border">
            <img id="video-img" src="../wp-content/themes/understrap-child/assets/slides/1/mqdefault.jpg" alt="Timeshare - Mildred" data-toggle="modal" data-target=".bd-example-modal-lg">
            <i class="fa fa-youtube-play" data-toggle="modal" data-target=".bd-example-modal-lg"></i>
          </div>
          <div class="subheader">
            <h3>Timeshare Investigation - Mildred</h3>
          </div>
          <div class="badges">
            <img src="../wp-content/themes/understrap-child/assets/slides/1/3_badges.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container text-center" id="check-container">
    <h1>Signs You May Be A Victim of Timeshare Fraud</h1>
    <div class="text-left">
      <div class="checkboxes margin-top-40">
        <div class="col-12">
          <input type="checkbox" id="cb1" />
          <label for="cb1" class="check-box"></label>
          <span data-id="cb1" class="unchecked cl">Told your timeshare was a great investment and would increase in financial value</span>
        </div><br>
        <div class="col-12">
          <input type="checkbox" id="cb2" />
          <label for="cb2" class="check-box"></label>
          <span data-id="cb2" class="unchecked cl">Told your timeshare can  easily be rented to cover your purchase price, maintenance fees, or to make extra money</span>
        </div><br>
        <div class="col-12">
          <input type="checkbox" id="cb3" />
          <label for="cb3" class="check-box"></label>
          <span data-id="cb3" class="unchecked cl">Told you MUST buy TODAY because the price will be more tomorrow</span>
        </div><br>
        <div class="col-12">
          <input type="checkbox" id="cb4" />
          <label for="cb4" class="check-box"></label>
          <span data-id="cb4" class="unchecked cl">Told you were attending an “Owners Update” meeting that was nothing more than a sales presentation in disguise</span>
        </div><br>
        <div class="col-12">
          <input type="checkbox" id="cb5" />
          <label for="cb5" class="check-box"></label>
          <span data-id="cb5" class="unchecked cl">Told your timeshare can give you tax incentives or can easily be refinanced through your local bank</span>
        </div><br>
        <div class="col-12">
          <input type="checkbox" id="cb6" />
          <label for="cb6" class="check-box"></label>
          <span data-id="cb6" class="unchecked cl">You were not told how long you had to cancel your timeshare purchase</span>
        </div><br>
        <div class="col-12">
          <input type="checkbox" id="cb7" />
          <label for="cb7" class="check-box"></label>
          <span data-id="cb7" class="unchecked cl">Your “90 minute” presentation lasted 4 hours or more</span>
        </div>
      </div>

      <div class="margin-top-40">
      <u><i>***The above indications are examples only; individual circumstances with timeshare companies must be evaluated before any determination or allegation of misrepresentation or fraud can be made.</i></u>
      </div>
      <div class="margin-top-40 text-center">
        <h2 style="color: #0896E5">“You’ll Likely Need Professional Attorneys Help To Take On Today’s Multi-Billion Dollar Resorts And Win“</h2>
      </div>
      <div class="col-md-8 offset-md-2">
        <div class="margin-top-20">
          <span class="qa q">Q: </span><span><b>Why have these timeshare scams persisted over the past 30 years and what can you do to help fight these fraudulent resorts?</b></span>
        </div>
        <div class="margin-top-20 answer">
          <span class="highlight"><span class="qa a">A: </span><b>Today’s timeshare scams aren’t going away.</b></span> As a matter of fact, these reported scams seem to never die off for a variety of reasons. Deceitful and malicious sales tactics combined with resorts represented by powerful lobbyists in your  government may prevent sweeping changes from likely happening. However, YOU CAN fight for your rights and take a stand against unfair or deceptive sales tactics.</span>
        </div>
      </div>

    </div>
  </div>
</section>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe src="https://www.youtube.com/embed/uW9XULgawnA?autoplay=0&autohide=1&rel=0" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>
<script>
jQuery(window).ready(function(){
  jQuery('.breadcrumb li').each(function( index ){
    jQuery(this).removeClass('active').removeAttr( "aria-current" );
  });
  jQuery('.breadcrumb li.1').addClass('active').attr("aria-current", "page");
  // magnify("bill-of-rights", 2); 
  jQuery('#prev').addClass('disabled').attr('data-page', "1");
  jQuery('#next').removeClass('disabled').attr('data-page', "2");
  jQuery('.red-car').css('left', '9%');
});
// Checkboxes minified MINIFIED
jQuery(":checkbox").change(function(){if(this.checked){var t=jQuery(this).attr("id");jQuery('span[data-id="'+t+'"]').toggleClass("checked").toggleClass("unchecked")}else{t=jQuery(this).attr("id");jQuery('span[data-id="'+t+'"]').toggleClass("checked").toggleClass("unchecked")}});
</script>