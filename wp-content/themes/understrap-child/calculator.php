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
              <input class="input-calc" type="number" name="MPA" id="in-MPA" placeholder="e.g ( $200 )" tabindex=1 >
            </div>
            <div class="col-md-4">
              <div class="input-header">Original # of Payments</div>
              <div class="input-type">#</div>
              <input class="input-calc" type="number" name="OP" id="in-OP" tabindex=2>
            </div>
            <div class="col-md-4">
              <div class="input-header">Downpayment</div>
              <div class="input-type">$</div>
              <input class="input-calc" type="number" name="DP" id="in-DP" tabindex=3 >
            </div>
          </div>
          <div class="row">
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
              <input class="input-calc" type="number" name="MPA" id="mFees" placeholder="e.g ( $1500 )" tabindex=4>
            </div>
            <div class="col-md-4">
              <div class="input-header">Frequency Paid</div>
              <select class="input-calc" id="frequency" tabindex=5>
                <option value="1">Annually</option>
                <option value="0.5">Bi-annual</option>
                <option value="0.33">Tri-annual</option>
                <option value="4">Quarterly</option>
                <option value="12">Monthly</option>
              </select>
            </div>
            <div class="col-md-4">
              <div class="input-header">Expected Annual Increase</div>
              <div class="input-type">%</div>
              <input class="input-calc" type="number" name="DP" id="increase" tabindex=6>
            </div>
          </div>
          <!-- 3rd row -->
          <div class="row" style="margin-top: 10px;">
            <div class="col-md-4">
              <div class="input-header">Membership Dues</div>
              <div class="input-type">$</div>
              <input class="input-calc" type="number" name="MPA" id="rci" placeholder="(RCI/II) $150 Average annually" tabindex=7>
            </div>
            <div class="col-md-4">
              <div class="input-header">Exchange Company Dues</div>
              <div class="input-type">$</div>
              <input class="input-calc" type="number" name="OP" id="ecd" placeholder="$169 Average annually" tabindex=8>
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
              <div class="output blue text-center xtra" id="x10">&nbsp;
                <div class="small-text text-center">10 years</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="output blue text-center xtra" id="x15">&nbsp;
                <div class="small-text text-center">20 years</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="output blue text-center xtra" id="x20">&nbsp;
                <div class="small-text text-center">30 years</div>
              </div>
            </div>
            
          </div>
          <div class="row margin-top-20">
            <div class="col-md-4">
              <div class="output blue text-center xtra" id="x25">&nbsp;
                <div class="small-text text-center">40 years</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="output blue text-center xtra" id="x50">&nbsp;
                <div class="small-text text-center">50 years</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="output blue text-center xtra" id="x99">&nbsp;
                <div class="small-text text-center">99 years</div>
              </div>
            </div>
          </div>
            <!-- End Years Output -->
        </div>
          <!-- END OUTPUT -->
      </div>
    </div>
  </div>
  <div class="margin-top-40 open-calc">
    <img id="rr-logo-start" src="../wp-content/themes/understrap-child/assets/logos/ResortRelease.png" alt="Resort Release Color Logo">
  </div>
</div>
<script>
  jQuery('.open-calc').on('click', function(){
    jQuery('#mortgage-calc').toggle();
  });
</script>