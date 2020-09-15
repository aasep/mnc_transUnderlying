<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

?>




<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Edit Profile </span>
                                                    <span class="caption-helper"> Edit My Profile Form ...</span>
                                                </div>

                                            </div>

                                                    
                                        <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=edit_myprofile"; ?>" id="form_sample_1" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                        <?php
    if (isset($_GET['message']) && ($_GET['message']=="succUp")){
    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Successful edited Profile ....! </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="errUp")){
    echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Failed edited Profile ....!  </div>";
}

    ?>
    



                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>


                                              

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama Lengkap
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cogs"></i>
                                                        </span>
                                                    <input type="text" name="nama_lengkap" id="nama_lengkap" data-required="1" value="<?php echo getNamaLengkap();?>" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                           
                                           <input type="hidden" name="nik" id="nik" data-required="1" value="<?php echo getUsername();?>" class="form-control" />

                                            <div class="form-group last">
                                        <label class="control-label col-md-3">My Photo </label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if (isset($_SESSION['SESS_IMG'])) { 
                                                    $random=rand(1,999999999);
                                                    echo "<img src='images/profile/".$_SESSION['SESS_IMG']."?var=$random' alt=''/>";
                                                } else {
                                                    ?>
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                    <?php 
                                                        }
                                                    ?>      
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="file" name="file_img" id="file_img">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>


                                          
                                           
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">

                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                                <!-- END VALIDATION STATES-->

                                            
                                <!-- END VALIDATION STATES-->
                                            
                                        </div>





<!--   VALIDATION FORM -->
<script type="text/javascript">
var FormValidation = function () {

   


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
                    
                     nama_lengkap: {
                         required: true
                     }
                    
                    

                },

                 messages: { // custom messages for radio buttons and checkboxes
                    
                     nama_lengkap: {
                         required: "Nama Lengkap Wajib diisi..."
                        
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
            alterDisabledState();    
        }

    };

}();

</script>


