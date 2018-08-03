<script type="text/javascript">
    /** This section is only needed once per page if manually copying **/
    if (typeof MauticSDKLoaded == 'undefined') {
        var MauticSDKLoaded = true;
        var head            = document.getElementsByTagName('head')[0];
        var script          = document.createElement('script');
        script.type         = 'text/javascript';
        script.src          = 'https://e.resortrelease.com/media/js/mautic-form.js';
        script.onload       = function() {
            MauticSDK.onLoad();
        };
        head.appendChild(script);
        var MauticDomain = 'https://e.resortrelease.com';
        var MauticLang   = {
            'submittingMessage': "Please wait..."
        }
    }
</script>
<div id="mauticform_wrapper_rruseraddresschange" class="mauticform_wrapper">
    <form autocomplete="false" role="form" method="post" action="https://e.resortrelease.com/form/submit?formId=26" id="mauticform_rruseraddresschange" data-mautic-form="rruseraddresschange" enctype="multipart/form-data">
        <div class="mauticform-error" id="mauticform_rruseraddresschange_error"></div>
        <div class="mauticform-message" id="mauticform_rruseraddresschange_message"></div>
        <div class="mauticform-innerform">
            <div class="mauticform-page-wrapper mauticform-page-1" data-mautic-form-page="1">
                <div id="mauticform_rruseraddresschange_email_address" data-validate="email_address" data-validation-type="email" class="mauticform-row mauticform-email mauticform-field-1 mauticform-required">
                    <input id="mauticform_input_rruseraddresschange_email_address" name="mauticform[email_address]" value="<?php echo $email ?>" class="mauticform-hidden" type="hidden" />
                </div>
                <div id="mauticform_rruseraddresschange_address_line_1" data-validate="address_line_1" data-validation-type="text" class="mauticform-row mauticform-text mauticform-field-2 mauticform-required">
                    <label id="mauticform_label_rruseraddresschange_address_line_1" for="mauticform_input_rruseraddresschange_address_line_1" class="mauticform-label">Address Line 1</label>
                    <input id="mauticform_input_rruseraddresschange_address_line_1" name="mauticform[address_line_1]" value="" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;">This is required.</span>
                </div>
                <div id="mauticform_rruseraddresschange_address_line_2" class="mauticform-row mauticform-text mauticform-field-3">
                    <label id="mauticform_label_rruseraddresschange_address_line_2" for="mauticform_input_rruseraddresschange_address_line_2" class="mauticform-label">Address Line 2</label>
                    <input id="mauticform_input_rruseraddresschange_address_line_2" name="mauticform[address_line_2]" value="" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;"></span>
                </div>
                <div id="mauticform_rruseraddresschange_city" class="mauticform-row mauticform-text mauticform-field-4">
                    <label id="mauticform_label_rruseraddresschange_city" for="mauticform_input_rruseraddresschange_city" class="mauticform-label">City</label>
                    <input id="mauticform_input_rruseraddresschange_city" name="mauticform[city]" value="" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;"></span>
                </div>
                <div id="mauticform_rruseraddresschange_state1" class="mauticform-row mauticform-text mauticform-field-5">
                    <label id="mauticform_label_rruseraddresschange_state1" for="mauticform_input_rruseraddresschange_state1" class="mauticform-label">State</label>
                    <input id="mauticform_input_rruseraddresschange_state1" name="mauticform[state1]" value="" class="mauticform-input" type="text" />
                    <span class="mauticform-errormsg" style="display: none;"></span>
                </div>
                <div id="mauticform_rruseraddresschange_zip_code" class="mauticform-row mauticform-number mauticform-field-6">
                    <label id="mauticform_label_rruseraddresschange_zip_code" for="mauticform_input_rruseraddresschange_zip_code" class="mauticform-label">Zip Code</label>
                    <input id="mauticform_input_rruseraddresschange_zip_code" name="mauticform[zip_code]" value="" class="mauticform-input" type="number" />
                    <span class="mauticform-errormsg" style="display: none;"></span>
                </div>
                <div id="mauticform_rruseraddresschange_change_address" class="mauticform-row mauticform-button-wrapper mauticform-field-7">
                    <button type="submit" name="mauticform[change_address]" id="mauticform_input_rruseraddresschange_change_address" name="mauticform[change_address]" value="" class="mauticform-button button success" style="width: 100%" value="1">Change Address</button>
                </div>
            </div>
        </div>

        <input type="hidden" name="mauticform[formId]" id="mauticform_rruseraddresschange_id" value="26" />
        <input type="hidden" name="mauticform[return]" id="mauticform_rruseraddresschange_return" value="" />
        <input type="hidden" name="mauticform[formName]" id="mauticform_rruseraddresschange_name" value="rruseraddresschange" />

    </form>
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