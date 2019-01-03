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
  echo "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MV5MQFQ');</script>
<!-- End Google Tag Manager -->";
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
        $ico = 'fa fa-search';
        break;
    case "2":
        $progress = 30;
        $ico = 'fa fa-file-alt';
        break;
    case "3":
        $progress = 35;
        $ico = 'fa fa-archive';
        break;
    case "4":
      $ico = 'fa fa-hand-point-right';
      $progress = 40;
      break;
    case "5":
      $ico = 'fa fa-home';
      $progress = 45;
      break;
    case "6":
      $ico = 'fa fa-file-alt';
      $progress = 50;
      break;
    case "7":
      $ico = 'fa fa-check';
      $progress = 55;
      break;
    case "8":
      $ico = 'fa fa-send';
      $progress = 60;
      break;
    case "9":
      $ico = 'fa fa-send';
      $progress = 70;
      break;
    case "10":
      $ico = 'fa fa-microphone';
      $progress = 80;
      break;
    case "11":
      $ico = 'fa fa-hourglass';
      $progress = 90;
      break;
    case "12":
      $progress = 100;
      break;
    case "13":
      $ico = 'fa fa-hourglass';
      $progress = 10;
      $stage = 'In Progress';
      $stageDesc = 'Welcome to Resort Release. We are currently processing your account. An update will be provided as soon as your Case Manager has been assigned.';
      break;
    default:
      $progress = 0;
      header( 'Location:' . 'https://www.resortrelease.com' );
      break;
  }
  $hash = hash_hmac("sha256",$email,"ce5c877c2048f8a3d8dad0ab75a0df9c97457e9f");
  if($_POST['action'] == "patch"){
    $newpassword = $_POST['newpassword'];
    update_user_meta($user_id, 'user_pass', $newpassword);
    wp_update_user( array ('ID' => $user_id, 'user_pass' => $newpassword) ) ;
    echo "<div class='log-msg'>PASSWORD UPDATED</div>";
    echo "
    <script>
      window.dataLayer.push({
        'passwordResetType': 'Change'
      });
      dataLayer.push({'event': 'passwordReset'});
    </script>";
  }
  if(isset($_POST['fileUpload'])){
    echo "<p style='color:red;'>File Uploaded</p>";
  }
  $info = getdate();
  $date = $info['mday'];
  $month = $info['mon'];
  $year = $info['year'];
  $weekday = $info['weekday'];
  $hour = $info['hours'];
  $current_date = "$date/$month/$year == $hour:$min:$sec";
  if($weekday != "Sunday"){
    if($hour >= 8 && $hour < 23){
      $open = true;
    } else {
      $open = false;
    }
  } else {
    $open = false;
  }
  require_once('header-app.php');
  echo "<script>
    dataLayer.push({
      'userName': '" . $fullname . "',
      'userEmail': '" . $email . "',
      'userStage': '" . $stage . "'
    });
  </script>";
?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
  (function () {
    var s1 = document.createElement("script"),
      s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/5b982e53c9abba57967771c9/default';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
  })();
  var Tawk_API = Tawk_API || {};
  Tawk_API.visitor = {
    name: "<?php echo $fullname ?>",
    email: "<?php echo $email ?>",
    stage: "<?php echo $stage ?>",
    phone: "<?php echo $phone ?>",
    hash: "<?php echo $hash ?>"
  }
  var Tawk_LoadStart = new Date();
