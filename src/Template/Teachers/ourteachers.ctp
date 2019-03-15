<div class="super_container">


	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(../img/teachers_background.jpg)"></div>
		</div>
      <div class="home_content" style="background: none;">
        <h1>Our Instructors</h1>
		</div>
	</div>

	<!-- Teachers -->

	<div class="teachers page_section">
		<div class="container">
			<div class="row">
				
				<!-- Teacher -->
        <?php foreach ($teachers as $teacher):  ?>
				<div class="col-lg-4 teacher">
					<div class="card">
						<div class="card_img">
							<div class="card_plus trans_200 text-center"><a href="#">+</a></div>
              <?=$this->Html->image($teacher->passport,['height'=>'240px;','width'=>'250px;','class'=>'card-img-top trans_200']); ?>
<!--							<img class="card-img-top trans_200" src="images/teacher_1.jpg" alt="https://unsplash.com/@michaeldam">-->
						</div>
						<div class="card-body text-center">
							<div class="card-title"><a href="#"><?=$teacher->name?></a></div>
							<div class="card-text"><?=$teacher->course?></div>
							<div class="teacher_social">
								<ul class="menu_social">
									<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
									<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
									<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
        <?php endforeach;  ?>

			</div>
		</div>
	</div>

	<!-- Milestones -->

	<div class="milestones">
		<div class="milestones_background" style="background-image:url(../img/BANNER_4.jpg)"></div>

		<div class="container">
			<div class="row">
				
				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon">
           <?=$this->Html->image('milestone_1.svg'); ?>
              
            </div>
						<div class="milestone_counter" data-end-value="150" data-sign-before="+">0</div>
						<div class="milestone_text">Current Students</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon">
                 <?=$this->Html->image('milestone_2.svg'); ?>
              
            </div>
						<div class="milestone_counter" data-end-value="20" data-sign-before="+">0</div>
						<div class="milestone_text">Certified Teachers</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon">
                 <?=$this->Html->image('milestone_3.svg'); ?>
                
            </div>
						<div class="milestone_counter" data-end-value="42" data-sign-before="+">0</div>
						<div class="milestone_text">Approved Courses</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon">
                <?=$this->Html->image('milestone_4.svg'); ?>
               
            </div>
						<div class="milestone_counter" data-end-value="500" data-sign-before="+">0</div>
						<div class="milestone_text">Graduate Students</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Become -->

	<div class="become">
		<div class="container">
			<div class="row row-eq-height">

				<div class="col-lg-6 order-2 order-lg-1">
					<div class="become_title">
						<h1>Become a Freelance Instructor</h1>
					</div>
					<p class="become_text">If your are good and trust your skills in coding as well as teaching,
               <?= $this->Html->link(__('Get In Touch'), ['controller' => 'Users', 'action' => 'contactus']) ?>
               with us and become one of our freelance instructors!
              .</p>
<!--					<div class="become_button text-center trans_200">
						<a href="#">Read More</a>
					</div>-->
				</div>

				<div class="col-lg-6 order-1 order-lg-2">
					<div class="become_image">
              <?=$this->Html->image('black_girls_code.jpg'); ?>
<!--						<img src="images/become.jpg" alt="">-->
					</div>
				</div>
				
			</div>
		</div>
	</div>


</div>
