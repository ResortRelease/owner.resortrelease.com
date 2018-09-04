<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<?php 
/*
Template Name: Custom WordPress Password Reset
*/
global $wpdb, $user_ID;

function tg_validate_url() {
  global $post;
  $page_url = esc_url(get_permalink( $post->ID ));
  $urlget = strpos($page_url, "?");
  if ($urlget === false) {
    $concate = "?";
  } else {
    $concate = "&";
  }
  return $page_url.$concate;
}
if($_POST['action'] == "tg_pwd_reset"){
  if ( !wp_verify_nonce( $_POST['tg_pwd_nonce'], "tg_pwd_nonce")) {
    exit("No trick please");
  }
  if(empty($_POST['user_input'])) {
    echo'<span class="error">Please enter your Username or E-mail address</span>';
    exit();
  }
  //We shall SQL escape the input
  $user_input = $wpdb->escape(trim($_POST['user_input']));
   
  if ( strpos($user_input, '@') ) {
    $user_data = get_user_by('email', $user_input);
    if(empty($user_data) || $user_data->caps[administrator] == 1) {
    //the condition $user_data->caps[administrator] == 1 to prevent password change for admin users.
    //if you prefer to offer password change for admin users also, just delete that condition.
    echo'<span class="error">Invalid E-mail address!</span>';
    exit();
    }
  }
  else {
    $user_data = get_userdatabylogin($user_input);
    if(empty($user_data) || $user_data->caps[administrator] == 1) {
    //the condition $user_data->caps[administrator] == 1 to prevent password change for admin users.
    //if you prefer to offer password change for admin users also, just delete that condition.
  echo'<span class="error">Invalid Username!</span>';
    exit();
    }
  }
  $user_login = $user_data->user_login;
  $user_email = $user_data->user_email;
   
  $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
  if(empty($key)) {
    //generate reset key
    $key = wp_generate_password(20, false);
    $wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));
  }
  //emailing password change request details to the user
  $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
  $message .= get_option('siteurl') . "\r\n\r\n";
  $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
  $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
  $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
  $message .= tg_validate_url() . "action=reset_pwd&key=$key&login=" . rawurlencode($user_login) . "\r\n";
  if ( $message && !wp_mail($user_email, 'Password Reset Request', $message) ) {
    echo "<div class='error'>Email failed to send for some unknown reason.</div>";
    exit();
  } else{
     echo '<div class="success margin-top-20 text-center" style="color:white;padding: 5px; font-weight: 400;">We have just sent you an email with Password reset instructions.</div>';
     exit();
  }
}

// GET CORRECT LINK FROM EMAIL
if(isset($_GET['key']) && $_GET['action'] == "reset_pwd") {
  $reset_key = $_GET['key'];
  $user_login = $_GET['login'];
  $user_data = $wpdb->get_row($wpdb->prepare("SELECT ID, user_login, user_email FROM $wpdb->users WHERE user_activation_key = %s AND user_login = %s", $reset_key, $user_login));
  $user_login = $user_data->user_login;
  $user_email = $user_data->user_email;
  if(!empty($reset_key) && !empty($user_data)) {
    $new_password = wp_generate_password(7, false); //you can change the number 7 to whatever length needed for the new password
    wp_set_password( $new_password, $user_data->ID );
    //mailing the reset details to the user
    $message = __('Your new password for the account at:') . "\r\n\r\n";
    $message .= get_bloginfo('name') . "\r\n\r\n";
    $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
    $message .= sprintf(__('Password: %s'), $new_password) . "\r\n\r\n";
    $message .= __('You can now login with your new password at: ') . get_option('siteurl')."/login" . "\r\n\r\n";
   
    if ( $message && !wp_mail($user_email, 'Password Reset Request', $message) ) {
      echo "<div class='error'>Email failed to sent for some unknown reason</div>";
      exit();
    }
    else {
      $redirect_to = get_bloginfo('url')."/login?action=reset_success";
      wp_safe_redirect($redirect_to);
      exit();
    }
  }
  else exit('Not a Valid Key.');
   
}
//Check whether the user is already logged in  
/* REGISTER NEW USER */
if (!$user_ID){
    //  Validation Stuff
    echo '
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card card-login">
            <a href="'. home_url() .'/login=?login=true">
              <img src="../wp-content/themes/understrap-child/assets/logos/icon-round.png" alt="RR logo" width="120px" style="position: absolute;right: 0;left: 0; margin: 0 auto;top: -62px;">
            </a>
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2">
                <div id="content">
                <h1><?php the_title(); ?></h1>
                <h2 class="text-center">Reset Password</h2>
                <form id="wp_pass_reset" action="" method="post">
                <div id="result"></div> <!-- To hold validation results -->
                <input type="text" name="user_input" value="" placeholder="Username or E-mail" style="width:100%;" class="margin-top-20"/><br />
                <input type="hidden" name="action" value="tg_pwd_reset" />
                <input type="hidden" name="tg_pwd_nonce" value="'.wp_create_nonce("tg_pwd_nonce").'" />
                <input type="submit" id="submitbtn" name="submit" value="Reset" class="form-control btn btn-register margin-top-20"/>
                <div class="margin-top-20">
                  <i><a href="'. home_url().'/login">login</a></i>
                </div>
                </form>
                <script type="text/javascript">
                jQuery("#wp_pass_reset").submit(function() {
                  jQuery("#result").html("<span class=\'loading\'>Validating...</span>").fadeIn();
                  var input_data = jQuery("#wp_pass_reset").serialize();
                  jQuery.ajax({
                    type: "POST",
                    url:  "'. get_permalink( $post->ID ).'",
                    data: input_data,
                    success: function(msg){
                      console.log(msg);
                      jQuery(".loading").remove();
                      jQuery("<div>").html(msg).appendTo("div#result").hide().fadeIn("slow");
                    }
                  });
                  return false;
                });
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>';
  } else {  
    // They're already logged in, so we bounce them back to dashboard.  
    wp_redirect( home_url("/user-dashboard") ); exit;
}
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

  body {
    padding-top: 90px;
    background: #F7F7F7;
    color: #666666;
    font-family: 'Roboto', sans-serif;
    font-weight: 100;
  }

  body {
    width: 100%;
    background: -webkit-linear-gradient(right, #0e76bc, #24d3d3, #0e76bc, #24d3d3);
    background: linear-gradient(to left, #0e76bc, #24d3d3, #0e76bc, #24d3d3);
    background-size: 600% 100%;
    /* -webkit-animation: HeroBG 20s ease infinite;
            animation: HeroBG 20s ease infinite; */
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
    -webkit-box-shadow: 0px 0px 49px 14px rgba(188, 190, 194, 0.39);
    -moz-box-shadow: 0px 0px 49px 14px rgba(188, 190, 194, 0.39);
    box-shadow: 0px 0px 49px 14px rgba(188, 190, 194, 0.39);
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

  .active div {
    background: white !important;
    color: #B2ADA8 !important;
    box-shadow: none;
  }
</style>