</script>
<!--End of Tawk.to Script-->
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,700,500);

  #header-new-full-container,
  #accreditation-new-row,
  #user-settings,
  #user-contact,
  #user-status,
  #user-not-found,
  #settings-dashboard,
  #contact-dashboard,
  .container.main.mobile,
  .hide,
  .main-nav {
    display: none;
  }

  #notification-container {
    display: none !important;
  }

  .log-msg {
    position: fixed;
    right: 0;
    left: 0;
    margin: 0 auto;
    top:100px;
    text-align: center;
    z-index: 3;
    margin-top: 20px;
    font-weight: 400 !important;
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
    position: relative;
  }

  body {
    /* background: #F6F6F6; */
    background: #FFFFFF;
    min-height: 100%;
    width: 100%;
    min-height: 100%;
    padding-bottom: 40px;
    color: #656565;
    /* text-shadow: 1px 1px 0px #3f617f; */
    font-weight: 400 !important;
    font-family: "Helvetica", "Avenir", "Verdana", sans-serif;
    line-height: 1.5em !important;
  }

  * b {
    font-weight: 900 !important;
  }

  *:not(.fa) {}

  h1,
  h2,
  h3,
  p,
  span {
    line-height: 1.5em !important;
  }

  p {
    font-size: 1.1rem;
  }

  .progress {
    margin-bottom: 10px;
  }

  #mobile-nav {
    text-align: center;
    width: 100%;
    /* padding: 8px; */
    position: sticky;
    z-index: 9;
    left: 0px;
    right: 0;
    margin: 0 auto;
    background: white;
    box-shadow: 0 -3px 25px rgba(7, 39, 68, 0.1);
  }

  #mobile-nav .button {
    background: rgb(7, 40, 50);
  }

  .progress {
    background: white;
    height: 45px;
    box-shadow: 0 3px 30px 6px rgba(7, 39, 68, 0.3);
    position: relative;
    top: -24px;
    border-radius: 50px;
    border: 3px solid white;
  }

  .progress-bar {
    /* background: -webkit-linear-gradient(left, #84DCB0, #43E0DC, #84DCB0, #43E0DC);
    background: linear-gradient(to right, #84DCB0, #43E0DC, #84DCB0, #43E0DC); */
    background: -webkit-linear-gradient(#00d000, #009a00);
    background: linear-gradient(#00d000, #009a00);
    /* background: linear-gradient( #84DCB0, #43E0DC); */
    /* -webkit-animation: HeroBG 20s ease infinite;
    animation: HeroBG 20s ease infinite;
    background-size: 300% 100%; */
    padding: 5px 0;
    box-shadow: 1px 0 20px rgba(0, 0, 0, 0.5);
  }

  .progress-bar p {
    margin-top: 0;
    margin-bottom: 0;
    color: white;
    font-size: 1.6rem;
    font-weight: 900 !important;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);
  }

  .more-info {
    margin: 40px 0;
  }

  .chatbox {
    /* background: #00517C; */
    background: #113d53;
    color: white;
    padding: 12px;
    border-radius: 22px;
    position: relative;
  }

  .chatbox p {
    font-size: 0.9rem;
    padding-left: 20px;
  }

  .chatbox a {
    color: white;
  }

  .chatboxIcon {
    /* color: #0078B8; */
    color: #195172;
    position: absolute;
    left: 5px;
    top: -4px;
    font-size: 5rem;
    height: 100%;
    overflow: hidden;
  }

  .arrow-down {
    width: 0;
    height: 0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-top: 37px solid #113d53;
    position: absolute;
    bottom: -18px;
    left: 0px;
    transform: rotate(32deg);
    z-index: -1;
  }

  .arrow-up {
    width: 0;
    height: 0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-bottom: 37px solid #1b527c;
    position: absolute;
    bottom: -18px;
    left: 0px;
    transform: rotate(32deg);
    z-index: -1;
  }

  .more-info i {
    position: relative;
    top: 4px;
    padding: 0 !important;
    margin: 0 auto;
    width: auto !important;
  }

  .fa-exclamation-circle {
    color: #ffe000;
  }

  .fa-question-circle {
    color: #84DCB0;
  }

  .active {
    display: block !important;
  }

  input {
    text-shadow: none;
    color: black;
  }

  .stage-name {
    margin-bottom: 40px;
  }

  .bold-name {
    color: #ff0303;
    letter-spacing: -1px;
    font-weight: 900 !important;
    font-size: 2rem;
    text-transform: uppercase;
  }

  h3.bold-name {
    color: #2d76bc;
    font-size: 1.4rem;
  }

  .bold-icon {
    color: #0078B8;
    letter-spacing: 1px;
    font-weight: 900 !important;
    font-size: 2rem;
    text-shadow: 0 1px 1px rgba(17, 61, 83, 0.4);
    font-style: italic;
  }

  .badge-icon {
    position: absolute;
    top: 0;
    right: -10px;
  }

  .badge-icon.badge-danger {
    font-size: 0.5rem;
    top: -6px;
    padding: 2px 4px;
  }

  .badge-icon.fa-envelope {
    text-shadow: 0 0 1px black, 0 0 1px black;
    font-size: 1.1rem;
  }

  #tawkchat-container {
    display: none !important;
  }

  #user-not-found {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    padding: 5px;
    background: #F6F6F6;
    padding-top: 50px;
    z-index: 999;
  }

  #user-not-found form {
    max-width: 348px;
    margin: 0 auto;
  }

  .settings-all {
    z-index: 999;
  }

  .separator {
    text-align: center;
  }

  .separator * {
    display: inline-block;
    padding: 0 15px;
  }

  .separator .line {
    border: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid white;
    width: 30%;
  }

  .separator .icon {
    position: relative;
    top: 3px;
    pointer-events: none;
  }

  #header-dashboard {
    background: #003D53;
    padding: 40px 12px;
    position: relative;
    overflow: hidden;
    padding-bottom: 60px;
  }

  #header-dashboard * {
    color: white;
    text-shadow: 2px 2px 3px #113d53;
  }

  .bg-logo {
    position: absolute;
    top: 20px;
    left: 0;
    right: 0;
    opacity: 0.6;
    pointer-events: none;
  }

  a {
    color: inherit !important;
  }

  a.question {
    /* color: #3dc3b3!important; */
    display: block;
    margin-top: 15px;
    text-align: right;
    font-size: 1.3rem;
  }

  a.exclamation {
    color: #dcca4a !important;
  }

  .small-date {
    position: absolute;
    top: -30px;
    right: 0;
  }

  .selected {
    border-bottom: 2px solid;
    margin-top: -2px;
    background: #fbfbfb;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.09);
  }

  .selected.first {
    border-color: rgba(61, 195, 179, 0.40);
  }

  .selected.second {
    border-color: rgba(220, 202, 74, 0.40);
  }

  .selected.third {
    border-color: rgba(186, 56, 56, 0.40);
  }

  .wrapper {
    position: absolute;
    min-height: 100%;
    width: 100%;
    top: 0;
    left: 0;
  }

  [class|="confetti"] {
    position: absolute;
  }

  .red {
    background-color: #E94A3F;
  }

  .yellow {
    background-color: #FAA040;
  }

  .blue {
    background-color: #5FC9F5;
  }

  .round-icon {
    background: #0e76bc;
    color: white;
    width: 80px;
    height: 80px;
    margin: 0 auto;
    text-align: center;
    border-radius: 50%;
    position: relative;
    font-size: 2.8rem;
    padding-top: 12px;
    /* box-shadow: 0 3px 30px 6px rgba(7, 39, 68, 0.3); */
  }

  .info-bar {
    /* background: #FFC480; */
    background: #fbf2be;
    padding: 10px;
  }

  .info-bar a {
    color: #00517C !important;
  }

  .info-bar p {
    font-size: 0.9rem !important;
  }
  .tab {
    cursor: pointer;
  }
