<?php 
/*
Template Name: Login User
*/
global $wpdb, $user_ID;
//Check whether the user is already logged in  
/* REGISTER NEW USER */
if ($user_ID){
    // They're already logged in, so we bounce them back to dashboard.  
    header( 'Location:' . home_url().'/user-dashboard' );  
} else
 {  
   
    $errors = array();  
   
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
      {  
   
        // Check username is present and not already in use  
        $username = $wpdb->escape($_REQUEST['username']);  
        if ( strpos($username, ' ') !== false )
        {   
            $errors['username'] = "Sorry, no spaces allowed in usernames";  
        }  
        if(empty($username)) 
        {   
            $errors['username'] = "Please enter a username";  
        } elseif( username_exists( $username ) ) 
        {  
            $errors['username'] = "Username already exists, please try another";  
        }  
   
        // Check email address is present and valid  
        $email = $wpdb->escape($_REQUEST['email']);  
        if( !is_email( $email ) ) 
        {   
            $errors['email'] = "Please enter a valid email";  
        } elseif( email_exists( $email ) ) 
        {  
            $errors['email'] = "This email address is already in use";  
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
   
        if(0 === count($errors)) 
         {  
            $password = $_POST['password'];  
   
            $new_user_id = wp_create_user( $username, $password, $email );  
   
            // You could do all manner of other things here like send an email to the user, etc. I leave that to you.  
   
            $success = 1;  
   
            //header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username );  
   
        }  
   
    }  
}  
/* LOGIN USER */
if($_POST) 
{  
   
    global $wpdb;  
   
    //We shall SQL escape all inputs  
    $username = $wpdb->escape($_REQUEST['username']);  
    $password = $wpdb->escape($_REQUEST['password']);  
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
        //echo "Invalid login details";  
       // Note, I have created a page called "Error" that is a child of the login page to handle errors. This can be anything, but it seemed a good way to me to handle errors.  
     } else
    {    
       echo "<script type='text/javascript'>window.location.href='". home_url() ."/user-dashboard'</script>";  
       exit();  
     }  
   
} else 
{  
   
    // No login details entered - you should probably add some more user feedback here, but this does the bare minimum  
   
    //echo "Invalid login details";  
   
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
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card card-login">
        <a href="<?php echo home_url(); ?>">
          <img src="../wp-content/themes/understrap-child/assets/logos/RR-only-logo-color.png" alt="RR logo" width="120px" style="position: absolute;right: 0;left: 0; margin: 0 auto;top: -62px;">
        </a>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="<?php echo home_url(); ?>/wp-login.php" method="post" role="form" style="display: block; min-height: 302px">
                <h2 class="text-darkBlue">LOGIN</h2>
                <div class="form-group">
                  <input type="text" name="log" id="user_login" tabindex="1" class="form-control" placeholder="Email" value="">
                </div>
                <div class="form-group">
                  <input type="password" name="pwd" id="user_pass" tabindex="2" class="form-control" placeholder="Password">
                </div>
                <div class="col-6 form-group pull-left checkbox">
                  <input id="rememberme" type="checkbox" name="rememberme" value="forever">
                  <label for="rememberme">Remember Me</label>
                </div>
                <div class="col-6 form-group pull-right">
                  <input id="wp-submit" type="submit" name="wp-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                  <input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>/user-dashboard">
                </div>
              </form>
              <form id="register-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" role="form" style="display: none;">
                <h2 class="text-darkBlue">REGISTER</h2>
                <div class="form-group">
                  <input type="text" name="username" id="username" tabindex="1" class="form-control copyemail hide" placeholder="Username" value="">
                </div>
                <div class="form-group">
                  <small>
                    <i class="text-darkBlue" style="font-weight: 300;">Please use the same email you've used previously</i>
                  </small>
                  <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" name="password_confirmation" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 offset-ms-3">
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
  jQuery(function ($) {
    $('#login-form-link').click(function (e) {
      $("#login-form").delay(100).fadeIn(100);
      $("#register-form").fadeOut(100);
      $('#register-form-link').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });
    $('#register-form-link').click(function (e) {
      $("#register-form").delay(100).fadeIn(100);
      $("#login-form").fadeOut(100);
      $('#login-form-link').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });
    $('#email').on('input blur', function () {
      $('.copyemail').val($(this).val());
    })
  });
</script>