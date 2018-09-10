
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
    margin-top: 0;
  }
  #seeUpload {
    max-width: 314px;
  }
  #fileinput{
    background: white;
    padding: 5px;
    color: #10365d;
    border-radius: 5px
  }
  form#update-password {
    max-width: 250px;
  }
  form#update-password button{
    font-weight: 600!important;
      font-size: 1.1rem;
      text-shadow: 0 2px 0 #75ab39;
  }
</style>
<div class="more-info animated fadeInUp" id="settings">
  <i><h3 class="bold-name">Settings</h3></i>
  <ul class="margin-top-20">
    <!-- <li class="settings" data-toggle="#changeAddress"><i class="fa fa-map-pin"></i> Change Address</li>
    <div id="changeAddress" class="collapse">
      <?php// include('forms/change-address.php')?>
    </div> -->
    <div class="line"></div>
    <li class="settings" data-toggle="#changePass"><i class="fa fa-key bold-icon"></i> Change Password</li>
    <div class="collapse" id="changePass">
      <i><h4 class="bold-name">Change Password</h4></i>
      <div id="pw-status"></div>
      <form id="update-password" action="" method="post">
        <div class="form-group">
          <input type="hidden" name="change" value="change" />
          <input type="hidden" name="action" value="patch" />
          <input id="changePW" type="password" class=" form-control margin-top-20" placeholder="New Password" name="newpassword">
        </div>
        <div class="form-group">
          <button class="form-control button success" type="submit"  name="submit" value="Change Password">Change Password</button>
        </div>
      </form>
    </div>
    <!-- <a href="#?checkPending"><li class="settings" data-toggle="#seeUpload">
      <i class="fa fa-file-text"></i> See/Upload Pending Documents  -->

    <!-- </li></a> -->
    <!-- <div class="collapse" id="seeUpload">
      <i><h4 class="bold-name">Pending Documents</h4></i>
      <div id="pw-status"></div>


      
      <form id="pending-documents" action="" method="post">
        <div class="form-group">
          <input type="file" id="fileinput" />
          <input type="hidden" name="fileUpload" value="1">
        </div>
        <div class="form-group">
          <button class="form-control button success" type="submit"  name="submit" value="Change Password">Upload File</button>
        </div>
      </form>
    End Upload Form -->



    <!-- </div> -->
    <div class="line"></div>
    <li><a href="<?php echo $signout; ?>"><i class="fa fa-sign-out bold-icon"></i> Log Out</a></li>
  </ul>
</div>
<script>
  jQuery('li.settings').click(function(){
    var href = jQuery(this).attr('data-toggle');
    jQuery(href).toggle('slow');
  });
</script>