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
                                                    <span class="caption-subject font-red-haze bold uppercase">Form  Menu </span>
                                                    <span class="caption-helper"> Management Menu...</span>
                                                </div>
                                                <div class="tools">
                                                    
                                                    <a href="" class="collapse" data-original-title="" title=""> </a>
                                                   
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                               
                                                    <div class="form-body">
                                                        <a href="#large" data-toggle="modal" class="btn green"> Add Menu <i class="fa fa-plus"></i> </a>

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
                                        <i class="fa fa-globe"></i> <b>List Of Menu </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                <br>
                                <br>
                                <br>
                                    <table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
                              <!--      
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
                                        -->

                                        <thead>
                            <tr>
                                
                                <th>
                                     NO
                                </th>
                                
                                <th>
                                      Menu Name
                                </th>
                                <th>
                                     Parent
                                </th>
                                <th>
                                     Kode
                                </th>
                                <th>
                                     Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $no_parent=1;
                            $query="select * from menu where parent='0' order by id_menu asc ";
                            $result=pg_query($connection,$query);
                            while ($row=pg_fetch_array($result)) {
                          
                             $submenu=1;    
                            echo "<tr>";
                            
                            echo "<td width='5%'>$no_parent</td>";
                            echo "<td width='50%'><b>$row[nama_menu]</b></td>";
                            echo "<td width='5%'>".$row['parent']."</td>";
                            echo "<td width='10%'>$row[id_menu]</td>";
                            echo "<td width='30%'><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#'  
id-idmenu='$row[id_menu]' id-nama='$row[nama_menu]' id-parent='$row[parent]'><button class='btn default'>Edit</button></a></a> <a href='#'  data-toggle='modal' id-idmenu='$row[id_menu]' id-nama='$row[nama_menu]' id-parent='$row[parent]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
                            echo "</tr>";

                            $query2="select * from menu where parent='$row[id_menu]' order by nama_menu asc ";
                            $result2=pg_query($connection,$query2);
                            while ($row2=pg_fetch_array($result2)) {

                            echo "<tr>";
                            echo "<td width='5%'>$no_parent . $submenu </td>";
                            echo "<td width='50%'>$row2[nama_menu]</td>";
                            echo "<td width='5%'>".$row2['parent']."</td>";
                            echo "<td width='10%'>$row2[id_menu]</td>";
                            echo "<td width='30%'><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#'  
id-idmenu='$row2[id_menu]' id-nama='$row2[nama_menu]' id-parent='$row2[parent]'><button class='btn default'>Edit</button></a></a> <a href='#'  data-toggle='modal' id-idmenu='$row2[id_menu]' id-nama='$row2[nama_menu]' id-parent='$row2[parent]' data-target='#delete-modal' class='detailDelete' > <button class='btn red'>Delete</button></a></td>";
                            echo "</tr>";
                              $submenu++;
                            }

                            $no_parent++;


                            
                                    }
                            ?>


                            </tbody>
                            </table>







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
                                                    <span class="caption-subject font-red-haze bold uppercase">Add Menu </span>
                                                    <span class="caption-helper">Additional Menu ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=add_menu"?>" id="form_sample_1" class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                
                                                 
                                                

                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nama Menu
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="nama_menu" id="nama_menu" data-required="1" class="form-control"  /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Parent <span class="required">* </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <select class="form-control" name="parent" id="parent">
                                                        <option value="0">No Parent (as Parent)</option>
                                                             <?php
                                                            $query_parent="select * from menu where parent='0' order by nama_menu asc";
                                                            $result_parent=pg_query($connection, $query_parent);
                                                            while ($row_parent=pg_fetch_array($result_parent)){
                                                                
                                                                      echo "<option value='$row_parent[id_menu]' >$row_parent[nama_menu]</option>"; 
                                                                        
                                                             }

                                                             ?>
                                                
                                                    </select>
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
                                                    <i class="fa fa-edit font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Edit Menu </span>
                                                    <span class="caption-helper">Editing Menu ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=edit_menu"?>" id="form_sample_3" class="form-horizontal" method="POST" >
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                           
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Username
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="ed_nama_menu" id="ed_nama_menu" data-required="1" class="form-control"  />
                                                    <input type="hidden" name="ed_id_menu" id="ed_id_menu" data-required="1" class="form-control"  /> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Parent <span class="required">* </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                    <select class="form-control" name="ed_parent" id="ed_parent">
                                                        
                                                
                                                    </select>
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
                                                    <span class="caption-subject font-red-haze bold uppercase">Confirm Delete Menu </span>
                                                    <span class="caption-helper">Dispose Menu  ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=delete_menu"?>"  class="form-horizontal" method="POST" >
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
                    nama_menu: {
                        required: true
                    },
                    parent: {
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
        
        var id_menu = $(this).attr('id-idmenu');
        var nama = $(this).attr('id-nama');
        var parent = $(this).attr('id-parent');
        document.getElementById('ed_id_menu').value=id_menu;
        document.getElementById('ed_nama_menu').value=nama;
        

        var dataString = 'id='+parent;
        
        
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_edit_menu.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#ed_parent").html(html);
        } 
            }); 

        
    });

   $('.detailDelete').click(function() {
        var id_menu = $(this).attr('id-idmenu');
        var nama = $(this).attr('id-nama');
        $("#delConfirm").empty();
        $("#delConfirm").append( 'Yakin Anda Akan Mendelete Menu : <b> <i>'+ nama +'</i>  </b><br>');
        $("#delConfirm").append( '<input type="hidden" name="id_menu" value="'+id_menu+'">');
      
        
    });


}); // document ready   $(document).ready(function() {

</script>


 