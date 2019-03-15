<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="description" content="NetPro Academy">
        <meta name="author" content="NetPro Academy">

        <?= $this->Html->css(['summernote','bootstrap-datepicker.min','bootstrap.minb',
            'components','icons','pages',
            'menu','responsive','switchery.min'
        ]) ?> 
    
    <?= $this->fetch('css') ?>
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <title> NetPro Academy</title>
    
    <?= $this->Html->script('modernizr.min')?>
     <?= $this->fetch('script') ?>

        

    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
<div class="topbar">

    <div class="topbar-left">
        <a href="/" class="logo"><span>NETPRO<span>ACADEMY</span></span><i class="mdi mdi-layers"></i></a>
        <!-- Image logo -->
        <!--<a href="index.html" class="logo">-->
            <!--<span>-->
                <!--<img src="assets/images/logo.png" alt="" height="30">-->
            <!--</span>-->
            <!--<i>-->
                <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
            <!--</i>-->
        <!--</a>-->
    </div>

    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                
                <li class="hidden-xs">
                    <a href="/" class="menu-item">Main Site</a>
                </li>
        
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown user-box">
                    <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                                         <?=$this->Html->image('blogo1.png',['class' => 'img-circle user-img']); ?>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        <li>
                            <h5><?=$admin->fname.' '.$admin->lname  ?></h5>
                        </li>
                        
                        <li>
                            <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?>
                            
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</div>

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
            	<li class="menu-title">Navigation</li>
                <li>
                    <?= $this->Html->link(__(' Dashboard'), ['controller' => 'Admins', 'action' => 'dashboard'],['class'=>'mdi mdi-view-dashboard']) ?>
<!--                    <a href="/" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span></a>-->
                </li>

                
                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Teachers </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'newteacher']) ?></li>
                        <li><?= $this->Html->link(__('View Teachers'), ['controller' => 'Teachers', 'action' => 'viewteachers']) ?></li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Courses </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'newcourse']) ?></li>
                        <li><?= $this->Html->link(__('View Courses'), ['controller' => 'Courses', 'action' => 'viewallcourses']) ?></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-comment-text-outline"></i><span> Centers </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                    	<li><?= $this->Html->link(__('New Center'), ['controller' => 'Admins', 'action' => 'newcenter']) ?></li>
                          <li><?= $this->Html->link(__('View Centers'), ['controller' => 'Admins', 'action' => 'viewallcenters']) ?></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book"></i><span> Candidates </span> <span class="menu-arrow"></span></a>
                   <ul class="list-unstyled">
                    	
                          <li><?= $this->Html->link(__('Manage Candidates'), ['controller' => 'Admins', 'action' => 'viewallcandidates']) ?></li>
                    </ul>
                </li>
                
                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class=" mdi mdi-account-multiple"></i><span> Transactions </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                    	
                          <li><?= $this->Html->link(__('View All Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
                    </ul>
                </li>
                <?php if(($this->request->getSession()->read('Auth.User.id')==1) ||
                       ($this->request->getSession()->read('Auth.User.id')==2)) {  ?>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class=" mdi mdi-account-multiple"></i><span> Users </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                    	<li><?= $this->Html->link(__('Add Admin'), ['controller' => 'Admins', 'action' => 'newadmin']) ?></li>
                          <li><?= $this->Html->link(__('View All Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                    </ul>
                </li>
                       <?php } ?>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-calendar"></i><span> My Profile </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><?= $this->Html->link(__('View Profile'), ['controller' => 'Admins', 'action' => 'myprofile']) ?></li>
                        <li><?= $this->Html->link(__('Change Password'), ['controller' => 'Admins', 'action' => 'changepassword']) ?></li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <div class="clearfix"></div>

    </div>
    

</div>

<div class="content-page">
    <!-- Start content -->
     <?= $this->Flash->render() ?>
  
           <?= $this->fetch('content') ?>
  

    <footer class="footer text-right">
        <?=date('Y')?> &copy; NetPro Int'l.
    </footer>

</div>


<script>
            var resizefunc = [];
        </script>
         <?= $this->Html->script(['jquery.min','bootstrap.minb','detect','fastclick',
             'jquery.blockUI','waves','jquery.slimscroll','jquery.scrollTo.min','switchery.min',
                'summernote.min','bootstrap-datepicker.min','ckeditor/ckeditor'
                ,'summernote.init','datePicker.settings','jquery.core','jquery.app'
                ])
    ?>
    <?= $this->fetch('script') ?>

            <script type="text/javascript">
        $(document).ready(function(){
            if ($('input[name=date_published]').val() != ''){
                $('#defaultDate').hide();
                $('#customDate').show();
                $('#switchDate').hide();
            }

            $('#switchDate').click(function(){
                $('#defaultDate').hide();
                $('#customDate').show();
                $(this).hide();
            });

        });
          
    </script>
  
    
    

    </body>
</html>