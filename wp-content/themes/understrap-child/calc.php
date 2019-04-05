<?php/**
 * Template Name: TEST CALC
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */
?>

<?php get_header();?>
<?php include('calculator.php')?>
<style>
#mortgage-calc {
  display: block!important;
}
</style>
<script>
// DELETE THIS PART **********************
  jQuery('#in-MPA').val(821);
  jQuery('#in-OP').val(120);
  jQuery('#in-DP').val(11475);
  jQuery('#mFees').val(220);
  jQuery('#increase').val(6);
  jQuery('#rci').val(0);
  jQuery('#ecd').val(0);
// DELETE THIS PART **********************

var type = "Mortgage";
jQuery(function($) {
  $(document).on('keypress',function(e) {
    if(e.which == 13) {
      total();
    }
  });
});
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
  function total(){
    jQuery(function($){
      // totals
      var x10 = $("#x10"),
          x15 = $("#x15"),
          x20 = $("#x20"),
					x25 = $("#x25"),
					x50 = $("#x50"),
					x99 = $("#x99"),
          errors = $("#error_msg");
      var flag = true;
      // User Inputs
      var freq = $("#frequency").val(),
          mFees = parseFloat($("#mFees").val()),
          fees = parseFloat($("#mFees").val()) * freq,
          inc = parseFloat($("#increase").val()) / 100,
          membership = parseFloat($("#rci").val()),
          exchange = parseFloat($("#ecd").val())
      var mPay = parseFloat($('#in-MPA').val()) , ogPay = parseFloat($('#in-OP').val()), dPay = parseFloat($('#in-DP').val());
      var initialCalc = 0;
      var mortgageTotal;
      var annualMort;
      // Validate the form
      function validateForm() {
        isNaN(membership) ? membership = 0 : membership = membership;
        isNaN(exchange) ? exchange = 0 : exchange = exchange;
        isNaN(inc) ? inc = 0 : inc = inc;
        isNaN(fees) ? fees = 0 : fees = fees;
        isNaN(mPay) ? mPay = 0 : mPay = mPay;
        isNaN(ogPay) ? ogPay = 0 : ogPay = ogPay;
        isNaN(dPay) ? dPay = 0 : dPay = dPay;
        isNaN(mFees) ? mFees = 0 : mFees = mFees;
        isNaN(membership) ? membership = 0 : membership = membership;
        isNaN(exchange) ? exchange = 0 : exchange = exchange;
        // if (isNaN(fees)) {
        //   errors.html("Payment amount missing!");
        //   flag = false;
        // }else if (inc == 0){
        //   errors.html("No annual increase")
        // }else {
        //   errors.html("");
        // }
      }validateForm();

      // Calculate initial
      function initial(){
        if(flag == true) {
          initialCalc = (mPay * 12) + fees + membership + exchange;
          
          var totalInitial = $("#x-CAO");
          var mortgageTotalOut = $("#x-MGT");
          totalInitial.html("$"+addCommas(initialCalc.toFixed(0)));
          mortgageTotal = (mPay * ogPay) + dPay;
          mortgageTotalOut.html("$"+addCommas(mortgageTotal.toFixed(0)));
          
        }
      }initial();
      // Calculate over the years+
      // 11475+(821*12)+220 = 21,547
      function calcYears(){
        if(flag == true) {
          var currentFee = mFees * freq;
          var nextFee, 
              totalFees = currentFee;
          var currentMem = membership;
          var currentExc = exchange;
          var totalDues, totalAdd = currentMem + currentExc, nextMem, nextExc;
          // Loop to calculate
          var yearsToPay = ogPay / 12; // if 120 payments then 10 years
          var terms = ogPay / 12;
          for(var i = 0; i < 100; i++){
            // Pay Mortgage Only for the Term.
            if( i <= terms ){
              annualMort = mPay * 12;
            }else{
              annualMort = 0;
            }
            // First Year Obligation.
            if( i == 0 ){
              totalFees = dPay;
            } else {
              totalFees += currentFee + annualMort + currentMem + currentExc;
            }
            
            if( mFees == 0 ){
              totalFees = mortgageTotal;
            }
            nextFee = currentFee + (currentFee * inc); //increase current Maintenance Fees
            nextMem = currentMem + (currentMem * inc); //increase current Membership Dues
            nextExc = currentExc + (currentExc * inc); //increase current Exchange Dues
            totalDues = currentMem + currentExc;
            currentMem = nextMem;
            currentExc = nextExc;
            currentFee = nextFee;
            console.log("Year " + i + " / $" + totalFees);
            // 10 20 30 40 50 99 years respectively toFixed(2)
            if(i == 10){ 
							x10.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>10 years</div>").css("display", "block"); 
            }
            if(i == 20){ 
              x15.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>20 years</div>").css("display", "block"); 
						}
						if(i == 30){ 
              x20.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>30 years</div>").css("display", "block"); 
						}
						if(i == 40){ 
              x25.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>40 years</div>").css("display", "block"); 
						}
						if(i == 50){ 
              x50.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>50 years</div>").css("display", "block"); 
            }
            if(i == 99){ 
							x99.html("$"+addCommas(totalFees.toFixed(2))+"<div class='small-text text-center'>99 years</div>").css("display", "block");
							x99.removeClass('blue').addClass('red');
							// jQuery.cookie('showPrice', '$'+addCommas(totalFees.toFixed(2)));
              // showPriceBanner();
            }
          };
        }
      }calcYears();
      function showPrice(sum){
        $("#show-price").show().find(".thirtyYears").html("<h1>$"+addCommas(sum)+"</h1>Expected Debt To Resort");
      }
    });
  }
</script>
<?php get_footer();?>