</style>
<div class="container main-container" style="padding:0;">
  <nav id="mobile-nav" class="row">
    <div class="col-4 home tab first" onclick="showItem('#user-status');">
      <div class="round-shadow"></div>
      <div class="btn" >
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/home-dark.svg" alt="RR home" width="30px" class="margin-auto">
      </div>
    </div>
    <div class="col-4 contact tab second" onclick="showItem('#user-contact');">
      <div class="round-shadow"></div>
      <div class="btn">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/chat-dark.svg" alt="RR chat" width="30px" class="margin-auto">
      </div>
    </div>
    <div class="col-4 settings tab third" onclick="showItem('#user-settings');" class="settings-all">
      <div class="round-shadow"></div>
      <div class="btn">
        <?php
      if ($notifications >= 1){
        echo '<i class="fa fa-envelope badge-icon"></i><span class="badge-icon badge badge-danger badge-pill">'.$notifications.'</span>';
      }
      ?>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/settings-dark.svg" alt="RR settings" width="30px" class="margin-auto">
      </div>
    </div>
  </nav>
  <div id="user-not-found" class="getpage">

    <h3>
      <?php echo $errorMessage ?>
    </h3>
    <div style="width: 100%" class="text-center">
      <a href="tel:888-758-0993">
        <div class="button success margin-top-20" style="font-size: 1.3rem; padding: 9px 105px; color:white!important;"><b style="color:white!important;font-weight: 600!important">Call Now! <br> (888)758-0993</b></div>
      </a>
    </div>
    <div class="margin-top-20 text-center">OR</div>
    <div>
      <?php include('forms/dashboard-form.php'); ?>
    </div>
  </div>
  <div class="container" id="user-dashboard">
    <header class="row" id="header-dashboard">
      <div class="wrapper"></div>
      <div class="bg-logo text-center"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/rr-logo-blue.svg" alt=""></div>
      <div class="col-12 text-right">
        <small class="small-date">Status as of:
          <b>
            <?php echo date("m/d/Y") ?>
          </b>
        </small>
      </div>
      <div class="col-12 text-center margin-top-20">
        <h4 class="text-capitalize ">Hello, <b>
            <?php echo $fullname ?></b></h4>
        <h4>Your Current Status:</h4>
      </div>
    </header>
    <div class="progress" id="userStatusBar">
      <div class="progress-bar" role="progressbar" aria-valuenow="'.$progress.'" aria-valuemin="0" aria-valuemax="100" style="width:0%;" data-animate="<?php echo $progress ?>">
        <p class="badge" style="display:none;">
          <?php echo $progress ?>%
        </p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row margin-top-20">
      <div class="col-12 col-lg-12">
        <div id="user-status" class="getpage active">
          <div class="more-info" style="margin-top: 0;">
            <div class="stage-name text-center animate fadeInUp">
              <h3>
                <b class="bold-name text-uppercase">
                  <?php echo $stage ?>
                </b>
              </h3>
            </div>
            <div class="round-icon animate fadeInUp" style="animation-delay: .5s;">
              <?php if($stageId != 12){
              echo '<div class="elIcon"><i class="'.$ico.'"></i></div>';
            } else {
              echo '<img src="'.get_stylesheet_directory_uri().'/assets/icons/bird.png" alt="Timeshare Freedom Bird" style="margin-top:-12px;">';
            };?>
            </div>
            <div class="more-info animate fadeInUp" style="animation-delay: .9s;">
              <p>
                "<?php echo $stageDesc ?>"
              </p>
            </div>
          </div>
          <!-- <div class="more-info" style="background: #eeeeee;margin-left: -15px;margin-right: -15px;padding: 15px;">
          <div class="row">
            <div class="col-6">
              <div class="video">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dashboard/video-placeholder.jpg" alt="Welcome video">              
              </div>
            </div>
            <div class="col-6">
              <span>What is blue and smells like red paint? The answer will shock you!</span>
            </div>
          </div>
        </div> -->
          <?php if($stageId != 12): ?>
          <div class="more-info chatbox animate fadeInUp" style="animation-delay: 1.3s;">
            <div class="chatboxIcon"><i class="fa fa-question"></i></div>
            <p><i> If you do have any questions regarding the process or how to execute the documents, please feel free to click below and start a chat or contact us at:</i></p>
            <a href="tel:888-381-5216" class="question">888-381-5216</a>
            <div class="arrow-down">
            </div>
          </div>
          <?php include('testimonial-slider.php') ?>
          <?php else: ?>
          <div class="more-info animate fadeInUp" style="animation-delay: 1.3s;">
            <h3 class="text-uppercase text-center bold-name"><b>Would You <span style="display: inline-block;">Recommend Us?</span></b></h3>
            <div class="row margin-top-20">
              <div class="col-6 text-center">
                <a data-toggle="modal" data-target=".bs-example-modal-sm" style="cursor:pointer;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/like.png" alt="Like us"></a>
              </div>
              <div class="col-6 text-center">
                <a href="https://www.resortrelease.com/bad-review/" target="_blank" rel="noopener noreferrer" style="cursor:pointer;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/dislike.png" alt="Dislike us" style="margin-top: 50px; width: 100px;"></a>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <!-- <div class="separator">
          <div class="line"></div>
          <div class="icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/exclamation-svg.svg" alt="RR separator"></div>
          <div class="line"></div>
        </div> -->
          <div class="row">
            <div class="more-info info-bar animate fadeIn" style="animation-delay: 2s;">
              <div class="row margin-auto">
                <div class="col-2" style="padding:0;">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/information.png" class="img-fluid" alt="" style="position: relative;top: 5%;">
                </div>
                <div class="col-10">
                  <p style="color:#3c3c3c">
                    <b><i> As part of our services we request a copy of your most recent maintenance bill or proof of payment if its already been processed. Please send bills or proof of payment to <a href="mailto:fees@resortrelease.com" class="exclamation" style="text-decoration: underline;">fees@resortrelease.com</a> or <span style="display: inline-block;">Fax <a href="tel:815-321-4668" class="exclamation">815-321-4668</a></span></i></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
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
    </div>
  </div>
