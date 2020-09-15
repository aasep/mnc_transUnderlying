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
                                                    <span class="caption-subject font-red-haze bold uppercase">Form Add User </span>
                                                    <span class="caption-helper">for additional user...</span>
                                                </div>
                                                <div class="tools">
                                                    
                                                    <a href="" class="collapse" data-original-title="" title=""> </a>
                                                   
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                               
                                                    <div class="form-body">
                                                        <a href="#large" data-toggle="modal" class="btn green"> Add User <i class="fa fa-plus"></i> </a>

                           <!---  COMMENT CONFIRM FORM-->     
    <?php

    if (isset($_GET['message']) && ($_GET['message']=="success")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>User Berhasil Ditambahkan...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="failed")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>User gagal ditambahkan...!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="exist")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>User Sudah Ada ...! </strong> </div>";
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
                                        <i class="fa fa-globe"></i> <b>List Of User </b></div>
                                        
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
                                                <th> Nik </th>
                                                <th> Nama Lengkap </th>
                                                <th> Group User </th>
                                                <th> Status </th>
                                                <th> Unit </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                $query = " select *,b.id_unit as kode_unit from user_account a ";
                                $query.= " left join unit b on a.id_unit=b.id_unit ";
                                $query.= " left join group_user c on c.id_group=a.id_group order by a.nik asc ";

                               //echo $query;

                                $result=pg_query($connection,$query);
                                $i=1;
                                while ($row=pg_fetch_array($result)) {
                                    switch ($row['is_active']) {
                                        case '0':
                                            $status_aktif="<span class='label label-danger'> Non Aktif </span>";
                                            break;
                                        case '1':
                                            $status_aktif="<span class='label label-success'> Aktif </span>";
                                            break;
                                    }



                                    echo "<tr>";
                                    echo "<td width='2%'> $i </td>";
                                    echo "<td width='10%'> $row[nik] </td>";
                                    echo "<td width='17%'> $row[nama_lengkap] </td>";
                                    echo "<td width='20%'> $row[nama_group] </td>";
                                    echo "<td width='10%'> $status_aktif </td>";
                                    echo "<td width='20%'> $row[nama_unit] </td>";
                                    echo "<td width='31%'><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#'  
id-group='$row[id_group]' id-status='$row[is_active]'  id-nik='$row[nik]' id-pass='$row[password]' id-nama='$row[nama_lengkap]' id-unit='$row[kode_unit]' ><button class='btn default'>Edit</button></a></a> <a href='#'  data-toggle='modal' id-nik='$row[nik]' id-nama='$row[nama_lengkap]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
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
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Add User </span>
                                                    <span class="caption-helper">Additional User ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=add_user"?>" id="form_sample_1" class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                
                                                 
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Nama Lengkap 
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                             <input type="text" name="nama_karyawan" id="nama_karyawan" data-required="1" class="form-control"  /> </div>  
                                                             </div> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">NIK 
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                         <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" name="yusername" id="yusername" data-required="1" class="form-control"  /> </div>
                                                         </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                                    <input type="password" name="password" id="password" data-required="1" class="form-control"  /> </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Confirm Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                         <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                                    <input type="password" name="cpassword" id="cpassword" data-required="1" class="form-control"  /> </div>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Group User 
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                                <select class="form-control select2"  name="group_user" id="group_user">
                                                                    <option value="">Select...</option>
                                                                    <?php
                                                                    $q_group  =" select id_group,nama_group from group_user order by nama_group asc ";
                                                                    $res_group=pg_query($connection,$q_group);
                                                                    while ($r_group=pg_fetch_array($res_group)) {
                                                                    echo "<option value='$r_group[id_group]' > $r_group[nama_group] </option>";  
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            </div>
                                                </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Unit/ Cabang 
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                                                <select class="form-control select2"  name="id_unit" id="id_unit">
                                                                    <option value="">Select...</option>
                                                                    <?php
                                                                    $q_group  =" select id_unit,nama_unit from unit order by nama_unit asc ";
                                                                    $res_group=pg_query($connection,$q_group);
                                                                    while ($r_group=pg_fetch_array($res_group)) {
                                                                    echo "<option value='$r_group[id_unit]' > $r_group[nama_unit] </option>";  
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Select
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-expeditedssl"></i></span>
                                                    <select class="form-control" name="status_account" id="status_account">
                                                        <option value="">Status Account...</option>
                                                        <option value="0">Non Aktif</option>
                                                        <option value="1">Aktif </option>
                                                    </select>
                                                    </div>
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
                                                    <i class="fa fa-edit font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Edit User </span>
                                                    <span class="caption-helper">Editing User ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=edit_user"?>" id="form_sample_3" class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                                
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Nama Lengkap 
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                             <input type="text" name="ed_nama_karyawan" id="ed_nama_karyawan" data-required="1" class="form-control"  /> </div>  
                                                             </div> 
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">NIK 
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                         <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" name="ed_yusername" id="ed_yusername" data-required="1" class="form-control"  /> </div>
                                                         </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                                    <input type="password" name="ed_password" id="ed_password" data-required="1" class="form-control"  /> </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Group User 
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                                <select class="form-control"  name="ed_group_user" id="ed_group_user">
                                                                    
                                                                </select>
                                                            </div>
                                                            </div>
                                                </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-3">Unit/ Cabang 
                                                            <span class="required"> * </span></label>
                                                            <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                                                <select class="form-control"  name="ed_id_unit" id="ed_id_unit">
                                                                    
                                                                </select>
                                                            </div>
                                                            </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Select
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <div class="input-group">
                                                                <span class="input-group-addon"><i class="fa fa-expeditedssl"></i></span>
                                                    <select class="form-control" name="ed_status_account" id="ed_status_account">
                                                       
                                                    </select>
                                                    </div>
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
                                                    <span class="caption-subject font-red-haze bold uppercase">Confirm Delete User </span>
                                                    <span class="caption-helper">Dispose User ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=delete_user"?>"  class="form-horizontal" method="POST" >
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
                    nama_karyawan: {
                        required: true
                    },
                    group_user: {
                        required: true
                    },
                    yusername: {
                        required: true
                    },
                    status_account: {
                        required: true
                    },
                    id_unit: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    cpassword: {
                        required: true,
                         minlength: 5,
                        equalTo: "#password"
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
  /*$('#nama_karyawan').change(function() {
        var nik=$(this).val();
        //document.getElementById('xusername').value=nik;
        document.getElementById('yusername').value=nik;
     
    });
   
   $('#ed_nik').change(function() {
        var nik=$(this).val();
        document.getElementById('ed_username').value=nik;
        //document.getElementById('yusername').value=nik;
     
    });
*/

   $('.detailEdit').click(function() {
        var nik = $(this).attr('id-nik');
        var id_group = $(this).attr('id-group');
        var password = $(this).attr('id-pass');
        var status = $(this).attr('id-status');
        var nama_lengkap = $(this).attr('id-nama');
        var id_unit = $(this).attr('id-unit');
        //alert (nik);
        document.getElementById('ed_yusername').value=nik;
        document.getElementById('ed_nama_karyawan').value=nama_lengkap;
       
        var dataString = 'id='+id_unit;
        var dataString1 = 'id='+id_group;
        var dataString2 = 'id='+status;
        
        //alert(dataString);
        
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_edit_id_unit.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#ed_id_unit").html(html);
        } 
            }); 

        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_edit_user1.php",
        data: dataString1,
        cache: false,
        success: function(html)
        {
            $("#ed_group_user").html(html);
        } 
            }); 

        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_edit_user2.php",
        data: dataString2,
        cache: false,
        success: function(html)
        {
            $("#ed_status_account").html(html);
        } 
            }); 

        
    });

   $('.detailDelete').click(function() {
        var nik = $(this).attr('id-nik');
        var nama = $(this).attr('id-nama');
        $("#delConfirm").empty();
        $("#delConfirm").append( 'Yakin Anda Akan Mendelete user : <b>'+nik+' , <i>'+ nama +'</i>  </b><br>');
        $("#delConfirm").append( '<input type="hidden" name="nik" value="'+nik+'">');
      
        
    });


}); // document ready   $(document).ready(function() {

</script>


 