<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

?>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>

<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>


<link rel="shortcut icon" href="favicon.ico"/>


<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/chosen.css">

<style type="text/css" class="init">
    </style>

    <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="extensions/TableTools/js/dataTables.tableTools.js"></script>
    <script type="text/javascript" language="javascript" src="examples/resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="examples/resources/demo.js"></script>

<script type="text/javascript" charset="utf-8">


$(document).ready( function() {
    
/*
"bJQueryUI": true,
"bPaginate": false,
"bLengthChange": false,
"bFilter": false,
"bProcessing": true,
"bSort": true,
"bSortClasses": false,
"bInfo": true,
"bAutoWidth": true,
"sDom": 'Rrtl',
"oColVis": {
"buttonText": "Show/Hide Columns"

*/


    $('#list_trans').dataTable({
        //"bJQueryUI": true,
        //"bPaginate": false,
        //"bSort": true,
        //"bSortClasses": false,
        //"oColVis": {
       // "buttonText": "Show/Hide Columns",
        "bFilter": false,
        "bInfo": true,      
        "processing": true,
        "serverSide": true,
        "sAjaxSource": "../muds_ver2/module/server_side/server_processing_trans.php",
        "iDisplayLength": 10,
        "iDisplayStart": 0
    });
  
}); 
</script> 





<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">List Transaksi </span>
                                                    <span class="caption-helper">for view detail transaction...</span>
                                                </div>
                                                <div class="tools">
                                                    
                                                    <a href="" class="collapse" data-original-title="" title=""> </a>
                                                   
                                                    
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                               
                                                    <div class="form-body">
                                                        <!-- <a href="#large" data-toggle="modal" class="btn green"> Add User <i class="fa fa-plus"></i> </a> -->

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
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>List Transaksi  </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                <form action="" method="POST">                         
                        <div class="form-group">
                                                
                                                <div class="col-md-3">
                                                    <select class="form-control select2" name="srcby" id="srcby" required>
                                                        <option value="">Choose Base On...</option>
                                                        <option value="1" <?php if ($srcby=='1') echo "selected='selected'"; ?>>Ticket Number </option>
                                                        <option value="2" <?php if ($srcby=='2') echo "selected='selected'"; ?>>Customer Name</option>
                                                        <option value="3" <?php if ($srcby=='3') echo "selected='selected'"; ?>>Account Number</option>
                                                        <option value="4" <?php if ($srcby=='4') echo "selected='selected'"; ?>>No Credit Card</option>
                                                    </select>
                                                </div>
                                            </div>
<div class="input-group col-md-3">
<div class="input-cont">
<input class="form-control" type="text" name="srckey" value="<?php echo $srckey;?>" placeholder="Key Word..." required>
</div>
<!-- TYPE HIDDEN  optional -->
<input type="hidden" name="act1" value="<?php echo $_POST['act1'];?>">
<span class="input-group-btn">
<button class="btn green-haze" type="submit">Search <i class="m-icon-swapright m-icon-white"></i></button>
</span>
</div>
</form>
                                <br>
                                <br>
                                <br>
                <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover" id="list_trans" width="100%">
                                       
                            <thead>
                        <tr>
                             <th> No. Transaksi /<br> Penerima /<br>CIF Number</th>
                             <th> Nama Transaksi / <br>Tanggal Terbit / <br>Nominal Transaksi </th>
                             <th> Jenis Transaksi / <br>Nama Cabang / <br>Nilai Dokumen </th>
                             <th> Nama Penerima / <br> Nama Penginput / <br> Keterangan </th>
                             <th style="font-size:12px" width="10%">Status</th>
                             <th> Action Approval / Reject / Status </th>
                        </tr>
                            </thead>
                     <tbody>                   
                     </tbody>
                        </table>  
                </div>



                                    <!-- <table class="table table-striped table-bordered table-hover" id="sample_2" width="150%">
                                        <thead>
                                            <tr>
                                                <th> No. Transaksi /<br> Penerima /<br>CIF Number</th>
                                                <th> Nama Transaksi / <br>Tanggal Terbit / <br>Nominal Transaksi </th>
                                                <th> Jenis Transaksi / <br>Nama Cabang / <br>Nilai Dokumen </th>
                                                <th> Nama Penerima / <br> Nama Penginput / <br> Keterangan </th>
                                                <th> Action Approval / Reject / Status </th>
                                            </tr>
                                        </thead>
                                        <tbody>
  
                                        <?php
                                $query = " select * from transaksi_outgoing  a ";
                                $query.= " left join tujuan_transaksi b on b.id_trans=a.id_trans  ";
                                $query.= " left join jenis_underlying c on c.id_jenis=a.id_jenis  ";
                                $query.= " left join unit d on d.id_unit=a.id_cabang  ";
                                $query.= " left join user_account e on e.nik=a.id_user WHERE a.status <> '99'  order by a.idtrans_out asc ";
                                $result=pg_query($connection,$query);
                                $i=1;
                                while ($row=pg_fetch_array($result)) {
                                  
                                    echo "<tr>";
                                    echo "<td width='5%' style='font-size:12px'><i class='fa fa-credit-card'></i> <b>$row[idtrans_out] <br> </b> <i class='fa fa-user'></i> $row[nama_pengirim] <br> CIF: $row[cif_number] </td>";
                                    echo "<td width='20%' style='font-size:12px'> $row[nama_tj_transaksi] <br>".date('d-m-Y',strtotime($row['tgl_terbit']))."<br>".formatUSD($row['nominal_trans'])." => ".formatRupiah($row['nilai_ekivalen'])." </td>";
                                    echo "<td width='20%' style='font-size:12px'> $row[nama_js_underlying] <br> $row[nama_unit] <br> ".formatRupiah($row['nominal_dokumen'])." </td>";
                                    echo "<td width='55%' style='font-size:12px'> $row[nama_penerima] <br>$row[nama_lengkap] <br> $row[keterangan] </td>";
                                    echo "<td width='50%' style='font-size:12px' align='center'><a class='detailRecheck' data-toggle='modal' data-target='#check_modal' href='#'  
id-idtrans='$row[idtrans_out]'  ><button class='btn btn-sm green'><i class='fa fa-check-square-o'></i> Detail Trans </button></a>   <a class='detailLog' data-toggle='modal' data-target='#log_transaksi' href='#'  id-idtrans='$row[idtrans_out]' > <button class='btn btn-sm blue'><i class='fa fa-commenting'></i> Status Trans </button> </a></td>";
                                    echo "</tr>";
                                    $i++;

                                  
                                }
                               

                                ?> 
     
                                        </tbody>
                                    </table> -->
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                                                       
                                                    </div>
                                                   
                                                
                                            </div>
                                        </div>



    
                                        <!-- ##################   modal Recheck ###################################-->



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
  
$('.detailRecheck').click(function() {
        var idtrans = $(this).attr('id-idtrans');

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


   $('.detailLog').click(function() {
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


}); // document ready   $(document).ready(function() {

</script>


 