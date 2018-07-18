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
  $signout = wp_logout_url( home_url('/login') );
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
      $progress = 60;
      break;
    case "8":
      $progress = 70;
      break;
    case "9":
      $progress = 80;
      break;
    case "10":
      $progress = 90;
      break;
    case "11":
      $progress = 100;
      break;
    default:
      $progress = 0;
      $errorMessage = 'User Not Found!';
      break;
  }
  if($_POST['action'] == "patch"){
    $newpassword = $_POST['newpassword'];
    update_user_meta($user_id, 'user_pass', $newpassword);
    wp_update_user( array ('ID' => $user_id, 'user_pass' => $newpassword) ) ;
    header( 'Location:' . home_url().'/login' );
  }
  require_once('header.php');
?>
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
    background: linear-gradient(#0e76bc, #0b7d68) !important;
    /* background: -webkit-linear-gradient(left, #0e76bc, #24d3d3, #0e76bc, #24d3d3);
    background: linear-gradient(to right, #0e76bc, #24d3d3, #0e76bc, #24d3d3); */
    /* background-size: 600% 100%; */
    /* -webkit-animation: HeroBG 20s ease infinite;
            animation: HeroBG 20s ease infinite; */
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

  .progress {
    background: white;
    height: 30px;
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
    border: 2px solid #5bdec6;
    border-radius: 8px;
    padding: 10px;
    background: #0c365d;
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
  #RR-logo{
    background: #071b2f;
    padding: 4px;
    border-radius: 10px;
    border: 2px inset red;
  }
</style>
<div class="container" id="user-dashboard">
  <header class="row" id="header-dashboard">
    <div class="col-4 text-left">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/RR-logo-white.svg" alt="RR logo" width="50px" id="RR-logo">
    </div>
    <div class="col-8 text-right">
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
      <div class="button round-secondary" onclick="showItem('#user-status');">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/home.svg" alt="RR home" width="30px" class="margin-auto">
    </div>
    </div>
    <div class="col-4">
      <div class="round-shadow"></div>
      <div class="button round-success" onclick="showItem('#user-contact');">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/chat.svg" alt="RR chat" width="30px" class="margin-auto">
      </div>
    </div>
    <div class="col-4">
      <div class="round-shadow"></div>
      <div class="button round-primary" onclick="showItem('#user-settings');">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/settings.svg" alt="RR settings" width="30px" class="margin-auto">
      </div>
    </div>
  </nav>
  <div class="row margin-top-20">
    <div class="col-12 col-lg-10">
      <h4 class="text-left">Hello, <b><?php echo $fullname ?></b></h4>
      <div id="user-status" class="getpage active">
        <div class="margin-top-20 more-info">
          <h3><i><b class="bold-name"><?php echo $stage ?></b></i></h3>
          <div class="progress" id="userStatusBar">
            <div class="progress-bar" role="progressbar" aria-valuenow="'.$progress.'" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress ?>%;">
              <p>
                <b class="text-darkBlue noshadow">
                  <?php echo $progress ?>%</b>
              </p>
            </div>
          </div>
          <div class="margin-top-20">
            <p>
              "<?php echo $stageDesc ?>"
            </p>
          </div>
        </div>
        <p class="more-info margin-top-20" style="border-color: #84DCB0;">
          <i class="fa fa-question-circle" aria-hidden="true"></i><i> If you do have any questions regarding the process or how to execute the documents, please feel free to click below and start a chat or contact us at 888-381-5216.</i>
        </p>
        <p class="more-info margin-top-20" style="border-color: #fae000;">
          <i class="fa fa-exclamation-circle" aria-hidden="true"></i><i> As part of our services we request a copy of your most recent maintenance bill or proof of payment if its already been processed. Please send  bills or proof of payment to <a href="mailto:fees@resortrelease.com" style="text-decoration: underline;">fees@resortrelease.com</a> or Fax <a href="tel:815-321-4668">815-321-4668</a></i>
        </p>
      </div>
      <div id="main-dashboard">
        <div id="user-not-found" class="getpage">
          <?php //include('user-not-found.php') ?>
          <h3><?php echo $errorMessage ?></h3>
        </div>
        <div id="user-settings" class="getpage">
          <?php include('user_settings.php') ?>
        </div>
        <div id="user-contact" class="getpage">
          <?php include('user_contact.php') ?>
        </div>
      </div>
    </div>
    <div class="col-lg-2 d-none d-lg-block" style="position: sticky;top: 0;">
      <div class="row text-center">
        <div class="round-shadow"></div>
        <div class="button round-secondary"  onclick="showItem('#user-status');">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/home.svg" alt="RR home" width="30px" class="margin-auto">
        </div>
      </div>
      <div class="row text-center">
        <div class="round-shadow"></div>
        <div class="button round-success" onclick="showItem('#user-contact');">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/chat.svg" alt="RR chat" width="30px" class="margin-auto">
        </div>
      </div>
      <div class="row text-center">
        <div class="round-shadow"></div>
        <div class="button round-primary" onclick="showItem('#user-settings');">
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
  }
</script>
<?php 
  if($errorMessage){
    echo '<script type="text/javascript">',
      'showItem("#user-not-found");
      jQuery("#user-status").removeClass("active")',
      '</script>';
  }
?>