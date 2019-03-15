   <div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(../../img/<?=$course->courseimage?>)"></div>
		</div>
<!--		<div class="home_content">
        <h1 style="font-size: 35px;"><?=$course->title?></h1>
		</div>-->
	</div>
            
            <div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8">
					
					<div class="news_post_container">
						<!-- News Post -->
						<div class="news_post">
<!--							<div class="news_post_image">
                   <?=$this->Html->image($course->courseimage); ?>
							
							</div>-->
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div><?= h(date("d",strtotime($course->start_date))) ?></div>
										<div><?= h(date("M",strtotime($course->start_date))) ?></div>
									</div>
								</div>
								<div class="news_post_title_container">
                    <div class="news_post_title" style="font-weight: bold; font-size: 18px;">
										<?= $course->title?>
									</div>
<!--									<div class="news_post_meta">
										<span class="news_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="news_post_comments"><a href="#">3 Comments</a></span>
									</div>-->
								</div>
							</div>
							<div class="news_post_text">
                  <p style="color: black"><?=$course->description?> </p>
							</div>
<div class="fb-like" data-href="http://www.netproacademy.net/courses/view/<?php echo $course->id.'/'.$this->GenerateUrl($course->title) ?>" 
                data-layout="standard" data-action="like" data-show-faces="false" data-share="true">
                     
  </div>

            <a href="https://twitter.com/share" class="twitter-share-button" 
        data-url="http://www.netproacademy.net/courses/view/<?php echo $course->id.'/'.$this->GenerateUrl($course->title) ?>"
        data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8">
        </script> 
							<div class="news_post_quote">
								<p class="news_post_quote_text"><span>R</span>egister and be a part of the evolving global village .</p>
							</div>

							
						</div>

					</div>
            
            <div class="leave_comment">
						<div class="leave_comment_title">Register<br />
             (  Weekend Class : <?= h(' ₦'. number_format($course->weekendclass,2)) ?>, &nbsp;  Executive Class : <?= h(' ₦'. number_format($course->executiveclass,2)) ?>, &nbsp;
                      Immersive Class : <?= h(' ₦'. number_format($course->immersiveclass,2)) ?> &nbsp;)
            </div>

						<div class="leave_comment_form_container">
						<?= $this->Form->create(null,['url'=>['controller'=>'Candidates','action'=>'newcandidate']]) ?>
               
                   <?php
         echo $this->Form->control('username', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Username(email address)','type'=>'email']);
        
         
          echo $this->Form->control('password', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Password','type'=>'password']);
          
          
            echo $this->Form->control('remember_pass', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Confirm Password','type'=>'password']);
           
        $preferedclass = [$course->weekendclass => 'Weekend Class',$course->executiveclass => 'Executive class',
            $course->immersiveclass => 'Immersive Class'];
            echo $this->Form->control('surname', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Surname']);
            echo $this->Form->control('firstname', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'First Name']);
            echo $this->Form->control('address', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Address']);
             echo $this->Form->control('age', ['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Age']);
            echo $this->Form->control('school', ['label'=>false,'class'=>'input_field contact_form_name',
                            'placeholder'=>'Your School Name']);
            echo $this->Form->control('phone',['label'=>false,'class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Contact Phone']);
            echo $this->Form->control('center_id', ['label'=>'Select Your Center :','options' => $centers,
                'class'=>'input_field contact_form_name','required']);
            echo $this->Form->control('amounta', ['type' =>'hidden','value'=>$course->weekendclass]);
            
            echo $this->Form->control('amount', ['label'=>'Prefered Class :','options' => $preferedclass,
                'class'=>'input_field contact_form_name','required']); 
             echo $this->Form->control('parent', ['label'=>'Parent/Guardian Name','class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Parent/Guardian Name']);
             
              echo $this->Form->control('parent_phone', ['label'=>'Parent/Guardian Phone','class'=>'input_field contact_form_name',
                             'required','placeholder'=>'Parent/Guardian Phone']);
            
             
            echo $this->Form->control('course_id', ['label'=>False,'value' => $course->id,'type'=>'hidden']);
           
           
        ?>
         </fieldset>
    <?= $this->Form->button('Register',['class'=>'comment_send_btn trans_200','title'=>'register for this course',
        'id'=>'comment_send_btn']) ?>
    <?= $this->Form->end() ?>
						</div>
					</div>
				
 
				</div>

				<!-- Sidebar Column -->

				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Archives -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Related Courses</h3>
							</div>
							<ul class="sidebar_list">
                  <?php foreach ($related as $related_course): ?>
								<li class="sidebar_list_item">
                   <?= $this->Html->link(__($related_course->title), ['action' => 'view', $course->id],
                              ['title'=>'view summary']) ?>
                </li>
                <?php endforeach; ?>
								
							</ul>
						</div>

						<!-- Latest Posts -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Popular Courses</h3>
							</div>

							<div class="latest_posts">
								
								<!-- Latest Post -->
                 <?php foreach ($popular as $popular_course): ?>
                
								<div class="latest_post">
									<div class="latest_post_image">
                       <?=$this->Html->image($popular_course->courseimage); ?>
										
									</div>
									<div class="latest_post_title">
                     <?= $this->Html->link(__($popular_course->title), ['action' => 'view', $popular_course->id],
                              ['title'=>'view summary']) ?>
                  </div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#"><?=$popular_course->category->name  ?></a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#"><?= h(date("d M",strtotime($popular_course->start_date))) ?></a></span>
									</div>
								</div>
                <?php endforeach; ?>

							


							</div>

						</div>

						<!-- Tags -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Categories</h3>
							</div>
							<div class="tags d-flex flex-row flex-wrap">
                   <?php foreach ($categories as $category):  ?>
								<div class="tag">
                  <?= $this->Html->link(__($category->name), ['action' => 'findcourse', $category->id],
                              ['title'=>'view courses','class'=>'tag']) ?>
                </div>
                <?php endforeach; ?>
								
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>