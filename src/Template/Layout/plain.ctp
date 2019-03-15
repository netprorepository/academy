<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php if(isset( $description)){echo  $description;}  ?>">
  <meta name="author" content="NetPro Intl Ltd">
  <meta name="keywords" content="<?php if(isset( $keywords)){echo  $keywords;}  ?>">
     <?= $this->Html->meta('netpro_logo.png') ?>
   <title itemprop='name'> <?php echo (!isset($title))? $this->fetch("title") : $title; ?> | NetPro Academy</title>
  <!-- Favicon -->
  <link href="../../img/netpro_logo.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
     <?= $this->Html->css(['bootstrap.min','fontawesome-all','news_post_styles'
            ,'news_post_responsive','teachers_styles','teachers_responsive','elements_responsive','elements_styles'
        ]) ?> 
    
  
  
    <?= $this->fetch('css') ?>
    <?= $this->fetch('meta') ?>
 
</head>

<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
    <div class="super_container">
        	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				 <a href="/"><div class="logo">
             <?=$this->Html->image('logo_1.png',['height'=>'100%','width'=>'100%']); ?>
<!--					<img src="images/logo.png" alt="">-->
<!--					<span>courses</span>-->
				</div></a>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="/">Home</a></li></li>
						<li class="main_nav_item">   <?= $this->Html->link(__('about us'), ['controller' => 'Users', 'action' => 'aboutus']) ?>
            </li>
						<li class="main_nav_item"> <?= $this->Html->link(__('courses'), ['controller' => 'Courses', 'action' => 'listcourses']) ?></li>
						  <?php $this_user = $this->request->getSession()->read('userdata');
           // print_r($this_user); exit;
            if(empty($this_user['username'])){  ?>
            <li class="main_nav_item">
                <?= $this->Html->link('Tel','http://www.tel.ng', ['title'=>'Technology-enhanced Learning','target'=>'blank']) ?>
            <li class="main_nav_item">
                 <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>
            </li>   
         
            </li>
<!--            <li class="main_nav_item">
              <?= $this->Html->link(__('Sign up'), ['controller' => 'Users', 'action' => 'newuser']) ?>
            </li>-->
            <?php } else{?>
          <li class="main_nav_item">
              <?= $this->Html->link(__($this_user['username']), ['controller' => 'Candidates', 'action' => 'viewprofile'],
                      ['title'=>'my profile']) ?>
            </li>      
           <?php }  ?>
						<li class="main_nav_item">
           <?= $this->Html->link(__('contact'), ['controller' => 'Users', 'action' => 'contactus']) ?>
            </li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
         <?=$this->Html->image('phone-call.svg'); ?>
<!--			<img src="images/phone-call.svg" alt="">-->
			<span>+234(0)816 3814 316 +234(0)703 3826 004</span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>
          	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm">
               <a href="/">Home</a></li>
          </li>
					<li class="menu_item menu_mm">   <?= $this->Html->link(__('about us'), ['controller' => 'Users', 'action' => 'aboutus']) ?>
              </a></li>
					<li class="menu_item menu_mm">
                <?= $this->Html->link(__('courses'), ['controller' => 'Courses', 'action' => 'listcourses']) ?>
          </li>
					<?php $this_user = $this->request->getSession()->read('userdata');
           // print_r($this_user); exit;
            if(empty($this_user['username'])){  ?>
            <li class="main_nav_item">
                <?= $this->Html->link('Tel','http://www.tel.ng', ['title'=>'Technology-enhanced Learning','target'=>'blank']) ?>
            <li class="main_nav_item">
                 <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>
            </li>   
         
         
<!--            <li class="main_nav_item">
              <?= $this->Html->link(__('Sign up'), ['controller' => 'Users', 'action' => 'newuser']) ?>
            </li>-->
            <?php } else{?>
          <li class="main_nav_item">
              <?= $this->Html->link(__($this_user['username']), ['controller' => 'Candidates', 'action' => 'viewprofile'],
                      ['title'=>'my profile']) ?>
            </li>      
           <?php }  ?>
					<li class="menu_item menu_mm">
              <?= $this->Html->link(__('contact'), ['controller' => 'Users', 'action' => 'contactus']) ?>
          </li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="https://www.facebook.com/netproacademy"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="https://twitter.com/netproacademy"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

			
			</div>

		</div>

	</div>
  
             <?= $this->Flash->render() ?>
  
           <?= $this->fetch('content') ?>
            <!-- Popular -->

	

			<!-- Footer Content -->

		<footer class="footer">
		<div class="container">
			
			<!-- Newsletter -->

			<div class="newsletter">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Subscribe to newsletter</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<form action="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email Address" required="required" data-error="Valid email is required.">
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-4 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
                   <?=$this->Html->image('netpro_logo.png',['height'=>'100%','width'=>'100%']); ?>
							
							</div>
						</div>

						<p class="footer_about_text">Africa's Leading Coding And Technology-enhanced Learning Academy</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-4 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="/">Home</a></li></li>
								<li class="footer_list_item"><?= $this->Html->link(__('About us'), ['controller' => 'Users', 'action' => 'aboutus']) ?></li>
								<li class="footer_list_item">  <?= $this->Html->link(__('Courses'), ['controller' => 'Courses', 'action' => 'listcourses']) ?></li>
								
								<li class="footer_list_item"><?= $this->Html->link(__('Contact'), ['controller' => 'Users', 'action' => 'contactus']) ?></li>
							</ul>
						</div>
					</div>


					<!-- Footer Column - Contact -->

					<div class="col-lg-4 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
                      <?=$this->Html->image('placeholder.svg'); ?> 
									
									</div>
						 Head Office    <address>No.10, Wilfred Okereke Street,Off Owerri - Port Harcourt Road, Obinze Imo State </address> 
               Branch Office :			29 Umaru Dikko Street, Jabi Abuja
               
               
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
                       <?=$this->Html->image('smartphone.svg'); ?>
									
									</div>
									+234(0)703 3826 004 / +234(0)816 3814 316
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
                    <?=$this->Html->image('envelope.svg'); ?>
									
									</div>academy@netpro.com.ng
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span>
NetPro Int'l, &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
</span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="https://www.facebook.com/netproacademy"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="https://twitter.com/netproacademy"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>

		

		</div>

 
  <!-- Core -->
     <?= $this->Html->script(
            ['jquery-3.2.1.min','popper',
                'bootstrap.min','TweenMax.min','TimelineMax.min','ScrollMagic.min','animation.gsap.min','ScrollToPlugin.min'
                ,'owl.carousel','jquery.scrollTo.min','easing','custom','news_post_custom','elements_custom'
                ])
    ?>
    <?= $this->fetch('script') ?>

</body>

</html>
