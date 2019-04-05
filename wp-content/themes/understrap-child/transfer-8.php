<section>
  <div class="container">
    <h1 class="h-number text-center">8</h1>
    <h1 class="text-center"></h1>
    <style>
      .input-group {
      margin: 10px 0;
      }
      input {
      /* max-width: 120px; */
      }
      .formContainer {
      background: white;
      height: auto;
      position: relative;
      padding: 12px;
      border-left: 1px solid #f2f2f2;
      border-top: 1px solid #f2f2f2;
      }
      .formContainer:before, .formContainer:after{
      content: "";
      position: absolute;
      background: #f2f2f2
      }
      .formContainer:before{
      left: 100%;
      width: 40px;
      height: 100%;
      top: 0;
      top: 20px;
      transform: skew(0deg,45deg);
      }
      .formContainer:after{
      top: 100%;
      width: 100%;
      height: 40px;
      left: 20px;
      transform: skew(45deg,0deg);
      }
      input, .input-group-addon{
      box-shadow: 3px 3px 2px #E4E4E4!important;
      }
      label, h1, h2 {
      text-shadow: 1px 1px 0px #E4E4E4;
      }
      .input-spacer {
      margin: 10px 0px;
      }
      .tenYears span{
      font-size: 1.8rem;
      animation-delay: 0s
      }
      .twentyYears span{
      font-size: 2.2rem;
      animation-delay: 0.5s
      }
      .thirtyYears span{
      font-size: 2.5rem;
      animation-delay: 1s
      }
      .years {
      min-height: 150px;
      }
      .text {
      position: absolute;
      bottom: 0px;
      left: 0;
      right: 0;
      }
      #initial {
      font-weight: 700;
      }
      button {
      padding: 0.7rem 1rem!important;
      margin-top: 20px;
      }
      #error_msg {
      padding-top:10px;
      font-style: italic;
      }
      #show-price {
      display: none;
      background: rgba(216, 191, 190, 0.6);
      position: fixed;
      top: 50px;
      right: 0px;
      z-index: 99;
      height: 80px;
      max-width: 280px;
      min-width: 230px;
      font-weight: 700;
      box-shadow: 0 0 35px 2px rgba(0,0,0,0.24);
      border-radius: 8px 0 0 8px;
      border: 1px solid #a94442;
      border-right: 0;
      }
      #show-price span {
      font-size: 1rem;
      }
      #show-price h1{
      margin-top: 9px;
      text-shadow: 1px 1px 0px #652322;
      }
      #show-price .thirtyYears {
      position: relative;
      }
      .b-b {position: relative;padding-bottom: 20px;}
      .b-b:after {
      content: "";
      height: 1px;
      width: 100%;
      position: absolute;
      bottom: 0px;
      left: 0px;
      background: linear-gradient(145deg, transparent,#8BC34A, #0e76bc, #8BC34A, transparent);
      margin-bottom: 10px;
      }
    </style>
    <div class="container wallet" style="margin-bottom: 30px; padding: 30px 15px;">
      <div class="formContainer col-md-10 offset-md-1">
        <div class="col-md-12 text-center b-b">
          <h1>Timeshare cost overview</h1>
          <h2>Maintenance fees</h2>
        </div>
        <form id="timeshareForm" name="timeshareForm">
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Frequency Paid</label> <select id="frequency">
                <option value="1">
                  Annually
                </option>
                <option value="0.5">
                  Bi-annual
                </option>
                <option value="4">
                  Quarterly
                </option>
                <option value="12">
                  Monthly
                </option>
              </select>
            </div>
          </div>
          <div class="form-group" id="firstGroup">
            <div class="row">
              <div class="col">
                <label class="control-label">Payment Amount</label>
                <input autocomplete="off" class="form-control" id="mFees" name="house-price" placeholder="Maintenance fees" tabindex="1" type="number">
              </div>
              <div class="col">
                <label class="control-label">Expected Annual Increase</label>
                <input autocomplete="off" class="form-control" id="increase" name="house-price" placeholder="Increase" tabindex="1" type="number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label class="control-label">Membership Dues <small>(RCI/II)($150 Average annually)</small></label>
              <input autocomplete="off" class="form-control" id="rci" name="house-price" placeholder="Payment amount" tabindex="1" type="number">
            </div>
            <div class="col">
              <label class="control-label">Exchange Company Dues <small>($169 Average annually)</small></label>
              <input autocomplete="off" class="form-control" id="ecd" name="house-price" placeholder="Payment amount" tabindex="1" type="number">
            </div>
          </div>
          <div class="text-center">
            <small class="text-danger" id="error_msg"></small>
            <button class="button success" id="button-submit" name="button" onclick="total()" type="button">Calculate <i aria-hidden="true" class="fa fa-calculator"></i></button>
          </div>
          <!-- Results -->
          <div class="margin-top-40">
            <div class="form-group">
              <div class="col-md-12">
                <h2>First annual obligations: <span class="text-success" id="initial" style="font-family:'Quicksand'"></span></h2>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <h2>Total over the years:</h2>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-4 years text-center">
                  <div class="text-muted tenYears text">
                    <span class="animated zoomInDown" id="total10" style="display: none;"></span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 years text-center">
                  <div class="text-warning twentyYears text">
                    <span class="animated zoomInDown" id="total20" style="display: none;"></span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 years text-center">
                  <div class="text-danger thirtyYears text">
                    <span class="animated zoomInDown" id="total30" style="display: none;"></span>
                  </div>
                </div>
              </div>
              <div class="row margin-top-20">
                <div class="col-md-4 col-sm-4 years text-center">
                  <div class="text-muted tenYears text">
                    <span class="animated zoomInDown" id="total40" style="display: none;"></span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 years text-center">
                  <div class="text-warning twentyYears text">
                    <span class="animated zoomInDown" id="total50" style="display: none;"></span>
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 years text-center">
                  <div class="text-danger thirtyYears text">
                    <span class="animated zoomInDown" id="total99" style="display: none;"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="text-center" id="show-price">
      <div class="text-danger thirtyYears text col-md-12"></div>
    </div>
    <script>
      jQuery(function($) {
      $("form input").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                $("#button-submit").click();
                return false;
        } else {
                return true;
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
        var totalOverYears = $("#totalOverYears"),
            $10 = $("#total10"),
            $20 = $("#total20"),
            $30 = $("#total30"),
            $40 = $("#total40"),
            $50 = $("#total50"),
            $99 = $("#total99"),
            errors = $("#error_msg");
        var flag = true;
        // User Inputs
        var freq = $("#frequency").val(),
            mFees = parseFloat($("#mFees").val()) * freq,
            inc = parseFloat($("#increase").val()) / 100,
            membership = parseFloat($("#rci").val()),
            exchange = parseFloat($("#ecd").val())
            var initialCalc = 0;
        // Validate the form
        function validateForm() {
          isNaN(membership) ? membership = 0 : membership = membership;
          isNaN(exchange) ? exchange = 0 : exchange = exchange;
          isNaN(inc) ? inc = 0 : inc = inc;
          if (isNaN(mFees)) {
            errors.html("Payment amount missing!");
            flag = false;
          }else if (inc == 0){
            errors.html("No annual increase");
          }else {
            errors.html("");
          }
        }validateForm();

        // Calculate initial
        function initial(){
          if(flag == true) {
            initialCalc = mFees + membership + exchange;
            var totalInitial = $("#initial");
                totalInitial.html("$"+addCommas(initialCalc.toFixed(2)));
          }
        }initial();
        // Calculate over the years
        function calcYears(){
          if(flag == true) {
            var a = mFees,
                b = membership,
                c = exchange;
            var sumTotal = initialCalc;
            var currentFee = mFees;
            var nextFee, totalFees = currentFee;
            var currentMem = membership;
            var currentExc = exchange;
            // Loop to calculate
            for(var i = 0; i < 101; i++){
              if(i == 0 ){
                totalFees = 0;
              } else {
                totalFees += currentFee + currentMem + currentExc;
              }
              nextFee = currentFee + (currentFee * inc); //increase current Maintenance Fees
              nextMem = currentMem + (currentMem * inc); //increase current Membership Dues
              nextExc = currentExc + (currentExc * inc); //increase current Exchange Dues
              totalDues = currentMem + currentExc;
              currentMem = nextMem;
              currentExc = nextExc;
              currentFee = nextFee;

              // 8 18 28 = 10 20 30 years respectively toFixed(2)
              if(i == 10){ 
                $10.html("$"+addCommas(totalFees.toFixed(2))+"<br>10 Years").css("display", "block"); 
              }
              if(i == 20){ 
                $20.html("$"+addCommas(totalFees.toFixed(2))+"<br>20 Years").css("display", "block"); 
              }
              if(i == 30){ 
                $30.html("$"+addCommas(totalFees.toFixed(2))+"<br>30 Years").css("display", "block");
                showPrice(totalFees.toFixed(2)); 
              }
              if(i == 40){ 
                $40.html("$"+addCommas(totalFees.toFixed(2))+"<br>40 Years").css("display", "block");
                showPrice(totalFees.toFixed(2)); 
              }
              if(i == 50){ 
                $50.html("$"+addCommas(totalFees.toFixed(2))+"<br>50 Years").css("display", "block");
                showPrice(totalFees.toFixed(2)); 
              }
              if(i == 99){ 
                $99.html("$"+addCommas(totalFees.toFixed(2))+"<br>90 Years").css("display", "block");
                showPrice(totalFees.toFixed(2)); 
              }
            };
          }
        }calcYears();
        function showPrice(sum){
          $("#show-price-all").show().find(".thirtyYears").html("<h2>$"+addCommas(sum)+"</h2><p>Expected Debt To Resort</p>");
        }
      });
      }
    </script>
    <center>
      <a data-toggle="collapse" href="#services-overview" role="button" aria-expanded="false" aria-controls="services-overview">
        <img class="margin-top-40 page-label" src="../wp-content/themes/understrap-child/assets/logos/ResortRelease.png" alt="Resort Release Logo" style="max-width:300px;">
      </a>
    </center>
    <div class="services-overview collapse  margin-top-40" id="services-overview">
      <h1 class="text-center">Services Overview</h1>
      <div class="margin-top-20 text-center">
        <img src="../wp-content/themes/understrap-child/assets/slides/8/Transfer-Presentation.jpg" alt="Services Overview Resort Release">
      </div>
      <div class="margin-top-20 text-center">
        <img src="../wp-content/themes/understrap-child/assets/slides/5/one-guarantee.jpg" alt="Three Guarantees Resort Release">
      </div>
    </div>

  </div>
</section>
<script>
  jQuery(window).ready(function(){
    changePageIndex(8,7,8);
    jQuery('.red-car').css('left', '89.5%');  
  });
</script>