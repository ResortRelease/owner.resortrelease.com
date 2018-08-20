<style>
  li {
    display: block;
    padding: 10px 0;  
    font-size: 1.3rem;
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
    <li><a href="tel:888-381-5216"><i class="fa fa-phone bold-name"></i> 888-381-5216</a></li>
    <div class="line"></div>
    <li onclick="toggleChat();"><i class="fa fa-commenting bold-name"></i> Chat With Us</li>
  </ul>
</div>
<script>
  window.addEventListener('hashchange', function() {
    // Hash for chat has changed. Remove Tawk.to
    Tawk_API.hideWidget();
  });
</script>