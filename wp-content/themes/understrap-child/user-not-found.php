<h1>Oops,</h1>
<h3>we could not find a user with email: <?php echo $userEmail ?></h3>
<div class="row">
    <div class="col-md-5">
        <div class="mauticform-row">
            <label for="" class="mauticform-label">Search Your Account Using you email</label>
            <input type="text" placeholder="Search By" name="search" value="test@" class="mauticform-input">
        </div>
        <div class="margin-top-20">
            <button type="submit" name="submit" class="button primary" onclick="showUser();">Submit</button>
        </div>
    </div>
</div>
<div id="results"></div>
<script>
function showUser(){
    var index = jQuery('[name="search"]').val();
    jQuery.ajax({
        url: '../wp-content/themes/understrap-child/api/searchUser.php',
        type: 'POST',
        data: {
            'index': index
        },
        success: function (output) {
            jQuery('#results').html(output);
        }
    });
}
</script>