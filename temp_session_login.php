<?php
error_reporting(0);
?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>SISPEG</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/layouts/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/layouts/layout/css/themes/blue.css" rel="stylesheet" type="text/css"/>
<link href="assets/layouts/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" type="image/x-icon" href="http://www.mncbank.co.id/assets/Addresbarwebsite(Favicon).png">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	
	<!-- END HEADER INNER -->
</div>

 <?php 
 $status=$_GET['status'];

   if (isset($_GET['status'])) {
	   if ($_GET['status']=='inactive')
	   {
	    
 ?>            
 <div class="modal show" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<a href="login"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button></a>
											<h4 class="modal-title"> <b>Warning ! </b></h4>
										</div>
										<div class="modal-body">
											<i class="fa fa-warning font-red"> </i> Your Account is not Active... Please Call <b>Administrator</b> ! 
										</div>
										<div class="modal-footer">
											
										<a href="login"><button type="button" class="btn blue"> Login  </button></a>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
                            
 
 <?php
 
	   } else  if ($_GET['status']=='limited'){
 ?>
 
                        
                                    
<div class="modal show" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<a href="login"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button></a>
											<h4 class="modal-title"> <b>Warning ! </b></h4>
										</div>
										<div class="modal-body">
											 <i class="fa fa-warning font-red"> </i> Anda Belum Login, Silahkan Login dulu... ! 
										</div>
										<div class="modal-footer">
											
										<a href="login"><button type="button" class="btn blue"> Login  </button></a>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
   <?php  } else { ?>      
   
   
   
                        
                                    
<div class="modal show" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<a href="login"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button></a>
											<h4 class="modal-title"> <b>Warning ! </b></h4>
										</div>
										<div class="modal-body">
											 <i class="fa fa-warning font-red"> </i> Anda Belum Login, Silahkan Login dulu... ! 
										</div>
										<div class="modal-footer">
											
										<a href="login"><button type="button" class="btn blue"> Login  </button></a>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
   <?php  } 
   
   }
    else { ?>      
   
   
   
                        
                                    
<div class="modal show" id="basic" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<a href="login"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button></a>
											<h4 class="modal-title"> <b>Warning ! </b></h4>
										</div>
										<div class="modal-body">
											 <i class="fa fa-warning font-red"> </i> Anda Belum Login, Silahkan Login dulu... ! 
										</div>
										<div class="modal-footer">
											
										<a href="login"><button type="button" class="btn blue"> Login  </button></a>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
   <?php  } 
   

   ?>                         
                           
	<!-- BEGIN CONTENT -->
	<div class="row">
      <div class="col-md-12">
      
      </div>
    </div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->

<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<script type="text/javascript">

    $(window).load(function(){
        $('#basic').modal('show');
    });


</script>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->


<!-- END PAGE LEVEL SCRIPTS -->

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>