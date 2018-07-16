<style>
  li {
    display: block;
    padding: 10px 0;
    border-top: 1px solid white;
    font-size: 1.3rem;
    cursor: pointer;
  }
  .fa{
    padding-right: 10px;
    width: 24px;
  }
  body {
    width: 100%;
    background: linear-gradient(#0e76bc, #0b7d68) !important;
  }
  a{
    color: white;
  }
  a:hover {
    color: white;
    text-decoration: underline;
  }
  ul{
    padding-left: 0;
  }
</style>
<div class="more-info margin-top-20">
  <i><h3 class="bold-name">Settings</h3></i>
  <ul class="margin-top-20">
    <!--<li><i class="fa fa-map-pin"></i> Change Address</li>
    <li><i class="fa fa-key"></i> Change Password</li>
    <li><i class="fa fa-file-text"></i> See/Upload Pending Documents</li> -->
    <li><a href="<?php echo $signout; ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
  </ul>
</div>
<script>
  function changeAddress(){
    jQuery('#changeAddress').toggle()
  }
</script>