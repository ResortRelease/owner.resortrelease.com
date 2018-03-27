<div class="container text-center mortgage-content">
  <h1>Mortgage 1</h1>
  <div class="row margin-top-20">
    <!-- Bill of Rights -->    
    <div class="col-md-6 img-magnifier-container">
      <img id="bill-of-rights" src="<?php bloginfo('stylesheet_directory'); ?>/assets/slides/1/bill-of-rights.jpg" alt="Bill Of Rights">
    </div>
    <!-- Mildred Video -->
    <div class="col-md-6 ">
      <div class="row">
        <div class="video-container">
            <div id="3tKatApzA-w" class="youtube" data-params="modestbranding=1&amp;showinfo=0&amp;rel=0&amp;controls=0&amp;vq=hd720"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
	"use strict";
	jQuery(function($) {
    $(".youtube").each(function() {
      $(this).append($('<img/>', {'src': 'https://i.ytimg.com/vi/' + this.id + '/maxresdefault.jpg'}));
      $(this).append($('<i class="fa fa-youtube-play"></i>'));
      $(document).delegate('#'+this.id, 'click', function() {
        var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
        if ($(this).data('params')) iframe_url+='&'+$(this).data('params');
        var iframe = $('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': $(this).width(), 'height': $(this).height() })
        $(this).replaceWith(iframe);
      });
    });
  });
// Magnify Function
magnify("bill-of-rights", 2);
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>