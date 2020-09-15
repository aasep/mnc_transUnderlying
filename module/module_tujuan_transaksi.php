<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);
?>






            <!-- MODAL INSERT -->
			  <!-- ##################   modal insert ###################################-->



                        <div class="modal fade bs-modal-lg" id="large"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 
                                   
                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Add Tujuan Transaksi </span>
                                                    <span class="caption-helper">Additional Tujuan Transaksi ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=add_tujuan_transaksi"?>" id="form_sample_1" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nama Tujuan Transaksi
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="nama_transaksi" id="nama_transaksi" data-required="1" class="form-control"  /> </div>
                                                </div>
                                        </div>
                                                
                                    </div>
                                    </div> 
                                    
                                    

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn red " data-dismiss="modal">Close </button>
                                                    <button type="submit" class="btn green">Submit </button>
                                                    
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- #########################  /end modal insert ############################# -->
             <!-- END MODAL INSERT -->


               
             <!-- ##################   modal edit ###################################-->



                        <div class="modal fade bs-modal-lg" id="view-edit"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 
                                   
                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Edit Tujuan Transaksi </span>
                                                    <span class="caption-helper">Update Tujuan Transaksi ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=edit_tujuan_transaksi"?>" id="form_sample_3" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                
                                                 
                                               

                                                
                                                
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nama Tujuan Transaksi
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="ed_nama_transaksi" id="ed_nama_transaksi" data-required="1" class="form-control"  />
                                                    <input type="hidden" name="ed_id_transaksi" id="ed_id_transaksi" data-required="1" class="form-control"  />

                                                     </div>
                                                </div>

                                        </div>
                                                
                                    </div>
                                    </div> 
                                    
                                    

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn red " data-dismiss="modal">Close </button>
                                                    <button type="submit" class="btn green">Submit </button>
                                                    
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- #########################  /end modal edit ############################# -->



             <!-- ##################   modal delete ###################################-->



                        <div class="modal fade bs-modal-lg" id="delete-modal"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-trash font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Confirm Delete Tujuan Transaksi</span>
                                                    <span class="caption-helper">Dispose Tujuan Tansaksi ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=delete_tujuan_transaksi"?>"  class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger">
                                            <p id="delConfirm"> </p></div>


                                        </div>
                                        
    
                                                
                                    </div>
                                    </div> 

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn red " data-dismiss="modal">Close </button>
                                                    <button type="submit" class="btn green">Delete </button>
                                                    
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- #########################  /end modal delete ############################# -->

         
             
 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Data Added ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="failed")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data tidak berhasil diinput...!</strong> </div>";

	}

if (isset($_GET['message']) && ($_GET['message']=="succDel")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Deleted ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="failDel")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Dihapus...!</strong> </div>";

	}
if (isset($_GET['message']) && ($_GET['message']=="succUp")){
	echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Updated ....! </strong> </div>";
     }
	if (isset($_GET['message']) && ($_GET['message']=="failUp")){
	echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Diupdate...!</strong> </div>";

	}
	

?>





						<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> Tujuan Transaksi </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											


										</div>
									</div>
						<div class="portlet-body">
						
						<a href="#large" data-toggle="modal" class="btn green"> Add Tujuan Transaksi <i class="fa fa-plus"></i> </a>
						 <hr>   
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>List Of Tujuan Transaksi </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                <br>
                                <br>
                                <br>
							<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr>
								<th style="font-size:12px" width="5%">
									 No
								</th>
								<th style="font-size:12px" width="70%">
									 Nama Tujuan Transaksi  
								</th>
								
								<th style="font-size:12px" width="25%">
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							//
							$i=1;
                            $query  =" select * from tujuan_transaksi order by nama_tj_transaksi asc ";
                            
                            $result=pg_query($connection,$query);
                            $i=1;
                            while ($row=pg_fetch_array($result)) {

							echo "<tr>";
							echo "<td style='font-size:12px'>$i</td>";
							echo "<td style='font-size:12px'>$row[nama_tj_transaksi]</td>";
							echo "<td style='font-size:12px'><a href='#'  data-toggle='modal' data-target='#view-edit' id-nama='$row[nama_tj_transaksi]' id-trans='$row[id_trans]' class='detailEdit' ><button class='btn default'>Edit</button></a><a href='#'  data-toggle='modal' id-trans='$row[id_trans]' id-nama='$row[nama_tj_transaksi]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
							echo "</tr>";
							$i++;
							
									}
							?>


							</tbody>
							</table>
							   </div>
                            </div>

						</div>
					</div>





					</div>


					</div>
			
					<!-- END EXAMPLE TABLE PORTLET-->




<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->


<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

    <!--   VALIDATION FORM -->
<script type="text/javascript">
var FormValidation = function () {

    // basic validation
    var handleValidation1 = function() {
            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                rules: {
                	nama_transaksi: {
                        required: true
                    }
                },


                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form[0].submit(); // submit the form
                }
            });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();     
        }

    };

}();

</script>

<script type="text/javascript">
$(document).ready(function() {



   $('.detailEdit').click(function() {

        var id_trans = $(this).attr('id-trans');
        var nama_transaksi = $(this).attr('id-nama');
        
        // alert(nama_unit);
       
        document.getElementById('ed_id_transaksi').value=id_trans;
        document.getElementById('ed_nama_transaksi').value=nama_transaksi;
        
         });

   $('.detailDelete').click(function() {

        var id_trans = $(this).attr('id-trans');
        var nama_transaksi = $(this).attr('id-nama');
        $("#delConfirm").empty();
        $("#delConfirm").append( 'Yakin Anda Akan Mendelete Transaksi : <b> <i>'+ nama_transaksi +'</i>  </b><br>');
        $("#delConfirm").append( '<input type="hidden" name="id_trans" value="'+id_trans+'">');
      
        
    });


}); // document ready   $(document).ready(function() {

</script>


 