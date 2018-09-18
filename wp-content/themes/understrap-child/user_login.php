<?php 
/*
Template Name: Login User
*/
global $wpdb, $user_ID;
/* If User Doesn't Come From Links - Register For A Callback */
// if(!$_GET['login'] == true){
//   header( 'Location:' . home_url().'/welcome' );
// }
if ($user_ID){
  // They're already logged in, so we bounce them back to dashboard.  
  header( 'Location:' . home_url().'/user-dashboard' );  
} 
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerUser']) ) {
  $errors = array();  
  // Check username is present and not already in use  
  $username = $wpdb->escape($_REQUEST['email']);  
  if ( strpos($username, ' ') !== false )
  {   
      $errors['username'] = "Sorry, no spaces allowed in usernames";  
  }  
  if(empty($username)) 
  {   
      $errors['username'] = "Please enter a username";  
  } elseif( username_exists( $username ) ) 
  {  
      $errors['username'] = "Email/Username already exists, please try another";  
  }  

  // Check email address is present and valid  
  $email = $wpdb->escape($_REQUEST['email']);  
  if( !is_email( $email ) ) 
  {   
      $errors['email'] = "Please enter a valid email";  
  } elseif( email_exists( $email ) ) 
  {  
      $errors['email'] = "Email Already Exists";  
  }  

  // Check password is valid  
  if(0 === preg_match("/.{6,}/", $_POST['password']))
  {  
    $errors['password'] = "Password must be at least six characters";  
  }  

  // Check password confirmation_matches  
  if(0 !== strcmp($_POST['password'], $_POST['password_confirmation']))
    {  
    $errors['password_confirmation'] = "Passwords do not match";  
  }  

  // Check terms of service is agreed to  
  // if($_POST['terms'] != "Yes")
  // {  
  //     $errors['terms'] = "You must agree to Terms of Service";  
  // }  

  if(0 === count($errors)){  
      $password = $_POST['password'];  
      $new_user_id = wp_create_user( $username, $password, $email );
      // You could do all manner of other things here like send an email to the user, etc. I leave that to you.  
      $success = 1;
      $login_data = array();  
      $login_data['user_login'] = $username;  
      $login_data['user_password'] = $password;  
      $login_data['remember'] = "forever";  
      $user_verify = wp_signon( $login_data, false );
      if ( is_wp_error($user_verify) ){  
        echo "<span id='error-msg' class='text-danger margin-top-20 error-msg'>Invalid login details</span>";  
      } else {    
        echo "<script type='text/javascript'>window.location.href='". home_url() ."/user-dashboard'</script>";  
        exit();  
      }  
  }else {
    echo "<span id='error-msg' class='text-danger margin-top-20 error-msg'>";
    foreach ($errors as $key => $val) {
      echo "<div>".$val."</div>";
    }
    echo "</span>";
  }
}
/* LOGIN USER */
if(isset($_POST['loginUser'])) {  
    global $wpdb;  
   
    //We shall SQL escape all inputs  
    $username = $wpdb->escape($_REQUEST['log']);  
    $password = $wpdb->escape($_REQUEST['pwd']);  
    $remember = $wpdb->escape($_REQUEST['rememberme']);  
   
    if($remember) $remember = "true";  
    else $remember = "false";  
   
    $login_data = array();  
    $login_data['user_login'] = $username;  
    $login_data['user_password'] = $password;  
    $login_data['remember'] = $remember;  
   
    $user_verify = wp_signon( $login_data, false );   
    
    if ( is_wp_error($user_verify) )   
    {  
      echo "<span id='error-msg' class='text-danger margin-top-20 error-msg'>Invalid login details</span>";  
       // Note, I have created a page called "Error" that is a child of the login page to handle errors. This can be anything, but it seemed a good way to me to handle errors.  
     } else {    
       echo "<script type='text/javascript'>window.location.href='". home_url() ."/user-dashboard'</script>";  
       exit();  
     }  
}
//Customizes the page to redirect users to after having connected with Social Login
//Use the email address as user_login
// function oa_social_login_set_email_as_user_login ($user_fields)
// {
//   if ( ! empty ($user_fields['user_email']))
//   {
//     if ( ! username_exists ($user_fields['user_email']))
//     {
//       $user_fields['user_login'] = $user_fields['user_email'];
//     }
//   }
//   return $user_fields;
// }
// //This filter is applied to new users
// add_filter('oa_social_login_filter_new_user_fields', 'oa_social_login_set_email_as_user_login');

// function oa_social_login_set_redirect_url ($url, $user_data)
// {
//     // $user_data is an object that represents the current user
//     // The format is similar to the data returned by $user_data = get_userdata ($userid);
//     // https://codex.wordpress.org/Function_Reference/get_userdata
     
