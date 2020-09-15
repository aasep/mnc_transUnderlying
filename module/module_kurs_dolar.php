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
                                                        <a href="#large" data-toggle="modal" class="btn green"> Update Kurs USD <i class="fa fa-dollar"></i> </a>

                           <!---  COMMENT CONFIRM FORM-->     
    <?php

   
      if (isset($_GET['message']) && ($_GET['message']=="succUp")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Data Berhasil Dirubah...!  </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="failUp")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Data Gagal Dirubah...! </div>";
     }

     ?>



                            <hr>   
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i> Kurs Dollar (USD) </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content">
                                            <tr>
                                                <th width="10%"> <i class="fa fa-dollar"> </i> USD </th>
                                                <th width="90%" > IDR </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                               
                                                <td class="numeric"> $1 </td>
                                                <td class="numeric"> <?php echo formatRupiah(nilaiKurs());?> </td>
                                                
                                            </tr>
                                            
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
                                                    <span class="caption-subject font-green-haze bold uppercase">Update Kurs </span>
                                                    <span class="caption-helper">For Updating Kurs...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=update_kurs"?>" id="form_sample_1" class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                
                                                 
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Kurs Lama
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                             <input type="text" name="old_kurs" id="old_kurs" data-required="1" class="form-control" value="<?php echo nilaiKurs();?>" disabled /> </div>  
                                                             </div> 
                                                </div>

                                                 <div class="form-group">
                                                            <label class="control-label col-md-3">Kurs Baru
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                                             <input type="text" name="new_kurs" id="new_kurs" data-required="1" class="form-control"  /> </div>  
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
                    new_kurs: {
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

