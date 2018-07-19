
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
  #pw-status{
    color: #8ac44a;
    font-style: italic;
  }
  #settings{
    margin-bottom: 400px;
  }
</style>
<div class="more-info margin-top-20" id="settings">
  <i><h3 class="bold-name">Settings</h3></i>
  <ul class="margin-top-20">
    <li><i class="fa fa-map-pin"></i> Change Address</li>
    <a href="#changePass"><li><i class="fa fa-key"></i> Change Password</li></a>
    <div class="collapse" id="changePass">
      <i><h4 class="bold-name">Change Password</h4></i>
      <div id="pw-status"></div>
      <form id="update-password" action="" method="post">
        <div class="form-group">
          <input type="hidden" name="action" value="patch" />
          <input id="changePW" type="password" class=" form-control margin-top-20" placeholder="New Password" name="newpassword">
        </div>
        <div class="form-group">
          <button class="form-control button success" type="submit"  name="submit" value="Change Password">Change Password</button>
        </div>
      </form>
    </div>
    <li><i class="fa fa-file-text"></i> See/Upload Pending Documents</li>
    <li><a href="<?php echo $signout; ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
  </ul>
</div>
<script>
  jQuery('a[href="#changePass"]').click(function(){
    jQuery('#changePass').toggle('slow');
  });
</script>