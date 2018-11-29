<style>
  li {
    display: block;
    padding: 10px 0;  
    font-size: 1.3rem;
  }
  .icon-box {
    display: inline-block;
    margin-right: 10px;
    width: 32px;
  }
  .fa{
    padding-right: 10px;
    width: 24px;
  }
  #contact-settings {
    margin-top: 0;
  } 
  .line {
    border-top: 1px solid rgba(0,0,0,0.1);    
    border-bottom: 0px solid white;
  }
</style>
<div class="more-info" id="contact-settings" style="margin-top: 0;">
  <i><h3 class="bold-name">Contact Us</h3></i>
  <ul class="margin-top-20">
    <div class="line"></div>
    <li><a href="tel:888-381-5216"><div class="icon-box"><i class="fa fa-phone bold-icon"></i></div> 888-381-5216</a></li>
    <div class="line"></div>
    <li onclick="toggleChat();"><div class="icon-box"><i class="fa fa-commenting bold-icon"></i></div> Chat With Us</li>
  </ul>
  <?php 
    if($open == 1) {
      echo "<i>Now Open. Chat or call.</i>";
    } else {
      echo "<i>Now Closed. You can still leave a message in the chat.</i>";
    }
  ?>
</div>