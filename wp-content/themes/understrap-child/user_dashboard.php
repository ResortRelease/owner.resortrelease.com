<?php 
  /*
  Template Name: User Dashboard
  */
  
  global $wpdb, $user_ID;  
    //Check whether the user is already logged in  
    /* REGISTER NEW USER */
  if (!$user_ID){
      // They're already logged in, so we bounce them back to dashboard.  
      header( 'Location:' . home_url().'/login' );  
  }
  require_once('api/mt.php');
  $current_user = wp_get_current_user();
  $userEmail = $current_user->user_email;
  $user_id = $current_user->ID;
  $searchUser = $contactApi->getList($userEmail);
  $signout = wp_logout_url( home_url('/login?login=true') );
  foreach($searchUser['contacts'] as $user){
    $userArray = $user['fields']['all'];
    $userId = $user['id'];
    $fullname = $userArray['fullname'];
    $email = $userArray['email'];
    $phone = $userArray['phone'];
    $stage = $user['stage']['name'];
    $stageDesc = $user['stage']['description'];
    $stageId = $user['stage']['id'];
  }
  $notifications = 0;
  //Determine the % of status by stage id.
  switch ($stageId) {
    case "1":
        $progress = 25;
        break;
    case "2":
        $progress = 30;
        break;
    case "3":
        $progress = 35;
        break;
    case "4":
      $progress = 40;
      break;
    case "5":
      $progress = 45;
      break;
    case "6":
      $progress = 50;
      break;
    case "7":
      $progress = 55;
      break;
    case "8":
      $progress = 60;
      break;
    case "9":
      $progress = 70;
      break;
    case "10":
      $progress = 80;
      break;
    case "11":
      $progress = 90;
      break;
    case "12":
      $progress = 100;
      break;
    default:
      $progress = 0;
      $errorMessage = "<div class='text-center'>Sign Up For Our Services<br>Contact us for a FREE QUOTE</div>";
      break;
  }
  if($_POST['action'] == "patch"){
    $newpassword = $_POST['newpassword'];
    update_user_meta($user_id, 'user_pass', $newpassword);
    wp_update_user( array ('ID' => $user_id, 'user_pass' => $newpassword) ) ;
    echo "<div class='log-msg'>PASSWORD UPDATED</div>";
  }
  if(isset($_POST['fileUpload'])){
    echo "<p style='color:red;'>File Uploaded</p>";
  }
  require_once('header.php');
