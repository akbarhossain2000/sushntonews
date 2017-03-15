<?php
/**
*	Template Name: Contact Page 
**/
	get_header();
?>   
    <!--==================================
    =            START PAGE TITLE        =
    ===================================-->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-wrapper page-title-wrapper2">
            <div class="container">
              <h2 class="pull-left title"> <span class="cat-icon"><i class="fa fa-phone"></i> </span> Contact Us</h2>
              <!-- breadcrumb -->
              <ol class="breadcrumb pull-right">
                <li><a href="<?php bloginfo( 'home' ); ?>">Home</a></li>
                <li class="active">Contact Us</li>
              </ol> <!-- //breadcrumb -->
            </div> <!-- //container -->
          </div> <!-- //page-title-wrapper -->
        </div>
      </div> <!-- //row -->
    </section>
    <!--====  End of PAGE TITLE  ====-->
    
    
    
    <!--==================================
    =            START MAIN WRAPPER      =
    ===================================-->
    <section class="main-wrapper contact-page">
      <div class="container">
        <div class="mtb70">
           <h2 class="title">Address</h2>
           <div class="row">
             <div class="col-sm-8">
               <div id="google-map" data-latitude="52.365629" data-longitude="4.871331" data-wow-duration="1000ms" >
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6142.546025825876!2d90.40913960067233!3d23.73383494809177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85f41f16093%3A0x226580cd9d9f5be2!2sNaya+Paltan%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1487014501259" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			   
               </div>
             </div>
             <div class="col-sm-4">
               <h3>Office</h3> <br>  
               <p>
                 828 L St NW #906, <br>
                 Washington, DC 20036, United States <br>
                 hello@domain.com <br>
                 Tel.: +1234 567 8910 <br> <br>
               </p>
               <p>
                 828 L St NW #906, <br>
                 Washington, DC 20036, United States <br>
                 hello@domain.com <br>
                 Tel.: +1234 567 8910 <br>
               </p>
             </div>
           </div> <!-- //row -->
        </div>
    
        <div class="row">
           <div class="col-sm-12">
               <h2 class="title">Contact Form</h2>
               <p>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
               </p>
               <div class="contact-form">
                   <form id="main-contact-form" name="contact-form" method="post" action="http://demo.themeum.com/html/newedge/sendemail.php" >
                       <div class="form-group">
                           <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                       </div>
                       <div class="form-group">
                           <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                       </div>
                       <div class="form-group">
                           <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                       </div>
                       <div class="form-group">
                           <input type="text" name="captcha_question" class="form-control" placeholder="3 + 4 = ?" required="required">
                       </div>
                       <div class="form-group">
                           <textarea name="message" rows="5" class="form-control" placeholder="Message" required="required"></textarea>
                       </div>
                       <button type="submit" class="btn btn-success">Send Message</button>
                   </form>
               </div> <!-- //contact-form -->
           </div>
         </div> <!-- //row -->
      </div> <!-- //container -->
    </section>
    <!--====  End of MAIN WRAPPER  ====-->
    
<?php
	get_footer();
?>