</div>
<!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="myModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="padding: 30px 12px;">
      <p><b>Leave a review in:</b></p>
      <div class="row margin-top-20">
        <div class="col-4 text-center"><a onclick="gaReview('Google Plus')" href="https://goo.gl/DJDvcp" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/g-plus.jpg" alt="" style="max-width: 50px;"></a></div>
        <div class="col-4 text-center"><a onclick="gaReview('Facebook')" href="https://www.facebook.com/pg/resortrelease/reviews/" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/fb.jpg" alt="" style="max-width: 50px;"></a></div>
        <div class="col-4 text-center"><a onclick="gaReview('BBB')" href="https://www.bbb.org/chicago/business-reviews/timeshare-advocates/resort-release-in-rockford-il-88596110/reviews-and-complaints/?review=true" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/bbb.jpg" alt="" style="max-width: 50px;"></a></div>
      </div>
    </div>
  </div>
</div>
<script>
  // jQuery('#myModal').modal('toggle')
  function showSettings() {
    jQuery('#main-dashboard').toggle('slow');
    jQuery('#settings-dashboard').toggle('slow');
  }

  function showContactUs() {
    jQuery('#main-dashboard').toggle('slow');
    jQuery('#contact-dashboard').toggle('slow');
  }

  function ajaxCall(page) {
    jQuery.ajax({
      url: "../wp-content/themes/understrap-child/" + page + ".php",
      type: 'GET',
      success: function (result) {
        if (page == "user_home") {
          jQuery('#user-status').show();
        } else {
          jQuery('#user-status').hide();
        }
        jQuery("#main-dashboard").html(result);
        window.scrollTo(0, 0);
      },
      error: function () {}
    });
  }

  function getSelected(item) {
    jQuery('.tab').removeClass('selected');
    switch (item) {
      case "#user-status":
        jQuery('#mobile-nav .home').addClass('selected');
        break;
      case "#user-settings":
        jQuery('#mobile-nav .settings').addClass('selected');
        break;
      case "#user-contact":
        jQuery('#mobile-nav .contact').addClass('selected');
        break;
      default:
        jQuery('#mobile-nav .home').addClass('selected');
        break;
    }
  };
  getSelected();

  function showItem(item) {
    jQuery(".getpage").each(function (index) {
      jQuery(this).removeClass('active');
    });
    jQuery(item).addClass('active');
    window.scrollTo(0, 0);
    getSelected(item);
  }

  function toggleChat() {
    Tawk_API.showWidget();
    Tawk_API.maximize();
  }
  Tawk_API.onLoad = function () {
    Tawk_API.hideWidget();
  };
  Tawk_API.onChatMinimized = function () {
    Tawk_API.hideWidget();
  };
  setTimeout(() => {
    jQuery('.log-msg').toggle('slow');
  }, 5000);
  jQuery(window).load(function () {
    var per = jQuery('.progress-bar').attr('data-animate');
    jQuery('.progress-bar').animate({
      width: per + '%'
    }, function () {
      jQuery('.progress-bar .badge').fadeIn('slow');
    });
  });

  function isClosed() {
    for (var i = 0; i < 120; i++) {
      create(i);
    }
  }

  function create(i) {
    var width = Math.random() * 8;
    var height = width * 0.4;
    var colourIdx = Math.ceil(Math.random() * 3);
    var colour = "red";
    switch (colourIdx) {
      case 1:
        colour = "yellow";
        break;
      case 2:
        colour = "blue";
        break;
      default:
        colour = "red";
    }
    jQuery('<div class="confetti-' + i + ' ' + colour + '"></div>').css({
      "width": width + "px",
      "height": height + "px",
      "top": -Math.random() * 20 + "%",
      "left": Math.random() * 100 + "%",
      "opacity": Math.random() + 0.5,
      "transform": "rotate(" + Math.random() * 360 + "deg)"
    }).appendTo('.wrapper');

    drop(i);
  }

  function drop(x) {
    jQuery('.confetti-' + x).animate({
      top: "100%",
      left: "+=" + Math.random() * 15 + "%"
    }, Math.random() * 3000 + 3000, function () {
      reset(x);
    });
  }

  function reset(x) {
    jQuery('.confetti-' + x).animate({
      "top": -Math.random() * 20 + "%",
      "left": "-=" + Math.random() * 15 + "%"
    }, 0, function () {
      drop(x);
    });
  }
  function gaReview(label) {
    window.dataLayer.push({
      'reviewProfile': label
    });
    dataLayer.push({'event': 'leaveReview'});
  }
</script>
<?php 
  if($errorMessage){
    echo '<script type="text/javascript">',
    'showItem("#user-not-found");
    jQuery("#user-status").removeClass("active")',
    '</script>';
  }
  if($stageId == 12){
    echo '<script>isClosed();</script>';
  }
?>