//     // Redirects users to http(s)://www.your-wordpress-blog.com/members/%user_login%
//     return  get_site_url(null, '/user-dashboard/' . $user_data->user_login); 
// }
 
// // Applies the redirection filter to users that register using Social Login
// add_filter('oa_social_login_filter_registration_redirect_url', 'oa_social_login_set_redirect_url', 10, 2);
 
// // Applies the redirection filter to users that login using Social Login
// add_filter('oa_social_login_filter_login_redirect_url', 'oa_social_login_set_redirect_url', 10, 2);


get_header();
?>
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,100,700,500);
  #header-new-full-container,
  #accreditation-new-row,
  .container.main.mobile,
  .hide,
  .main-nav {
    display: none;
  }
  .error-msg{
    position: absolute;
    right: 0;
    left: 0;
    margin: 0 auto;
    text-align: center;
    z-index: 3;
    margin-top: 20px;
    font-weight: 400;
    border: 2px solid #dc3644;
    max-width: fit-content;
    padding: 4px;
    background: white;
    box-shadow: 1px 16px 45px 2px rgba(0, 0, 0, 0.5);
  }
  html, body {
    height: 100vh;
  }
  body {
    padding-top: 90px;
    background: #F7F7F7;
    color: #666666;
    font-family: 'Roboto', sans-serif;
    font-weight: 100;
  }

  body {
    width: 100%;
    background: linear-gradient(#0078B8, #008258) !important;
    height: 100vh;
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


  .card {
    border-radius: 5px;
  }

  label {
    font-weight: 300;
  }

  .card-login {
    border: none;
    -webkit-box-shadow: 0px 13px 19px 3px rgba(4, 11, 25, 0.3);
    -moz-box-shadow: 0px 13px 19px 3px rgba(4, 11, 25, 0.3);
    box-shadow: 0px 13px 19px 3px rgba(4, 11, 25, 0.3);
  }

  .card-login .checkbox input[type=checkbox] {
    margin-left: 0px;
  }

  .card-login .checkbox label {
    padding-left: 25px;
    font-weight: 300;
    display: inline-block;
    position: relative;
  }

  .card-login .checkbox {
    padding-left: 20px;
  }

  .card-login .checkbox label::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 17px;
    height: 17px;
    left: 0;
    margin-left: 0px;
    border: 1px solid #cccccc;
    border-radius: 3px;
    background-color: #fff;
    -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
  }

  .card-login .checkbox label::after {
    display: inline-block;
    position: absolute;
    width: 16px;
    height: 16px;
    left: 0;
    top: 0;
    margin-left: 0px;
    padding-left: 3px;
    padding-top: 1px;
    font-size: 11px;
    color: #555555;
  }

  .card-login .checkbox input[type="checkbox"] {
    opacity: 0;
  }

  .card-login .checkbox input[type="checkbox"]:focus+label::before {
    outline: thin dotted;
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
  }

  .card-login .checkbox input[type="checkbox"]:checked+label::after {
    font-family: 'FontAwesome';
    content: "\f00c";
  }

  .card-login>.card-heading .tabs {
    padding: 0;
  }

  .card-login h2 {
    font-size: 20px;
    font-weight: 300;
    margin: 30px;
    margin-top: 45px;
  }

  .card-login>.card-heading {
    color: #848c9d;
    background-color: #e8e9ec;
    border-color: #fff;
    text-align: center;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom: 0px;
    padding: 0px 15px;
  }

  .card-login .form-group {
    padding: 0 30px;
  }

  .card-login>.card-heading .login {
    padding: 20px 30px;
    border-bottom-left-radius: 5px;
  }

  .card-login>.card-heading .register {
    padding: 20px 30px;
    border-bottom-right-radius: 5px;
    color: #666;
  }

  .card-login>.card-heading a {
    text-decoration: none;
    color: #666;
    font-weight: 300;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
  }

  .card-login>.card-heading a#register-form-link {
    color: #fff;
    width: 100%;
    text-align: right;
  }

  .card-login>.card-heading a#login-form-link {
    width: 100%;
    text-align: left;
  }

  .card-login input[type="text"],
  .card-login input[type="email"],
  .card-login input[type="password"] {
    height: 45px;
    border: 0;
    font-size: 16px;
    -webkit-transition: all 0.1s linear;
    -moz-transition: all 0.1s linear;
    transition: all 0.1s linear;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 1px solid #e7e7e7;
    border-radius: 0px;
    padding: 6px 0px;
  }

  .card-login input:hover,
  .card-login input:focus {
    outline: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-color: #ccc;
  }

  .btn-login {
    background-color: #E8E9EC;
    outline: none;
    color: #2D3B55;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border: none;
    border-radius: 0px;
    box-shadow: none;
  }

  .btn-login:hover,
  .btn-login:focus {
    color: #fff;
    background-color: #2D3B55;
  }

  .forgot-password {
    text-decoration: underline;
    color: #888;
  }

  .forgot-password:hover,
  .forgot-password:focus {
    text-decoration: underline;
    color: #666;
  }

  .btn-register {
    background-color: #E8E9EC;
    outline: none;
    color: #2D3B55;
    font-size: 14px;
    height: auto;
    font-weight: normal;
    padding: 14px 0;
    text-transform: uppercase;
    border: none;
    border-radius: 0px;
    box-shadow: none;
  }

  .btn-register:hover,
  .btn-register:focus {
    color: #fff;
    background-color: #2D3B55;
  }

  input[type=submit] {
    padding: 10px;
  }

  input:-webkit-autofill,
  input:-webkit-autofill,
  input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 30px #e2fff2 inset !important;
  }

  .register {
    box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.18);
  }

  .login {
    box-shadow: inset 2px 2px 4px rgba(0, 0, 0, 0.18);
  }

  #register-form-link,
  #login-form-link {
    background: #2CC1CA;

  }
  .card-body{
    padding:0;
  }
  .active div {
    background: white !important;
    color: #B2ADA8 !important;
    box-shadow: none;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card card-login">
        <a href="<?php echo home_url(); ?>">
          <img src="../wp-content/themes/understrap-child/assets/logos/icon-round.png" alt="RR logo" width="120px" style="position: absolute;right: 0;left: 0; margin: 0 auto;top: -62px;">
        </a>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="<?php echo home_url(); ?>/login/?login=true" method="post" role="form" style="display: block; min-height: 302px">
                <h2 class="text-darkBlue">LOGIN</h2>
                <div class="form-group">
                  <?php echo do_shortcode('[nextend_social_login provider="facebook"]'); ?>
                </div>
                <?php if(isset($_GET['action']) && $_GET['action'] == "reset_success") {
                  echo '<div class="success form-group text-center" style="color: white;font-weight: 400;">You password has been changed. Please Check your email for your new password.</div>';}
                ?>
                <div class="form-group mauticform-row">
                <?php 
                  if(!isset($_POST['loginUser'])) {  
                    echo '<label for="user_login" class="mauticform-label">Email</label><input type="text" name="log" id="user_login" tabindex="1" class="form-control mauticform-input" placeholder="" value="">';
                  } else {
                    echo '<label for="user_login" class="mauticform-label">Email</label><input type="text" name="log" id="user_login" tabindex="1" class="form-control mauticform-input" placeholder="" value="'.$_POST['log'].'">';
                  }
                ?>
                </div>
                <div class="form-group mauticform-row">
                  <label for="user_pass" class="mauticform-label">Password</label>
                  <input type="password" name="pwd" id="user_pass" tabindex="2" class="form-control mauticform-input" placeholder="">
                </div>
                <div class="col-6 form-group pull-left checkbox">
                  <input id="rememberme" type="checkbox" name="rememberme" value="forever">
                  <label for="rememberme">Remember Me</label>
                </div>
                <div class="col-6 form-group pull-right">
                  <input id="wp-submit" type="submit" name="wp-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                  <input type="hidden" name="loginUser" value="<?php echo home_url(); ?>/user-dashboard">
                  <input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>/user-dashboard">
                </div>
                <div class="col-12 form-group pull-left">
                  <i><a href="<?php echo home_url();?>/forgot-password">Forgot Password?</a></i>
                </div>
              </form>
              <form id="register-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>#reg=true" method="post" role="form" style="display: none;">
                <h2 class="text-darkBlue">REGISTER</h2>
                <!-- <div class="form-group">
                  <input type="text" name="username" id="username" tabindex="1" class="form-control copyemail hide" placeholder="Username">
                </div> -->
                <div class="form-group">
                  <?php echo do_shortcode('[nextend_social_login provider="facebook"]'); ?>
                </div>
                <div class="form-group">
                  <small>
                    <i class="text-darkBlue" style="font-weight: 300;">Please use the same email you've used previously:</i>
                  </small>
                </div>
                <div class="form-group mauticform-row">
                  <?php 
                    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                      echo '<label for="email" class="mauticform-label">Email Address</label>
                      <input type="email" name="email" id="email" tabindex="1" class="form-control mauticform-input" style="color: #2c78b6;" value="'.$_REQUEST['email'].'">';
                    } elseif( $_SERVER['REQUEST_METHOD'] == 'GET'){
                      echo '<label for="email" class="mauticform-label">Email Address</label><input type="email" name="email" id="email" tabindex="1" class="form-control mauticform-input" style="color: #2c78b6;" value="'.$_REQUEST['email'].'">';
                    } else {
                      echo '<label for="email" class="mauticform-label">Email Address</label><input type="email" name="email" id="email" tabindex="1" class="form-control mauticform-input" value="">';
                    }
                  ?>
                </div>
                <div class="form-group mauticform-row">
                  <label for="password" class="mauticform-label">Password</label>
                  <input type="password" name="password" id="password" tabindex="2" class="form-control mauticform-input" placeholder="">
                </div>
                <div class="form-group  mauticform-row">
                  <label for="confirm-password" class="mauticform-label">Confirm Password</label>
                  <input type="password" name="password_confirmation" id="confirm-password" tabindex="2" class="form-control mauticform-input" placeholder="">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 offset-ms-3">
                      <input type="hidden" name="registerUser" value="<?php echo home_url(); ?>/user-dashboard">
                      <input type="submit" name="submit" id="submitbtn" tabindex="4" class="form-control btn btn-register" value="Register Now">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-heading">
          <div class="row">
            <div class="col-6 tabs">
              <a href="#" class="active" id="login-form-link">
                <div class="login">LOGIN</div>
              </a>
            </div>
            <div class="col-6 tabs">
              <a href="#" id="register-form-link">
                <div class="register">REGISTER</div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var url = window.location.href;
  if(url.indexOf('reg=true') > -1){
    jQuery("#register-form").delay(100).fadeIn(100);
    jQuery("#login-form").fadeOut(100);
    jQuery('#login-form-link').removeClass('active');
    jQuery("#register-form-link").addClass('active');
  }
  jQuery('#login-form-link').click(function (e) {
    jQuery("#login-form").delay(100).fadeIn(100);
    jQuery("#register-form").fadeOut(100);
    jQuery('#register-form-link').removeClass('active');
    jQuery(this).addClass('active');
    e.preventDefault();
  });
  jQuery('#register-form-link').click(function (e) {
    jQuery("#register-form").delay(100).fadeIn(100);
    jQuery("#login-form").fadeOut(100);
    jQuery('#login-form-link').removeClass('active');
    jQuery(this).addClass('active');
    e.preventDefault();
  });
  jQuery('#register-form #email').on('input blur', function () {
    var uname = jQuery(this).val();
    jQuery('#register-form #username').attr('value', uname);
    jQuery('#register-form #username').val(uname);
  })
  setTimeout(() => {    
    jQuery('.error-msg').toggle('slow');
  }, 5000);
  jQuery(window).ready(function () {
    checkForValue();
    setTimeout(checkForValue(), 100);
  });
  jQuery( document ).ready(function() {
    checkForValue();
    setTimeout(checkForValue(), 100);
  });
  function checkForValue(){
    jQuery('.mauticform-input, .mauticform-textarea, .mauticform-selectbox').each(function () {
        if (jQuery(this).val() != "") {
            jQuery(this).addClass("has-content");
            jQuery(this).prev().addClass('focus');
        } else {
            jQuery(this).removeClass("has-content");
            jQuery(this).prev().removeClass('focus');
        }
    })
    console.log('done');
  }
  jQuery('input.mauticform-input, .mauticform-textarea, .mauticform-selectbox').on('focus', function () {
      jQuery(this).prev().addClass('focus');
  });
  jQuery("input.mauticform-input, .mauticform-textarea, .mauticform-selectbox").focusout(function () {
      if (jQuery(this).val() != "") {
          jQuery(this).addClass("has-content");
      } else {
          jQuery(this).removeClass("has-content");
          jQuery(this).prev().removeClass('focus');
      }
  });
  jQuery('[name="mauticform[hearduson]"]').on('change', function () {
      if (jQuery(this).val() == "Unsure / Other") {
          jQuery('[name="mauticform[other]"]').show();
          jQuery('[name="mauticform[other]"]').prev().show();
      } else {
          jQuery('[name="mauticform[other]"]').hide();
          jQuery('[name="mauticform[other]"]').prev().hide();
      };
  });
  setTimeout(checkForValue(), .50);
  const AUTOFILLED = 'has-content'
  const onAutoFillStart = (el) => el.classList.add(AUTOFILLED)
  const onAutoFillCancel = (el) => el.classList.remove(AUTOFILLED)
  const onAnimationStart = ({ target, animationName }) => {
      console.log('LOG');
      switch (animationName) {
          case 'onAutoFillStart':
              return onAutoFillStart(target)
          case 'onAutoFillCancel':
              return onAutoFillCancel(target)
      }
  }
  document.querySelector('input').addEventListener('animationstart', onAnimationStart, false)
</script>