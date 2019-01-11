<script>
  jQuery(window).resize(function() {
    stickyHeader();
  });
  // jQuery('#myModal').modal('toggle')
  function showSettings() {
    jQuery('#main-dashboard').toggle('slow');
    jQuery('#settings-dashboard').toggle('slow');
  }

  function showContactUs() {
    jQuery('#main-dashboard').toggle('slow');
    jQuery('#contact-dashboard').toggle('slow');
  }
  function stickyHeader() {
    if (jQuery(window).width() > 767) {
      jQuery("nav").addClass('toTop').removeClass('toBottom');
    }else {
      jQuery("nav").addClass('toBottom').removeClass('toTop');
    }
  }
  stickyHeader();
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
  jQuery( document ).ready(function(){
    jQuery('.loading').hide();
  });
</script>