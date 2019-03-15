   <div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(../../img/black_girls_code.jpg)"></div>
		</div>
       <div class="home_content" style="background: none">
        <h1 style="font-size: 35px;">Course Registration</h1>
		</div>
	</div>
      
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8"><?= $this->Flash->render() ?>
             <div class="leave_comment">
					<center>	<div class="leave_comment_title">Course Registration @ NetPro Academy<br />
                <address>No.10, Wilfred Okereke Street,Off Owerri - Port Harcourt Road, Obinze Imo State </address>
                Email : academy@netpro.com.ng &nbsp; Phone : +234(0)816 3814 316 / +234(0)703 3826 004
              </div></center>

						<div class="leave_comment_form_container">
         Course Title :        <?= h($course->title) ?><br />
         Start Date :  <?=$course->start_date?><br />
         Amount Paid : <?=number_format($transaction->amount,2)?><br />
         Payment Status : <?=$transaction->response ?><br />
         Date : <?=date('D, M d Y')?><br />

              
                <br /><br /><br /><br />
                
<!--               <legend>You have successfully Registered For This Course(<?= h($course->title.' : '. number_format($course->cost,2)) ?>)</legend> -->
                	</div>
            	</div>
		</div>
	</div>
</div>
                
                
             