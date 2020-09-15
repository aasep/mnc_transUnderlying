<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
					
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			
			<br>
			<!-- MODAL NEWS PRODUCT-->
							
             
				<!-- END MODAL NEWS PRODUCT-->

				<!-- MODAL NEWS PROMOTION-->
							
             
				<!-- END MODAL NEWS PROMOTION-->



			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet  bg-inverse">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"> </i> 
											<span class="caption-subject font-red-sunglo bold "> Welcome To Muds  System </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>


<div class="portlet-body">
							<div class="tabbable-custom nav-justified">
								<ul class="nav nav-tabs nav-justified">
									<li class="active">
										<a href="#tab_1_1_1" data-toggle="tab">
										<i class="fa fa-info-circle"></i> <span class="caption-subject font-grey-sunglo bold "> Information Login </span> </a>
									</li>
									
									
									<li>
										<a href="#tab_1_1_5" data-toggle="tab">
										<i class="fa fa-info-circle"></i> <span class="caption-subject font-grey-sunglo bold "> FAQ </span></a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1_1_1">
										<!-- <p>
											<span class="icon-users" aria-hidden="true"></span> <b>Information Login </b>
										</p>
										<p> -->
								 <div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>Information Login </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">		
											<div class="table-scrollable">
								<table class="table table-bordered table-hover" width="100%">
								<thead>
								<tr>
									<th width="20%">
										 #
									</th>
									<th width="2%">
										
									</th>
									<th width="78%">
										 Information
									</th>
								
									
								</tr>
								</thead>
								<tbody><tr class="success">
									<td>
										<b> Full Name </b>
									</td>
									<td>
										:
									</td>
									<td>
										 <i class="fa fa-user"></i> <?php echo getNamaLengkap();?>
									</td>
								</tr>
								<tr class="active">
									<td>
										<b>Username</b>
									</td>
									<td>
										 :
									</td>
									<td>
										 <i class="fa fa-info-circle"></i> <?php echo getUsername();?>
									</td>
									
									
								</tr>
								<tr class="success">
									<td>
										<b> Group Name</b>
									</td>
									<td>
										:
									</td>
									<td>
										<i class="fa fa-users"></i> <?php echo getGroupUserName();?>
									</td>
								</tr>
								<tr class="active">
									<td>
										<b>Branch</b>
									</td>
									<td>
										 :
									</td>
									<td>
										 <i class="fa fa-building"></i> <?php echo getNamaUnit(); 

										 	//echo lastLogin();
										 ?>
									</td>
									
									
								</tr>
								

								<tr class="success">
									<td>
										<b>Last Login</b>
									</td>
									<td>
										 :
									</td>
									<td>
										<i class="fa fa-calendar"></i> <?php echo date('d-m-Y H:i',strtotime(lastLogin())); 

										 	//echo lastLogin();
										 ?>
									</td>
									
									
								</tr>
								
								
								
								</tbody>
								</table>
							</div>
							</div>
							</div>
										</p>
									</div>
									
									
									
									<div class="tab-pane" id="tab_1_1_5">
										<div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>FAQ </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">		
                                </div>
                                </div>
										
									</div>
								</div>
							</div>
							</div>





						<div class="portlet-body">
							
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-12">
					
					<!-- END BORDERED TABLE PORTLET
					<div align="center"><img src="images/financial.png" style="height: 75px;" alt=""/>
					-->
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {

	$('.beritaProduk').click(function() {
		var judul = $(this).attr('id-title');
    	var idproduk = $(this).attr('id-produk');
		 // alert(idproduk);
			$("#judul-produk").empty();
			$("#judul-produk").append('<i class="fa fa-info-circle"></i> '+ judul );


			var dataString = 'id='+idproduk;
		
			$.ajax({
			type: "POST",
			url: "module/ajax/ajax_detail_product_news.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			$("#detail-produk").html(html);
			} 
			});	




			  });


	$('.beritaPromosi').click(function() {
		var judul = $(this).attr('id-title2');
    	var idpromosi = $(this).attr('id-promosi');
		 // alert(idproduk);
			$("#judul-promosi").empty();
			$("#judul-promosi").append('<i class="fa fa-info-circle"></i> '+ judul );


			var dataString = 'id='+idpromosi;
		
			$.ajax({
			type: "POST",
			url: "module/ajax/ajax_detail_promotion_news.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			$("#detail-promosi").html(html);
			} 
			});	




			  });

}); // document ready	$(document).ready(function() {

    </script>