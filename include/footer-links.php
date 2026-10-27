<div id="myModal1" class="cmnmdl modal fade in" role="dialog">
 <div class="modal-dialog">
   <img class="close" data-dismiss="modal" src="images/cross.webp" width="30" height="30">
   <!-- Modal content-->
   <div class="modal-content">
<div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">x</button>
</div>
      <div class="modal-body">
       <div class="row">
        <div class="investRelate investRelateNw">
         <div class="col-md-12">
          <h3 class="wow fadeInUp">Login</h3>
       </div>
       <form action="/login.php" method="post">
         <div class="col-md-12">
            <div class="form-group">
               <label class="wow fadeInUp">Email</label>
               <input type="text" name="email" class="form-control">
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <label class="wow fadeInUp">Password</label>
               <input type="password" name="password" class="form-control">
            </div>
         </div>
         <div class="col-md-12">
            <button type="submit" name="login" class="btn btn-default">Sign In</button>
         </div>   
         
      </form>
      
   </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script> 
<script src="js/grt-youtube-popup.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/jquery.waypoints.min.js"></script> 
<script src="js/jquery.counterup.js"></script> 
<script src="js/custom.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/script.js"></script>
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+91-9919114888", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
<script>
  jQuery(document).ready(function( $ ) {
   $('.counter').counterUp({
     delay: 10,
     time: 500,
   });
 });
</script>

<script>
//  jQuery(document).ready(function(){

//   var doc = document.documentElement;
//   var w = window;

//   var prevScroll = w.scrollY || doc.scrollTop;
//   var curScroll;
//   var direction = 0;
//   var prevDirection = 0;

//   var header = document.getElementById('header');

//   var checkScroll = function() {

//     /*
//     ** Find the direction of scroll
//     ** 0 - initial, 1 - up, 2 - down
//     */

//     curScroll = w.scrollY || doc.scrollTop;
//     if (curScroll > prevScroll) { 
//       //scrolled up
//       direction = 2;
//     }
//     else if (curScroll < prevScroll) { 
//       //scrolled down
//       direction = 1;
//     }

//     if (direction !== prevDirection) {
//       toggleHeader(direction, curScroll);
//     }

//     prevScroll = curScroll;
//   };

//   var toggleHeader = function(direction, curScroll) {
//     if (direction === 2 && curScroll > 52) { 

//       //replace 52 with the height of your header in px

//       header.classList.add('hide');
//       prevDirection = direction;
//     }
//     else if (direction === 1) {
//       header.classList.remove('hide');
//       prevDirection = direction;
//     }
//   };

//   window.addEventListener('scroll', checkScroll);

// })(); 
</script>

<script>
  new WOW().init();
</script>

