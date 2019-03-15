<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="IT Academy, Software development, html, php, css, mysql, codecamp, web design, graphic design">
  <meta name="author" content="NetPro Intl Ltd">
 
  <title itemprop='name'> <?php $description = "IT Academy, Software development, html, php, css, mysql, codecamp, web design, graphic design";
  echo (!isset($title))? $this->fetch("title") : $title; ?> | NetPro Academy</title>
  <meta name="original-source" content="http://www.netproacademy.net" />
<link rel="canonical" href="http://www.netproacademy.net" />
<link rel="publisher" href="http://www.netproacademy.net"/>

<meta property="og:title" content="NetPro Academy">
<meta property="og:type" content="website">
<meta property="og:url" content="http://www.netproacademy.net">
<meta property="og:image" content="/academy/img/logo_1.png">
<meta property="og:description" content="<?=substr($description,0,200)?>">

<meta name="twitter:card" content="summary" >
<meta name="twitter:description" content="<?=substr($description,0,200)?>">
<meta name="twitter:site" content="@netproacademy" >
<meta name="twitter:title" content="NetPro Academy" >
<meta name="twitter:image" content="/academy/img/logo_1.png">
  <!-- Favicon -->
  <link href="img/logo_1.png" rel="icon" type="image/png">
   <?= $this->Html->meta('logo_1.png') ?>
   <?= $this->fetch('meta') ?>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
     <?= $this->Html->css(['bootstrap.min','fontawesome-all'
            ,'owl.carousel','owl.theme.default','animate','main_styles','responsive'
        ]) ?> 
    
    <?= $this->fetch('css') ?>
 
</head>

<body>
    <div class="super_container">
        	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
          <a href="/"><div class="logo">
             <?=$this->Html->image('logo_1.png',['height'=>'100%','width'=>'100%','href'=>'/']); ?>
<!--					<img src="images/logo.png" alt="">-->
<!--					<span>courses</span>-->
              </div></a>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
              <li class="main_nav_item"><a href="/">Home</a></li>
						<li class="main_nav_item">
               <?= $this->Html->link(__('About Us'), ['controller' => 'Users', 'action' => 'aboutus']) ?>
            </li>
						<li class="main_nav_item">
                <?= $this->Html->link(__('Courses'), ['controller' => 'Courses', 'action' => 'listcourses']) ?>
            </li>
						  <?php $this_user = $this->request->getSession()->read('userdata');
           // print_r($this_user); exit;
            if(empty($this_user['username'])){  ?>
            <li class="main_nav_item">
                <?= $this->Html->link('Tel','http://www.tel.ng', ['title'=>'Technology-enhanced Learning','target'=>'blank']) ?>
                 </li> 
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
						<li class="main_nav_item">
           <?= $this->Html->link(__('Contact'), ['controller' => 'Users', 'action' => 'contactus']) ?>
              
            </li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
         <?=$this->Html->image('phone-call.svg'); ?>
<!--			<img src="images/phone-call.svg" alt="">-->
			<span>+234(0)816 3814 316  +234(0)703 3826 004</span>
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
					<li class="menu_item menu_mm"><a href="/">Home</a></li></li>
					<li class="menu_item menu_mm">
                <?= $this->Html->link(__('About Us'), ['controller' => 'Users', 'action' => 'aboutus']) ?>
          </li>
					<li class="menu_item menu_mm">
                <?= $this->Html->link(__('Courses'), ['controller' => 'Courses', 'action' => 'listcourses']) ?>
          </li>
					<?php $this_user = $this->request->getSession()->read('userdata');
           // print_r($this_user); exit;
            if(empty($this_user['username'])){  ?>
            <li class="main_nav_item">
                <?= $this->Html->link('Tel','http://www.tel.ng', ['title'=>'Technology-enhanced Learning','target'=>'blank']) ?>
                 </li> 
            <li class="main_nav_item">
                 <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>
            </li>   
         
            
<!--            <li class="main_nav_item">
              <?= $this->Html->link(__('Sign Up'), ['controller' => 'Users', 'action' => 'newuser']) ?>
            </li>-->
            <?php } else{?>
          <li class="main_nav_item">
              <?= $this->Html->link(__($this_user['username']), ['controller' => 'Candidates', 'action' => 'viewprofile'],
                      ['title'=>'my profile']) ?>
            </li>      
           <?php }  ?>
					<li class="menu_item menu_mm">
             <?= $this->Html->link(__('Contact'), ['controller' => 'Users', 'action' => 'contactus']) ?>
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

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-4 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
							  <?=$this->Html->image('netpro_logo.png',['height'=>'100%','width'=>'100%']); ?>
<!--								<span>course</span>-->
							</div>
						</div>

						<p class="footer_about_text">Africa's Leading Coding And Technology-enhanced Learning Academy.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-4 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
								<ul>
					<li class="footer_list_item">
             <a href="/">Home</a></li>
          </li>
					<li class="footer_list_item">
             <?= $this->Html->link(__('About Us'), ['controller' => 'Users', 'action' => 'aboutus']) ?>
          </li>
					<li class="footer_list_item">
               <?= $this->Html->link(__('Courses'), ['controller' => 'Courses', 'action' => 'listcourses']) ?>
          </li>
					<?php 
            if(empty($this_user['username'])){  ?>
            <li class="footer_list_item">
                <?= $this->Html->link('Tel','http://www.tel.ng', ['title'=>'Technology-enhanced Learning','target'=>'blank']) ?>
            <li class="footer_list_item">
                 <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>
            </li>   
         
          
<!--            <li class="footer_list_item">
              <?= $this->Html->link(__('Sign Up'), ['controller' => 'Users', 'action' => 'newuser']) ?>
            </li>-->
            <?php } else{?>
          <li class="footer_list_item">
              <?= $this->Html->link(__($this_user['username']), ['controller' => 'Candidates', 'action' => 'viewprofile'],
                      ['title'=>'my profile']) ?>
            </li>      
           <?php }  ?>
					<li class="footer_list_item">
             <?= $this->Html->link(__('Contact'), ['controller' => 'Users', 'action' => 'contactus']) ?>
          </li>
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
								+234(0)816 3814 316 / +234(0)703 3826 004
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
 
  <!-- Core #126fb4 -->
     <?= $this->Html->script(
            ['jquery-3.2.1.min','popper',
                'bootstrap.min','TweenMax.min','TimelineMax.min','ScrollMagic.min','animation.gsap.min','ScrollToPlugin.min'
                ,'owl.carousel','jquery.scrollTo.min','easing','custom'
                ])
    ?>
    <?= $this->fetch('script') ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c8a6dddc37db86fcfcdd724/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>