<style>
  li {
    display: block;
    padding: 10px 0;
    border-top: 1px solid white;
    font-size: 1.3rem;
  }
  .fa{
    padding-right: 10px;
    width: 24px;
  }
</style>
<div class="margin-top-20 more-info" id="contact-settings">
  <i><h3 class="bold-name">Contact Us</h3></i>
  <ul class="margin-top-20">
    <li><a href="tel:888-381-5216"><i class="fa fa-phone"></i> 888-381-5216</a></li>
    <li onclick="toggleChat();"><i class="fa fa-commenting"></i> Chat With Us</li>
  </ul>
</div>
<script>
  window.addEventListener('hashchange', function() {
    // Hash for chat has changed. Remove Tawk.to
    Tawk_API.hideWidget();
  });
</script>