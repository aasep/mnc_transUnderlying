<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

?>

<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Parameter Kurs</span>
                                                    <span class="caption-helper">For Updating Kurs...</span>
                                                </div>
                                                <div class="tools">
                                                    
                                                    <a href="" class="collapse" data-original-title="" title=""> </a>
                                                   
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                               
                                                    <div class="form-body">
                                                        <a href="#large" data-toggle="modal" class="btn green"> Add Kurs  <i class="fa fa-plus"></i> </a>

                           <!---  COMMENT CONFIRM FORM-->     
    <?php

   
      if (isset($_GET['message']) && ($_GET['message']=="succUp")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Data Berhasil Dirubah...!  </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="failUp")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Data Gagal Dirubah...! </div>";
     }
      if (isset($_GET['message']) && ($_GET['message']=="success")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Data Berhasil Ditambahkan...!  </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="failed")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Data Gagal Ditambahkan...! </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="succDel")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Data Berhasil Dihapus...!  </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="failDel")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Data Gagal Dihapus...! </div>";
     }
     
     ?>



                            <hr>   
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i> Nilai Kurs  </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        
                                    </div>
                                </div>
                                <div class="portlet-body flip-scroll">
                                <br>
                                <br>
                                <br>
                                    <table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
                                        <thead class="flip-content">
                                            <tr>
                                                <th width="10%"> No </th>
                                                <th width="25%" > Nama Kurs </th>
                                                <th width="20%" > Inisial Valas </th>
                                                <th width="20%" > Nilai Kurs </th>
                                                <th width="25%" > Action </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 

                                        $query= "select * from nilai_kurs ";
                                        $result=pg_query($connection,$query);
                                        $i=1;
                                            while ($row=pg_fetch_array($result)) {
                                        ?>
                                            <tr>
                                               
                                                <td class="numeric"> <?php echo $i;?> </td>
                                                <td class="numeric"> <?php echo $row['nama_kurs'];?> </td>
                                                <td class="numeric"> <?php echo $row['inisial'];?> </td>
                                                <td class="numeric"> <?php echo $row['nilai_kurs'];?> </td>
                                                <?php 
                                                echo "<td style='font-size:12px'><a href='#'  data-toggle='modal' data-target='#view-edit' id-nama='$row[id]' id-nmkurs='$row[nama_kurs]' id-inisial='$row[inisial]' id-nlkurs='$row[nilai_kurs]' class='detailEdit' ><button class='btn default'>Edit</button></a><a href='#'  data-toggle='modal' id-nama='$row[id]' id-nmkurs='$row[nama_kurs]' id-inisial='$row[inisial]' id-nlkurs='$row[nilai_kurs]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
                                                ?>
                                            </tr>
                                         <?php
                                         $i++; 
                                         } 

                                         ?>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                            <!-- END EXAMPLE TABLE PORTLET-->
                                                       
                                                    </div>
                                                   
                                                
                                            </div>
                                        </div>



                                        <!-- ##################   modal insert ###################################-->



                        <div class="modal fade bs-modal-lg" id="large"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Add Kurs </span>
                                                    <span class="caption-helper">For additional Kurs...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=add_kurs"?>" id="form_sample_1" class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                
                                                 
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Nama Kurs
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-sticky-note"></i></span>
                                                             <input type="text" name="nama_kurs" id="nama_kurs" data-required="1" class="form-control"  /> </div>  
                                                             </div> 
                                                </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Inisial
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                                                             <input type="text" name="inisial_kurs" id="inisial_kurs" data-required="1" class="form-control" /> </div>  
                                                             </div> 
                                                </div>

                                                 <div class="form-group">
                                                            <label class="control-label col-md-3">Nilai Kurs
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                             <input type="text" name="nilai_kurs" id="nilai_kurs" data-required="1" class="form-control"  /> </div>  
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
                                    <!-- #########################  /end modal insert ############################# -->


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
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=edit_kurs"?>" id="form_sample_3" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                
                                                 
                                               

                                                
                                                
                                                
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Nama Kurs
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-sticky-note"></i></span>
                                                             <input type="text" name="ed_nama_kurs" id="ed_nama_kurs" data-required="1" class="form-control"  /> </div>  
                                                             </div> 
                                                </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Inisial
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                                                             <input type="text" name="ed_inisial_kurs" id="ed_inisial_kurs" data-required="1" class="form-control" /> </div>  
                                                             </div> 
                                                </div>

                                                 <div class="form-group">
                                                            <label class="control-label col-md-3">Nilai Kurs
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                             <input type="text" name="ed_nilai_kurs" id="ed_nilai_kurs" data-required="1" class="form-control"  /> </div>  
                                                             </div> 
                                                </div>
                                                
                                                <p id="upConfirm"> </p>
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
                                                    <span class="caption-subject font-red-haze bold uppercase">Confirm Delete Kurs </span>
                                                    <span class="caption-helper">Dispose Kurs ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=delete_kurs"?>"  class="form-horizontal" method="POST" >
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
                    nama_kurs: {
                        required: true

                    },
                    inisial_kurs: {
                        required: true

                    },
                    nilai_kurs: {
                        required: true,
                        number: true,

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

        var id = $(this).attr('id-nama');
        var nama_kurs = $(this).attr('id-nmkurs');
        var inisial = $(this).attr('id-inisial');
        var nilai_kurs = $(this).attr('id-nlkurs');
        
        
        // alert(nama_unit);
        document.getElementById('ed_nama_kurs').value=nama_kurs;
        document.getElementById('ed_inisial_kurs').value=inisial;
        document.getElementById('ed_nilai_kurs').value=nilai_kurs;
        $("#upConfirm").empty();
        $("#upConfirm").append( '<input type="hidden" name="ed_id_kurs" value="'+id+'">');

        
         });

   $('.detailDelete').click(function() {

        var id = $(this).attr('id-nama');
        var nama_kurs = $(this).attr('id-nmkurs');
        var inisial = $(this).attr('id-inisial');
        var nilai_kurs = $(this).attr('id-nlkurs');

        $("#delConfirm").empty();
        $("#delConfirm").append( 'Yakin Anda Akan Mendelete Kurs : <b> <i>'+ nama_kurs +'</i> ( '+ inisial +' )  </b><br>');
        $("#delConfirm").append( '<input type="hidden" name="id_kurs" value="'+id+'">');
      
        
    });


}); // document ready   $(document).ready(function() {

</script>
