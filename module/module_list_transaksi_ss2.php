<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);



################   SRCBY   ###################
if (isset($_POST['srcby']) ) {


	switch ($_POST['srcby']) {
		 case '1' : $srcby='1'; break; //Id Transaksi
		 case '2' : $srcby='2'; break; //CIF Number
		 case '3' : $srcby='3'; break; //Nama Pengirim
		 case '4' : $srcby='4'; break; // Nama Penerima
		 case '5' : $srcby='5'; break; //Nominal Transaksi
		 }

} else {
	$srcby="";
}


################   SRCKEY   ########################
if (isset($_POST['srckey']) ) {
	$srckey=$_POST['srckey'];
	$var_get="srcby=$srcby&srckey=$srckey";
} else{
	$srckey="";
	$var_get=" ";
}

//echo $var_get."-".$srcby.",".$srckey."----------------------------------";
?>

<!-- <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/> -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>



<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>


<link rel="shortcut icon" href="favicon.ico"/>
<!-- <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">  
	<link rel="stylesheet" type="text/css" href="extensions/TableTools/css/dataTables.tableTools.css">  -->
	
	
	<style type="text/css" class="init">
	</style>
	<!-- <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script> -->

	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="extensions/TableTools/js/dataTables.tableTools.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/demo.js"></script>
	 
<script type="text/javascript" >
$(document).ready( function() {
	
  	$('#list_ticket').dataTable({
		"bFilter": false,
		"bInfo": true,		
		"processing": true,
		"serverSide": true,
	    "sAjaxSource": "../muds_ver2/module/server_side/server_processing_inquiry_list.php?<?php echo $var_get;?>",
		"iDisplayLength": 10,
	  	"iDisplayStart": 0
  	});

// $(".detailRecheck").on("click", function() { 

// alert('jkhjhjhjkh');

// } );201612191000055

	
	
	
}); 
</script> 



<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- <h3 class="page-title">
			<b>List Transaksi </b><small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="#">All Data Transaksi </a>
						<i class="fa fa-angle-right"></i>
					</li>
					
				
				</ul>
				
			</div>
 -->
		









            		















		


                
              </br> </br>
             

                        
                    <div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">All Data Transaksi</span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>                       


                            <div class="portlet-body form">    
  								<form action="<?php echo "?module=$module&pm=$pm";?>" method="POST" >                         
                        					<div class="form-group">
												
												<div class="col-md-3">
													<select class="form-control select2" name="srcby" id="srcby" required>
														<option value="">Choose Base On...</option>
														<option value="1" <?php if ($srcby=='1') echo "selected='selected'"; ?>>Id Transaksi </option>
														<option value="2" <?php if ($srcby=='2') echo "selected='selected'"; ?>>CIF Number </option>
														<option value="3" <?php if ($srcby=='3') echo "selected='selected'"; ?>>Nama Pengirim </option>
														<option value="4" <?php if ($srcby=='4') echo "selected='selected'"; ?>>Nama Penerima</option>
														<option value="5" <?php if ($srcby=='5') echo "selected='selected'"; ?>>Nominal Transaksi</option>
													</select>
												</div>
											</div>
											<div class="input-group col-md-3">
												<div class="input-cont">
													<input class="form-control" type="text" name="srckey" value="<?php echo $srckey;?>" placeholder="Key Word..." required>
												</div>
<!-- TYPE HIDDEN  optional -->
												<!-- <input type="text" name="act1" value="xx">  -->
												<span class="input-group-btn">
													<button class="btn green-haze" type="submit">Search <i class="m-icon-swapright m-icon-white"></i></button>
												</span>
											</div>
								</form>

							</div>
<hr><div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>List Transaksi  </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                    <div class="table-scrollable">
    					<table class="table table-striped table-bordered table-hover" id="list_ticket" width="150%">

							<thead>
								<tr>
								<th style="font-size:12px" width="15%">No. Transaksi / Pengirim /<br> CIF Number </th>
								<th style="font-size:12px" width="10%">Nama Transaksi / Tanggal Terbit /<br> Nominal Transaksi</th>
								<th style="font-size:12px" width="30%">Jenis Transaksi / Nama Cabang /  Nilai Dokumen</th>
								<th style="font-size:12px" width="40%" align="center">Nama Penerima / Nama Penginput /  Keterangan</th>
								<th style="font-size:12px" width="10%">Status</th>
								<th style="font-size:12px" width="25%">ACTION / Detail Trans / History Trans </th>
								</tr>
							</thead>
							<tbody>                   
							</tbody>
						</table>  
   					</div>
   					</div>
   					</div>
                        


							
						
					</div>


 <div class="modal fade bs-modal-lg" id="check_modal"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Detail Transaksi </span>
                                                    <span class="caption-helper">Detail Transaksi Outgoing ...</span>
                                                </div>
                                                
                                            </div>
                                    
                                                

                                    <div class="portlet-body">
                                                
                                                <!-- BEGIN FORM-->
                                        <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=recheck_branch"; ?>" class="form-horizontal"  id="form_sample_1" method="POST" enctype="multipart/form-data">
                                                
                                                <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                                <div class="alert alert-success display-hide">
                                                    <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                
                                    
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                          
                                                <!-- END FORM-->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <!-- #########################  /end modal Recheck ############################# -->


 


 <!-- ##################   modal view log ###################################-->



                        <div class="modal fade bs-modal-lg" id="log_transaksi"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-edit font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Status Transaksi</span>
                                                    <span class="caption-helper">detail status transaksi ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                 <!-- BEGIN FORM-->

                                                <form class="form-horizontal" role="form" id="detail_log">
                                                    
                                                </form>
                                                <!-- END FORM-->
                                                
                                    </div>
                                    </div> 

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn red " data-dismiss="modal">Close </button>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            
                                            <!-- END FORM-->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                  

                                    <!-- #########################  /end modal view log ############################# -->



					<!-- END EXAMPLE TABLE PORTLET-->




<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/admin/pages/scripts/form-validation.js"></script>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>


<script type="text/javascript">
$('#list_ticket tbody').on( 'click', '.detailRecheck', function (e) {
var idtrans = $(this).attr('id-idtrans');

//alert('oke...');
var dataString = 'id='+idtrans;

        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_detail_transaksi_only.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#form_sample_1").html(html);
        } 
            }); 



});



   $('#list_ticket tbody').on( 'click', '.detailLog', function (e) {
        var idtrans = $(this).attr('id-idtrans');
        var dataString = 'id='+idtrans;
        //alert(dataString);
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_log_trans.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#detail_log").html(html);
        } 
            }); 

        
    });


</script>