?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/597a4a055dfc8255d623f4ec/1cj98q3nm';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  var Tawk_API=Tawk_API||{};
</script>
<!--End of Tawk.to Script-->
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,700,500);
  #header-new-full-container,
  #accreditation-new-row,
  .container.main.mobile,
  .hide, .main-nav {
    display: none;
  }

  #notification-container {
    display: none !important;
  }
  .log-msg{
    position: fixed;
    right: 0;
    left: 0;
    margin: 0 auto;
    text-align: center;
    z-index: 3;
    margin-top: 20px;
    font-weight: 400!important;
    border: 2px solid #4caf50;
    border-radius: 8px;
    max-width: fit-content;
    padding: 4px;
    background: white;
    box-shadow: 1px 16px 45px 2px rgba(0, 0, 0, 0.5);
    color: #4caf50;
  }
  html {
    margin-top: 0px !important;
    min-height: 100%;
  }

  body {
    padding-top: 10px;
    background: #F7F7F7;
    color: #666666;
    font-family: 'Roboto', sans-serif;
    font-weight: 100;
    min-height: 100%;
  }

  body {
    width: 100%;
    background: linear-gradient(#0f4b73, #0b7d68) !important;
    height: 100vh;
    min-height: 100%;
    position: relative;
  }
  .polygon {
    position: absolute;
    width: 100%;
    height: 100%;
    background: url('../wp-content/themes/understrap-child/assets/polygon.png');
    opacity: 0.5;
    top: 0;
    left: 0;
  }

  * {
    color: white;
    /* text-shadow: 1px 1px 0px #3f617f; */
    font-weight: 300 !important;
  }

  * b {
    font-weight: 400 !important;
  }
  p {
    font-size: 1rem;
  }
  .progress {
    margin-bottom: 10px;
  }

  @-webkit-keyframes HeroBG {
    0% {
      background-position: 0 0;
    }
    50% {
      background-position: 100% 0;
    }
    100% {
      background-position: 0 0;
    }
  }

  @keyframes HeroBG {
    0% {
      background-position: 0 0;
    }
    50% {
      background-position: 100% 0;
    }
    100% {
      background-position: 0 0;
    }
  }

  #mobile-nav {
    text-align: center;
    width: 100%;
    position: fixed;
    bottom: 0px;
    z-index: 9;
    left: 15px;
  }
  #mobile-nav .button {
    background: rgb(7, 40, 50);
  }
  .progress {
    background: rgba(255, 255, 255, 0.2);
    height: 45px;
    box-shadow: 0 1px 4px #1b4d7c;
  }

  .progress-bar {
    background: -webkit-linear-gradient(left, #84DCB0, #43E0DC, #84DCB0, #43E0DC);
    background: linear-gradient(to right, #84DCB0, #43E0DC, #84DCB0, #43E0DC);
    /* background: linear-gradient( #84DCB0, #43E0DC); */
    -webkit-animation: HeroBG 20s ease infinite;
    animation: HeroBG 20s ease infinite;
    background-size: 300% 100%;
    padding: 5px 0;
  }
  .progress-bar p{
    margin-top: 0;
    margin-bottom: 0;
  }
  .noshadow {
    text-shadow: none !important;
  }

  .different-status {
    display: flex;
    flex-flow: row nowrap;
    margin-left: 10px;
  }

  .status {
    flex: 0 1 10%;
    text-align: center;
  }

  .status div {
    background: #1b4e7d;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    text-align: center;
    float: right;
    padding-top: 1px;
  }

  blockquote {
    padding: 2px 0px 12px 10px;
    margin: 0 0px 20px 0px;
    font-size: 17.5px;
    border-left: 2px solid #5bdec5;
  }
  #user-status {
    /* border: 2px solid white;
    padding: 10px;
    border-radius: 10px; */
  }
  #user-dashboard {
    padding-top: 32px;
    padding-bottom: 80px;
  }
  #settings-dashboard, #contact-dashboard{
    display:none;
  }
  @media screen and (max-width: 768px) {
    .xs-no-padding{
      padding: 0!important;
    }
  }
  .more-info {
    /* border: 1px solid #5bdec6; */
    border-radius: 8px;
    padding: 10px;
    background: rgba(1, 10, 19, 0.6);
    box-shadow: 0 0 1px #5bdec6;
  }
  .more-info i{
    text-shadow: none!important;
  }
  .fa-exclamation-circle {
    color: #ffe000;
  }
  .fa-question-circle {
    color: #84DCB0;
  }
  #user-settings, #user-contact, #user-status, #user-not-found{
    display: none;
  }
  .active{
    display: block!important;
  }
  input {
    text-shadow: none;
    color: black;
  }
  .bold-name {
    color: #43E0dc;
    letter-spacing: 1px;
    font-weight: 600!important;
  }
  .badge-icon {
    position: absolute;
    top: 0;
    right: -10px;
  }
  .badge-icon.badge-danger{
    font-size: 0.5rem;
    top: -6px;
    padding: 2px 4px;
  }
  .badge-icon.fa-envelope{
    text-shadow: 0 0 1px black, 0 0 1px black;
    font-size: 1.1rem;
  }
  #tawkchat-container {
    display:none!important;
  }
  #user-not-found{
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    padding: 5px;
    background: #287895;
    padding-top: 50px;
    z-index: 999;
  }
  #user-not-found form {
    max-width: 348px;
    margin:0 auto;
  }
  .settings-all {
    z-index: 999;
  }
</style>
<div class="polygon"></div>
<div id="user-not-found" class="getpage">
  <h3><?php echo $errorMessage ?></h3>
  <div><?php include('forms/dashboard-form.php'); ?></div>
  <div style="width: 100%" class="text-center">
    <div class="button success margin-top-20" style="font-size: 1.3rem; padding: 9px 105px;"><b>Call Now!</b></div>
  </div>
