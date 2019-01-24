<?php
/**
 * Template Name: Cancel
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
<div class="container">
<div class="container text-center">
  <h1 id="calculator" class="open-calc">Calculator</h1>
  <div id="mortgage-calc" class="col-12">
    <div>
      <div class=""  id="mc">
        <small id="branding">Resort Release ®</small>
        <div class="calc-border">
          <div id="mortgage-calc-header" class="text-center">Timeshare <span class="blink">:</span> Calculator</div>
        </div>
        <div class="calc-border" style="margin-top: 20px; padding-top: 0px;">
          <div class="row margin-10">
            <div class="col-md-12">
              <div class="out-header" style="margin-top: 15px;">Monthly Mortgage Details:</div>
            </div>
          </div>
          <!-- INPUTS -->
          <!-- 1st row -->
          <div class="row">
            <div class="col-md-4">
              <div class="input-header">Monthly Payment Amount</div>
              <div class="input-type">$</div>
              <input class="input-calc" type="number" name="MPA" id="in-MPA" value="200" placeholder="e.g ( $200 )" tabindex=1>
            </div>
            <div class="col-md-4">
              <div class="input-header">Original # of Payments</div>
              <div class="input-type">#</div>
              <input class="input-calc" type="number" name="OP" id="in-OP" value="30" tabindex=2>
            </div>
            <div class="col-md-4">
              <div class="input-header">Downpayment</div>
              <div class="input-type">$</div>
              <input class="input-calc" type="number" name="DP" id="in-DP" value="1200" tabindex=3>
            </div>
            <div class="col-md-4 pull-right">
              <div class="input-header">&nbsp;</div>
              <div class="input-calc margin-10 calculate text-center" id="calculate-btn" onClick="total()">Calculate <i class="fa fa-calculator"></i></div>  
            </div>
          </div>
          <!-- 2nd row -->
          <div class="row">
            <div class="col-md-12">
              <div class="out-header">Maintenance Fees:</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="input-header">Payment Amount</div>
              <div class="input-type">$</div>
              <input class="input-calc" type="number" name="MPA" id="mFees" value="1300" placeholder="e.g ( $1500 )" tabindex=4>
            </div>
            <div class="col-md-4">
              <div class="input-header">Frequency Paid</div>
              <select class="input-calc" id="frequency" tabindex=5>
                <option value="1">Annually</option>
                <option value="0.5">Bi-annual</option>
                <option value="4">Quarterly</option>
                <option value="12">Monthly</option>
              </select>
            </div>
            <div class="col-md-4">
              <div class="input-header">Expected Annual Increase</div>
              <div class="input-type">%</div>
              <input class="input-calc" type="number" name="DP" id="increase" value="1.2" tabindex=6>
            </div>
          </div>
          <!-- 3rd row -->
          <div class="row" style="margin-top: 10px;">
            <div class="col-md-4">
              <div class="input-header">Membership Dues</div>
              <div class="input-type">$</div>
              <input class="input-calc" type="number" name="MPA" id="rci" value="150" placeholder="(RCI/II) $150 Average annually" tabindex=7>
            </div>
            <div class="col-md-4">
              <div class="input-header">Exchange Company Dues</div>
              <div class="input-type">$</div>
              <input class="input-calc" type="number" name="OP" id="ecd" value="169" placeholder="$169 Average annually" tabindex=8>
            </div>
            <div class="col-md-4">
              <div class="input-header text-center" id="error-msg" data-bg="false">&nbsp;</div>
              <div class="input-calc calculate text-center" id="calculate-btn" onClick="total()">Calculate <i class="fa fa-calculator"></i></div>  
            </div>
          </div>
          <!-- END INPUTS -->
          <!-- OUTPUT -->
          <div class="row margin-20" id="outputs">
            <div class="col-md-6">
              <div class="out-header">Current Annual Obligations</div>
              <div class="output blue text-center" id="x-CAO">&nbsp;</div>
            </div>
            <div class="col-md-6">
              <div class="out-header">Mortgage Grand Total</div>
              <div class="output blue text-center" id="x-MGT">&nbsp;</div>
            </div>
          </div>
          <div class="row margin-20">
            <div class="col-md-12"><!-- Header -->
              <div class="out-header">Total Cost Of Ownership</div>
            </div><!-- End Header -->
            <!-- Years Output -->
            <div class="col-md-4">
              <div class="output blue text-center xtra" id="x-10Years" value="">&nbsp;
                <div class="small-text text-center">10 years</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="output blue text-center xtra" id="x-20Years" value="">&nbsp;
                <div class="small-text text-center">20 years</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="output blue text-center xtra" id="x-30Years" value="">&nbsp;
                <div class="small-text text-center" id="x-30Years-sub" >30 years</div>
              </div>
            </div>
          </div>
            <!-- End Years Output -->
        </div>
          <!-- END OUTPUT -->
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div id="sent"></div>
  </div>
  <div class="margin-top-40 open-calc">
    <img id="rr-logo-start" src="../wp-content/themes/understrap-child/assets/logos/ResortRelease.png" alt="Resort Release Color Logo">
  </div>
</div>
<script>
  jQuery(".open-calc").on("click", function(){
    jQuery("#mortgage-calc").toggle();
  });
  // Add Commas
  function addCommas(nStr) {
    nStr += "";
    var x = nStr.split(".");
    var x1 = x[0];
    var x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, "$1" + "," + "$2");
    }
    return x1 + x2;
  }
  // Variables
  // Outputs
  function total(){
    jQuery(function($){
      // outputs
      var cao = $("#x-CAO"), // Current Annual Obligations 
          mgt = $("#x-MGT"), // Mortgage Grand Total.
          totalTenYears = $("#x-10Years"), // 10 Years.
          totalTwentyYears = $("#x-20Years"), // 20 Years.
          totalThirtyYears = $("#x-30Years"), // 30 Years.
          errors = $("#error-msg"); // Errors.
      var flag = true;
      // User Inputs
      var inMPA = parseFloat($("#in-MPA").val()),
          op = parseFloat($("#in-OP").val()),
          dp = parseFloat($("#in-DP").val());
      var initialCalc = 0;
      // Button Click
      // Calculating Current Annual Obligations & Mortgage Grand Total.
      if (inMPA){
        // Check for value
        isNaN(op) ? op = 0 : op = op;
        isNaN(dp) ? dp = 0 : dp = dp;
        var myCAO = inMPA * 12,
            myMGT = inMPA * op + dp;
        cao.html("$" + addCommas(myCAO.toFixed(0)));
        mgt.removeClass("blue").addClass("red").html("$" + addCommas(myMGT.toFixed(0)));
        errors.html("&nbsp;").attr("data-bg", "false");
        $('html, body').animate({
          scrollTop: $("#outputs").offset().top-220
        }, 800);
      }
      // Calculating Maintenance Fees.
      var freq = $("#frequency").val(),
          fees = parseFloat($("#mFees").val()) * freq,
          inc = parseFloat($("#increase").val()) / 100,
          membership = parseFloat($("#rci").val()),
          exchange = parseFloat($("#ecd").val()),
          initialCalc = 0;
      // Validate the form
      function validateForm() {
        isNaN(membership) ? membership = 0 : membership = membership;
        isNaN(exchange) ? exchange = 0 : exchange = exchange;
        isNaN(inc) ? inc = 0 : inc = inc;
        if (isNaN(fees)) {
          // errors.html("Payment amount missing!").attr("data-bg", "true");
          flag = false;
        }else if (inc == 0){
          // errors.html("No annual increase").attr("data-bg", "true");
        }else {
          // errors.html("&nbsp;").attr("data-bg", "false");
        }
      }validateForm();
      // Calculate initial
      function initial(){
        if(flag == true) {
          isNaN(myMGT) ? myMGT = 0 : myMGT = myMGT;
          initialCalc = myMGT + fees + membership + exchange;
        }
      }initial();
      // Calculate over the years
      function calcYears(){
        if(flag == true) {
          var a = fees,
              b = membership,
              c = exchange;
          var sumTotal = initialCalc;            
          myCAO = myCAO + fees + membership + exchange;          
          cao.html("$" + addCommas(myCAO.toFixed(0)));     
          // Loop to calculate
          for(var i = 0; i < 29; i++){
            // compound is initialCalc + every loop sum 
            var calcA = a + (a * inc),
                calcB = b + (b * inc),
                calcC = c + (c * inc);
            var total = calcA + calcB + calcC;
            sumTotal += total;
            
            // 8 18 28 = 10 20 30 years respectively toFixed(2)
            if(i == 8){
              totalTenYears.html("");
              totalTenYears.prepend("$"+addCommas(sumTotal.toFixed(2)) + "<div class='small-text text-center'>10 years</div>");
              cao.html();
              userCancelResults(addCommas(sumTotal.toFixed(2)));
            }
            if(i == 18){
              totalTwentyYears.html("");
              totalTwentyYears.prepend("$"+addCommas(sumTotal.toFixed(2)) + "<div class='small-text text-center'>20 years</div>"); 
            }
            if(i == 28){ 
              totalThirtyYears.html("");
              totalThirtyYears.removeClass("blue").addClass("red").prepend("$"+addCommas(sumTotal.toFixed(2)) + "<div class='small-text text-center red'>30 years</div>");
            }
            a = calcA
            b = calcB
            c = calcC
          };
        }
      }calcYears();
    });
  };
	jQuery(function(a) {
	    a("input").keypress(function(e) {
	        return !(e.which && 13 == e.which || e.keyCode && 13 == e.keyCode) || (a("#calculate-btn").click(), !1)
	    })
  });
  function userCancelResults(i) {
    jQuery.ajax({
      type: "POST",
      url: "../wp-content/themes/understrap-child/api/edit_user_cancel.php",
      data: {ten: i, og: 4000.34},
      success: function(msg){
        jQuery("#sent").html(msg);
      }
    });
  }
  // jQuery.ajax({
  //   type: "POST",
  //   url:  "'. get_permalink( $post->ID ).'",
  //   data: input_data,
  //   success: function(msg){
  //     console.log(msg);
  //     jQuery(".loading").remove();
  //     jQuery("<div>").html(msg).appendTo("div#result").hide().fadeIn("slow");
  //   }
  // });
</script>

</div>
<?php get_footer(); ?>
