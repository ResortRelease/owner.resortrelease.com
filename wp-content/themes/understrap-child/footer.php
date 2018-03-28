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
    <div class="current-page" data-page="1"></div>
    <div class="button success" id="prev">Prev</i></div>
    <div class="button success" id="next">Next</div>
    <div class="row">
      <div class="col-md-4 text-left margin-top-20">
        Resort Release is not a law firm, and the employees of Resort Release are not attorneys.
        Terms and Privacy
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

<script>
// Magnify Function
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}

// Calculator Function
jQuery(function($){
    $("input").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $('#calculate-btn').click();
            return false;
        } else {
            return true;
        }
    });
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
            }
            if(i == 18){
              totalTwentyYears.html("");
              totalTwentyYears.prepend("$"+addCommas(sumTotal.toFixed(2)) + "<div class='small-text text-center'>20 years</div>"); 
            }
            if(i == 28){ 
              totalThirtyYears.html("");
              totalThirtyYears.removeClass("blue").addClass("red").prepend("$"+addCommas(sumTotal.toFixed(2)) + "<div class='small-text text-center red'>30 years</div>");
              showPrice(sumTotal.toFixed(2));
            }
            a = calcA
            b = calcB
            c = calcC
          };
        }
      }calcYears();
      // Show price banner
      function showPrice(sum){
        var showPrice = '<h1>$'+addCommas(sum)+'</h1>Expected Debt To Resort';
        $("#show-price-all").show().find(".thirtyYears").html(showPrice);
        createCookie('showPrice',showPrice);
        function createCookie(name,value) {
          document.cookie = name + "=" + value + "; path=/";
        }
      };
    });
  };
</script>


</body>

</html>

