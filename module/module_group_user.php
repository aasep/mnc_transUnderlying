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
                                                    <span class="caption-subject font-red-haze bold uppercase">Form  Group User </span>
                                                    <span class="caption-helper"> Management Group User...</span>
                                                </div>
                                                <div class="tools">
                                                    
                                                    <a href="" class="collapse" data-original-title="" title=""> </a>
                                                   
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                               
                                                    <div class="form-body">
                                                        <a href="#large" data-toggle="modal" class="btn green"> Add Group User <i class="fa fa-plus"></i> </a>

                           <!---  COMMENT CONFIRM FORM-->     
    <?php

    if (isset($_GET['message']) && ($_GET['message']=="success")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Berhasil Ditambahkan...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="failed")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data gagal ditambahkan...!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="exist")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Sudah Ada ...! </strong> </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="succDel")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Berhasil Dihapus...! </strong> </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="failDel")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Dihapus...! </strong> </div>";
     }

      if (isset($_GET['message']) && ($_GET['message']=="succUp")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Berhasil Dirubah...! </strong> </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="failUp")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Dirubah...! </strong> </div>";
     }

     ?>



                            <hr>   
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>List Of Group User </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                <br>
                                <br>
                                <br>
                                    <table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
                                        <thead>
                                            <tr>
                                                <th> No </th>
                                                <th> Nama Group </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                $query = " select * from group_user order by nama_group asc ";
                                
                                $result=pg_query($connection,$query);
                                $i=1;
                                while ($row=pg_fetch_array($result)) {
                                   

                                    echo "<tr>";
                                    echo "<td width='2%'> $i </td>";
                                    echo "<td width='75%'> $row[nama_group] </td>";
                                    
                                    echo "<td width='23%'><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#'  
id-idgroup='$row[id_group]' id-nama='$row[nama_group]'><button class='btn default'>Edit</button></a></a> <a href='#'  data-toggle='modal' id-idgroup='$row[id_group]' id-nama='$row[nama_group]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
                                    echo "</tr>";
                                    $i++;

                                    # code...
                                }


                                ?> 
                                            
                                                
                                               
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                                                    <i class="icon-equalizer font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Add Group User </span>
                                                    <span class="caption-helper">Additional Group User ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=add_group_user"?>" id="form_sample_1" class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                
                                                 
                                                

                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nama Group
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="nama_group" id="nama_group" data-required="1" class="form-control"  /> </div>
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
                                                    <i class="fa fa-edit font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Edit Group User </span>
                                                    <span class="caption-helper">Editing Group User ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=edit_group_user"?>" id="form_sample_3" class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                           
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Username
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="ed_nama_group" id="ed_nama_group" data-required="1" class="form-control"  />
                                                    <input type="hidden" name="ed_id_group" id="ed_id_group" data-required="1" class="form-control"  /> </div>
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
                                                    <span class="caption-subject font-red-haze bold uppercase">Confirm Delete Group User </span>
                                                    <span class="caption-helper">Dispose Group User ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=delete_group_user"?>"  class="form-horizontal" method="POST" >
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
                    nama_group: {
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
        
        var id_group = $(this).attr('id-idgroup');
        var nama_group = $(this).attr('id-nama');
      
        document.getElementById('ed_id_group').value=id_group;
        document.getElementById('ed_nama_group').value=nama_group;
        

        
    });

   $('.detailDelete').click(function() {
        var id_group = $(this).attr('id-idgroup');
        var nama = $(this).attr('id-nama');
        $("#delConfirm").empty();
        $("#delConfirm").append( 'Yakin Anda Akan Mendelete Grop user : <b> <i>'+ nama +'</i>  </b><br>');
        $("#delConfirm").append( '<input type="hidden" name="id_group" value="'+id_group+'">');
      
        
    });


}); // document ready   $(document).ready(function() {

</script>


 