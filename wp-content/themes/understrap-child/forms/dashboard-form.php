<?php
global $wpdb, $user_ID;  
$current_user = wp_get_current_user();
$email = $current_user->user_email;
?>
<style>
  body{
    padding-bottom: 300px;
  }
</style>
<div id="mauticform_wrapper_rrallleadsformdash" class="mauticform_wrapper">
    <form autocomplete="false" role="form" method="post" action="https://e.resortrelease.com/form/submit?formId=12" id="mauticform_rrallleadsformdash" data-mautic-form="rrallleadsformdash" enctype="multipart/form-data">
        <div class="mauticform-error" id="mauticform_rrallleadsformdash_error"></div>
        <div class="mauticform-message" id="mauticform_rrallleadsformdash_message"></div>
        <div class="mauticform-innerform">
            <div class="mauticform-page-wrapper mauticform-page-1" data-mautic-form-page="1">
                <div id="mauticform_rrallleadsformdash_full_name" data-validate="full_name" data-validation-type="text" class="mauticform-row mauticform-text mauticform-field-1 mauticform-required">
                    <label id="mauticform_label_rrallleadsformdash_full_name" for="mauticform_input_rrallleadsformdash_full_name" class="mauticform-label">Full Name</label>
                    <input id="mauticform_input_rrallleadsformdash_full_name" name="mauticform[full_name]" value="" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;">This is required.</span>
                </div>

                <input id="mauticform_input_rrallleadsformdash_first_name1" name="mauticform[first_name1]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_last_name1" name="mauticform[last_name1]" value="" class="mauticform-hidden" type="hidden" />
                <div id="mauticform_rrallleadsformdash_email_address" data-validate="email_address" data-validation-type="email" class="mauticform-row mauticform-email mauticform-field-4 mauticform-required">
                    <label id="mauticform_label_rrallleadsformdash_email_address" for="mauticform_input_rrallleadsformdash_email_address" class="mauticform-label">Email Address</label>
                    <input id="mauticform_input_rrallleadsformdash_email_address" name="mauticform[email_address]" value="<?php echo $email ?>" class="mauticform-input" type="email" />
                    <span class="mauticform-errormsg" style="display: none;">This is required.</span>
                </div>

                <div id="mauticform_rrallleadsformdash_phonenumber" data-validate="phonenumber" data-validation-type="text" class="mauticform-row mauticform-text mauticform-field-5 mauticform-required">
                    <label id="mauticform_label_rrallleadsformdash_phonenumber" for="mauticform_input_rrallleadsformdash_phonenumber" class="mauticform-label">Phone Number</label>
                    <input id="mauticform_input_rrallleadsformdash_phonenumber" name="mauticform[phonenumber]" value="" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;">This is required.</span>
                </div>

                <div id="mauticform_rrallleadsformdash_resortname" class="mauticform-row mauticform-text mauticform-field-6">
                    <label id="mauticform_label_rrallleadsformdash_resortname" for="mauticform_input_rrallleadsformdash_resortname" class="mauticform-label">Resort Name</label>
                    <input id="mauticform_input_rrallleadsformdash_resortname" name="mauticform[resortname]" value="" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;"></span>
                </div>

                <div id="mauticform_rrallleadsformdash_comments" class="mauticform-row mauticform-text mauticform-field-7">
                    <label id="mauticform_label_rrallleadsformdash_comments" for="mauticform_input_rrallleadsformdash_comments" class="mauticform-label">Comments</label>
                    <textarea id="mauticform_input_rrallleadsformdash_comments" name="mauticform[comments]" class="mauticform-textarea" maxlength="500"></textarea>
                    <span class="mauticform-errormsg" style="display: none;"></span>
                </div>
                <div id="mauticform_rrallleadsformdash_other" class="mauticform-row mauticform-text mauticform-field-9">
                    <label id="mauticform_label_rrallleadsformdash_other" for="mauticform_input_rrallleadsformdash_other" style="display:none;" class="mauticform-label">Other</label>
                    <input id="mauticform_input_rrallleadsformdash_other" name="mauticform[other]" value="" style="display:none;" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;"></span>
                </div>

                <input id="mauticform_input_rrallleadsformdash_website" name="mauticform[website]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_utm_campaign" name="mauticform[utm_campaign]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_utm_source" name="mauticform[utm_source]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_utm_medium" name="mauticform[utm_medium]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_utm_content" name="mauticform[utm_content]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_utm_term" name="mauticform[utm_term]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_utm_ad" name="mauticform[utm_ad]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_utm_adgroup" name="mauticform[utm_adgroup]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_utm_placement" name="mauticform[utm_placement]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_gacid" name="mauticform[gacid]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_gclid" name="mauticform[gclid]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_msclkid" name="mauticform[msclkid]" value="" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_crmleadsource" name="mauticform[crmleadsource]" value="RESORT RELEASE" class="mauticform-hidden" type="hidden" />
                <input id="mauticform_input_rrallleadsformdash_crmleadsubsource" name="mauticform[crmleadsubsource]" value="" class="mauticform-hidden" type="hidden" />
                <div id="mauticform_rrallleadsformdash_elpot" style="display: none;" style="display: none;" class="mauticform-row mauticform-text mauticform-field-24">
                    <label id="mauticform_label_rrallleadsformdash_elpot" for="mauticform_input_rrallleadsformdash_elpot" class="mauticform-label">elPot</label>
                    <input id="mauticform_input_rrallleadsformdash_elpot" name="mauticform[elpot]" value="" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;"></span>
                </div>

                <div id="mauticform_rrallleadsformdash_submit" class="mauticform-row mauticform-button-wrapper mauticform-field-25">
                    <button type="submit" name="mauticform[submit]" id="mauticform_input_rrallleadsformdash_submit" name="mauticform[submit]" value="" class="mauticform-button button primary" style="width: 100%" value="1">Submit</button>
                </div>
                <div id="mauticform_rrallleadsformdash_facebook_login" style="display: none;" class="mauticform-row mauticform-div-wrapper mauticform-field-25 text-center social-login">
                    <a href="#" onclick="openOAuthWindow('https://e.resortrelease.com/plugins/integrations/authuser/Facebook')">
                        <img src="https://e.resortrelease.com/media/images/btn_Facebook.png" style="display: inline-block;">
                        <i style="color: inherit!important">
                            <span>Quick Facebook Sign Up</span>
                        </i>
                    </a>
                </div>
                <script src="https://e.resortrelease.com/social/generate/rrallleadsformdash.js" type="text/javascript" charset="utf-8" async="async"></script>
            </div>
        </div>
        <input type="hidden" name="mauticform[formId]" id="mauticform_rrallleadsformdash_id" value="12" />
        <input type="hidden" name="mauticform[return]" id="mauticform_rrallleadsformdash_return" value="" />
        <input type="hidden" name="mauticform[formName]" id="mauticform_rrallleadsformdash_name" value="rrallleadsformdash" />
    </form>
</div>
<div id="tos">
    <a href="https://resortrelease.com/terms-and-conditions">By clicking submit you are agreeing to our <span style="text-decoration: underline;">Terms and Conditions.</span></a>
</div>
<div class="badges text-center margin-top-20">
  <img src="../wp-content/themes/understrap-child/assets/3_badges.png" alt="">
</div>
<script type="text/javascript">
    jQuery(window).ready(function () {
      jQuery('.mauticform-input, .mauticform-textarea, .mauticform-selectbox').each(function () {
          if (jQuery(this).val() != "") {
              jQuery(this).addClass("has-content");
              jQuery(this).prev().addClass('focus');
          } else {
              jQuery(this).removeClass("has-content");
              jQuery(this).prev().removeClass('focus');
          }
      })
    });
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
</script>