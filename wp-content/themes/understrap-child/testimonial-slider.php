<style>
  .testimonial-box{
    background: #f8fcff;
    border-radius: 5px;
    padding: 12px 5%;
    position: relative;
    padding-top: 10px;
    border: 1px solid rgba(44, 120, 183, 0.30);
    min-height: 138px;
    height: auto;
    max-height: 305px;
    display: inline-grid;
    margin:0 auto;
    margin-top: 50px;
  }
  .t-stars, .t-picture, .left, .right {
    position: absolute;
  }
  .left {
    left: -15px;
    top: 44%;
  }
  .right {
    right: -15px;
    top: 44%;
  }
  .t-stars {
    top: -26px;
    right: 85px;
    color: #f7d35e;
  }
  .t-picture {
    top: -70px;
    right: 0;
    width: 80px;
    height: 80px;
    border: 2px solid white;
    border-radius: 50px;
    /* box-shadow: 0 0 4px grey;
    background: rgba(44, 120, 183, 0.65); */
  }
  .t-name {
    font-weight: 600;
    position: absolute;
    top: -50px;
    right: 86px;
  }
  .t-comment {
    display: flex;
    justify-content: center;
    flex-direction: column;
  }
</style>
<div class="more-info animated slideIn" style="animation-delay: 1.3s;">
  <div class="testimonial-box boxed">
    <div class="right text-right"><i class="fa fa-chevron-right"></i></div>
    <div class="t-stars text-right"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
    <div class="t-picture text-right"><img data-dir="<?php echo get_stylesheet_directory_uri(); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dashboard/Pam.png" alt="Client Image"></div>
    <div class="t-name animated fadeIn text-right"><p>Pam Manghelli</p></div>
    <div class="t-comment animated fadeIn text-left"><p>Your staff was very friendly and patient with my questions and concerns. 
    I especially appreciated being able to review all documents before I really made a decision. 
    I'm glad I went through with your service! I feel nothing but relief to be free from those resorts! Thanks Resort Release!!!</p></div>  
  </div>
</div>
<script>
  var pic = jQuery(".t-picture img");
  var picPre = jQuery(".t-picture img").attr("data-dir");
  var a = ["Pam Manghelli", "Mary Lin Metcalf", "George Picket", "John Tillery", "Don Wilson"];
  var b = ["Your staff was very friendly and patient with my questions and concerns. I especially appreciated being able to review all documents before I really made a decision. I'm glad I went through with your service! I feel nothing but relief to be free from those resorts! Thanks Resort Release!!!",
           "I was very pleased with the whole experience. Everything was clearly explained and I was kept informed at each step in the process. Everyone I came in contact with was professional and knowledgeable. It was such a pleasure to go through this as securely as I did. I am now timeshare FREE all thanks to RESORT RELEASE!",
           "NO more maintenance fees!! Your process is very easy to follow and you delivered on every promise that was made. Competitive pricing, strong guarantees, and credible references. From the start, your directions were clear and easy to follow. The constant updates assured me that my case was continually being worked on until that magic day we were RELEASED from the timeshare!",
           "We tried your competitors and only lost more money! We don’t know of any other company who can say they have any success helping people like us get out of the endless money pit of a timeshare. From the bottom of our hearts, thank you for giving us our freedom back.",
           "Everything Resort Release promised they fulfilled 100%. The process was absolutely flawless. Your staff were always engaged along every step of the way. Considering how much we lost over the years trying to pay for this timeshare that we could hardly use, your company has relieved a HUGE burden from us. Many, many thanks."];
  var p = ["/assets/dashboard/Pam.png","/assets/dashboard/Mary.png","/assets/dashboard/George.png","/assets/dashboard/John.png","/assets/dashboard/Don.png"];
  var stop = false;
  setInterval(function(){
    if(stop != true) {  
      switchTestimonial()
    }
  }, 5000);
  var i = 1;  
  jQuery(".right").on("click", function(){
    stop = true;
    switchTestimonial();
  });  
  function switchTestimonial() {
      var c = jQuery(".t-name");
      var d = jQuery(".t-comment");
      c.html(a[i]).fadeIn(500);
      d.html(b[i]).fadeIn(500);
      pic.attr("src", picPre + p[i]);
      i == 4 ? i = 0 :  i++;
  }
</script>