<br />
 
<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1><?= $category->name  ?> Courses</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">
				
				<!-- Popular Course Item -->
        <?php foreach ($courses as $course): ?>
				<div class="col-lg-4 course_box" style="margin-bottom: 10px; padding-bottom: 10px;">
					<div class="card">
                <?=$this->Html->image($course->courseimage,['class'=>'card-img-top','style'=>'height: 200px; width: 350px']); ?>
						
						<div class="card-body text-center">
							<div class="card-title">
                   <?= $this->Html->link(__(substr($course->title,0,60).'...'), ['action' => 'view', $course->id],['title'=>'view summary']) ?>
                  </div>
							<div class="card-text"><?= substr(strip_tags(trim($course->description)),0,180).'...'?></div>
						</div>
						<div class="price_box d-flex flex-row align-items-center">
							<div class="course_author_image">
                    <?=$this->Html->image($course->courseimage,['class'=>'card-img-top']); ?>
								
							</div>
<!--							<div class="course_author_name">Michael Smith, <span>Author</span></div>-->
							<div class="course_price d-flex flex-column align-items-center justify-content-center"><span><?= h(' ₦'. number_format($course->weekendclass)) ?></span></div>
						</div>
					</div>
				</div>
        <?php endforeach; ?>

				<!-- Popular Course Item -->
				

				<!-- Popular Course Item -->
				
			</div>
		</div>		
	</div>
            	<!-- Register -->

	<div class="register">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Register and become a part of the  <span>Global Village</span> That ICT is creating</h1>
							<p class="register_text"></p>
							<div class="button button_1 register_button mx-auto trans_200">
                   <?= $this->Html->link(__('Register Now'), ['controller' => 'Users', 'action' => 'newuser']) ?>
              </div>
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding">
					
					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url(../../img/search_background.jpg);"></div>
						<div class="search_content text-center">
							<h1 class="search_title">Search for course</h1>
                <?= $this->Form->create(null,['url'=>['controller'=>'Courses','action'=>'search'],'id'=>'search_form','class'=>'search_form']) ?>
							 <?= $this->Form->control('search_term', ['label'=>false,'class'=>'input_field search_form_name','id'=>'search_form_name',
                             'required','placeholder'=>'Search for Courses','data-error'=>'Course name or title is required']) ?>
							
							  <?= $this->Form->button(' Search Courses',['class'=>'search_submit_button trans_200 fa fa-search','id'=>'search_submit_button']) ?>
 
							<?= $this->Form->end() ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

            

              	<!-- Testimonials -->

	<div class="testimonials page_section">
		<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(../../img/testimonials_background.jpg)"></div>
		</div>
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>From our students</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					
					<div class="testimonials_slider_container">

						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">
							
							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">With every class in Netpro Academy, you are getting closer to real life development and 
                      deployment of applications, Everything is practical!.</p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
                         <?=$this->Html->image('testimonials_user.jpg'); ?>
											
										</div>
										<div class="testimonial_name">Vincent </div>
										<div class="testimonial_title">Ex Student</div>
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">I have always seen software development as a complex thing till i got enrolled in the 
                      NetPro Academy CodeCamp, then i realised it is actually simple and can be learn just about anyone.</p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
										 <?=$this->Html->image('testimonials_user.jpg'); ?>
										</div>
										<div class="testimonial_name">juliet</div>
										<div class="testimonial_title">Ex Student</div>
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">Learning coding with NetPro Academy gave me the wings on which to fly in this everbloomin
                  changing world of information technology.</p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
										 <?=$this->Html->image('chukd.jpg'); ?>
										</div>
										<div class="testimonial_name"> chukd</div>
										<div class="testimonial_title">Former Student</div>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
                	<!-- Events -->

	<div class="events page_section">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Upcoming Events</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">

				<!-- Event Item -->
          <?php foreach ($courses as $course): ?>
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day"><?= h(date("d",strtotime($course->start_date))) ?></div>
									<div class="event_month"><?= h(date("M",strtotime($course->start_date))) ?></div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
                    <div class="event_name">
                      <?= $this->Html->link(__($course->title), ['action' => 'view', $course->id],
                              ['title'=>'view summary','class'=>'trans_200']) ?>
                      
                  </div>
									<div class="event_location">Imopoly Umuagw and Rocana Institute Enugu</div>
									<p><?= substr(strip_tags(trim($course->description)),0,90).'...'?></p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
                    <?=$this->Html->image($course->courseimage,['style'=>'height: 160px; width: 360px']); ?> 
									
								</div>
							</div>

						</div>	
					</div>
				</div>
        <?php endforeach; ?>


			</div>
				
		</div>
	</div>

                  	<!-- Footer -->

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