</div>
<div class="container" id="user-dashboard">
  <header class="row" id="header-dashboard">
    <div class="col-4 text-left">
      <img src="../wp-content/themes/understrap-child/assets/logos/icon-round.png" alt="RR logo" width="50px" id="RR-logo">
    </div>
    <div class="col-8 text-right" style="padding-top: 12px;">
      <p>Status as of:
        <b>
          <?php echo date("m/d/Y") ?>
        </b>
      </p>
    </div>
  </header>
  <nav id="mobile-nav" class="row d-lg-none">
    <div class="col-4">
      <div class="round-shadow"></div>
      <div class="button round-primary" onclick="showItem('#user-status');">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/home.svg" alt="RR home" width="30px" class="margin-auto">
    </div>
    </div>
    <div class="col-4">
      <div class="round-shadow"></div>
      <div class="button round-primary" onclick="showItem('#user-contact');">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/chat.svg" alt="RR chat" width="30px" class="margin-auto">
      </div>
    </div>
    <div class="col-4">
      <div class="round-shadow"></div>
      <div class="button round-primary" onclick="showItem('#user-settings');" class="settings-all">
        <?php
          if ($notifications >= 1){
            echo '<i class="fa fa-envelope badge-icon"></i><span class="badge-icon badge badge-danger badge-pill">'.$notifications.'</span>';
          }
        ?>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/settings.svg" alt="RR settings" width="30px" class="margin-auto">
      </div>
    </div>
  </nav>
  <div class="row margin-top-20">
    <div class="col-12 col-lg-10">
      <h4 class="text-left text-capitalize">Hello, <b><?php echo $fullname ?></b></h4>
      <div id="user-status" class="getpage active">
        <div class="margin-top-20 more-info">
          <h4><b>Your Current Status:</b></h4>
          <h3><i><b class="bold-name"><?php echo $stage ?></b></i></h3>
          <div class="progress" id="userStatusBar">
            <div class="progress-bar" role="progressbar" aria-valuenow="'.$progress.'" aria-valuemin="0" aria-valuemax="100" style="width:0%;" data-animate="<?php echo $progress ?>">
              <p>
                <!-- <b class="text-darkBlue noshadow"> -->
                <span class="badge badge-info badge-pill" style="display: none;"><b><?php echo $progress ?>%</b></span>
              </p>
            </div>
          </div>
          <div class="margin-top-20">
            <p>
              <b>"<?php echo $stageDesc ?>"</b>
            </p>
          </div>
        </div>
        <p class="more-info margin-top-20">
          <i class="fa fa-question-circle" aria-hidden="true"></i><i> If you do have any questions regarding the process or how to execute the documents, please feel free to click below and start a chat or contact us at <a href="tel:888-381-5216">888-381-5216</a>.</i>
        </p>
        <p class="more-info margin-top-20" style="box-shadow: 0 0 1px #fae000;">
          <i class="fa fa-exclamation-circle" aria-hidden="true"></i><i> As part of our services we request a copy of your most recent maintenance bill or proof of payment if its already been processed. Please send  bills or proof of payment to <a href="mailto:fees@resortrelease.com" style="text-decoration: underline;">fees@resortrelease.com</a> or Fax <a href="tel:815-321-4668">815-321-4668</a></i>
        </p>
      </div>
      <div id="main-dashboard">
        <div id="user-settings" class="getpage">
          <?php include('user_settings.php') ?>
        </div>
        <div id="user-contact" class="getpage">
          <?php include('user_contact.php') ?>
        </div>
      </div>
    </div>
    <div class="col-lg-2 d-none d-lg-block" style="position: sticky;top: 0;padding-top: 47px;">
      <div class="row text-center">
        <div class="round-shadow"></div>
        <div class="button round-primary"  onclick="showItem('#user-status');">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/home.svg" alt="RR home" width="30px" class="margin-auto">
        </div>
      </div>
      <div class="row text-center">
        <div class="round-shadow"></div>
        <div class="button round-primary" onclick="showItem('#user-contact');">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/chat.svg" alt="RR chat" width="30px" class="margin-auto">
        </div>
      </div>
      <div class="row text-center">
        <div class="round-shadow"></div>
        <div class="button round-primary" onclick="showItem('#user-settings');" class="settings-all">
          <?php
            if ($notifications >= 1){
              echo '<i class="fa fa-envelope badge-icon"></i><span class="badge-icon badge badge-danger badge-pill">'.$notifications.'</span>';
            }
          ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/settings.svg" alt="RR settings" width="30px" class="margin-auto">
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function showSettings(){
    jQuery('#main-dashboard').toggle('slow');
    jQuery('#settings-dashboard').toggle('slow');
  }
  function showContactUs(){
    jQuery('#main-dashboard').toggle('slow');
    jQuery('#contact-dashboard').toggle('slow');
  }
  function ajaxCall(page){
    jQuery.ajax({url: "../wp-content/themes/understrap-child/"+page+".php", 
    type: 'GET',
    success: function(result){
        if(page == "user_home"){
          jQuery('#user-status').show();
        }else{
          jQuery('#user-status').hide();
        }
        jQuery("#main-dashboard").html(result);
        window.scrollTo(0, 0);
      },
      error: function(){}
    });
  }
  function showItem(item){
    jQuery( ".getpage" ).each(function( index ) {
      jQuery(this).removeClass('active');
    });
    jQuery(item).addClass('active');
    window.scrollTo(0, 0);
  }
  function toggleChat(){
    Tawk_API.showWidget();
    Tawk_API.maximize();
  }
  Tawk_API.onLoad = function(){
    Tawk_API.hideWidget();
  };
  Tawk_API.onChatMinimized = function(){
    Tawk_API.hideWidget();
  };
  setTimeout(() => {    
    jQuery('.log-msg').toggle('slow');
  }, 5000);
  jQuery(window).load(function(){
    var per = jQuery('.progress-bar').attr('data-animate');
    jQuery('.progress-bar').animate({ width: per+'%' }
    ,function(){
      jQuery('.progress-bar .badge').fadeIn('slow');
    }); 
  });
</script>
<?php 
  if($errorMessage){
    echo '<script type="text/javascript">',
    'showItem("#user-not-found");
    jQuery("#user-status").removeClass("active")',
    '</script>';
  }
  $hash = hash_hmac("sha256",$email,"0f307a52e7f464ba43e063fdbbd3daec3c1c5b23");
  echo '
  <script>
    Tawk_API.visitor = {
      name : "'.$fullname.'",
      email : "'.$email.'",
      hash : "'.$hash.'"
    };
  </script>
  '
?>