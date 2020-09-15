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
                                                    <span class="caption-subject font-red-haze bold uppercase">Recheck By Branch </span>
                                                    <span class="caption-helper">for Recheck of transaction...</span>
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

     
      if (isset($_GET['message']) && ($_GET['message']=="RecSucc")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Recheck Transaksi Berhasil...! </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="failRec")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Recheck Transaksi Gagal...!  </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="SuccUp")){
    echo "<hr><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Update Transaksi Berhasil...! </div>";
     }
     if (isset($_GET['message']) && ($_GET['message']=="failUp")){
    echo "<hr><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Update Transaksi Gagal...!  </div>";
     }
     ?>


                           
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box grey-gallery">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i> <b>List  Transaksi yang diReject </b></div>
                                        
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                <br>
                                <br>
                                <br>
                                    <table class="table table-striped table-bordered table-hover" id="sample_2" width="150%">
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
                                $query.= " left join user_account e on e.nik=a.id_user WHERE a.status='4' and a.id_cabang='".getIdUnit()."' order by a.idtrans_out asc ";
                                $result=pg_query($connection,$query);
                                $i=1;
                                while ($row=pg_fetch_array($result)) {
                                  
                                    echo "<tr>";
                                    echo "<td width='5%' style='font-size:12px'><i class='fa fa-credit-card'></i> <b>$row[idtrans_out] <br> </b> <i class='fa fa-user'></i> $row[nama_pengirim] <br> CIF: $row[cif_number] </td>";
                                    echo "<td width='20%' style='font-size:12px'> $row[nama_tj_transaksi] <br>".date('d-m-Y',strtotime($row['tgl_terbit']))."<br>".formatUSD($row['nominal_trans'])." => ".formatRupiah($row['nilai_ekivalen'])." </td>";
                                    echo "<td width='20%' style='font-size:12px'> $row[nama_js_underlying] <br> $row[nama_unit] <br> ".formatRupiah($row['nominal_dokumen'])." </td>";
                                    echo "<td width='55%' style='font-size:12px'> $row[nama_penerima] <br>$row[nama_lengkap] <br> $row[keterangan] </td>";
                                    echo "<td width='50%' style='font-size:12px' align='center'><a class='detailRecheck' data-toggle='modal' data-target='#check_modal' href='#'  
id-idtrans='$row[idtrans_out]'  ><button class='btn btn-sm green'><i class='fa fa-check-square-o'></i> ReCheck </button></a>  <a class='detailEdit' data-toggle='modal' data-target='#edit_modal' href='#'  id-idtrans='$row[idtrans_out]' id-pengirim='$row[nama_pengirim]' id-penerima='$row[nama_penerima]' id-nominalTrans='$row[nominal_trans]' id-nilaiKurs='$row[nilai_kurs]' id-nilaiEkivalen='$row[nilai_ekivalen]' id-cabang='$row[id_cabang]' id-idJnsTrans='$row[id_trans]' id-idJenis='$row[id_jenis]' id-noDok='$row[no_dok]' id-tglTerbit='".date('Y-m-d',strtotime($row['tgl_terbit']))."' id-nominalDokumen='$row[nominal_dokumen]' id-namaOut='$row[nama_out]' id-keterangan='$row[keterangan]' id-namaTertera='$row[nama_tertera]' id-attachFile='$row[file_attach]' id-cifno='$row[cif_number]'> <button class='btn btn-sm red'><i class='fa fa-edit'></i> Edit </button> </a>  <a class='detailLog' data-toggle='modal' data-target='#log_transaksi' href='#'  id-idtrans='$row[idtrans_out]' > <button class='btn btn-sm blue'><i class='fa fa-commenting'></i> Status </button> </a></td>";
                                    echo "</tr>";
                                    $i++;

                                    # code...
                                }
                                //row[nama_tertera]

                                ?> 
     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                                                       
                                                    </div>
                                                   
                                                
                                            </div>
                                        </div>



                                        <!-- ##################   modal Recheck ###################################-->



                        <div class="modal fade bs-modal-lg" id="check_modal"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Recheck Transaksi </span>
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





<!-- ##################   modal edit trans ###################################-->
 
                      <div class="modal fade bs-modal-lg" id="edit_modal"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-edit font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Edit Transaksi</span>
                                                    <span class="caption-helper">detail  transaksi ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=edit_trans"; ?>" id="form_sample_edit" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                        


                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                               
                                            <div class="form-group" id="pengirim1" >
                                                <label class="control-label col-md-3">No. Transaksi
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" id="sender_name" >
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                                         <input type="text" name="no_trans" id="no_trans" data-required="1" class="form-control" disabled /> 
                                                         <input type="hidden" name="no_trans_edit" id="no_trans_edit" data-required="1" class="form-control"  />
                                                </div>
                                                    </div>
                                            </div>
                                             <div class="form-group"  >
                                                <label class="control-label col-md-3">No. CIF
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" id="sender_name" >
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                                         <input type="text" name="no_cifx" id="no_cifx" data-required="1" class="form-control" disabled /> 
                                                </div>
                                                    </div>
                                            </div>
                                            <div class="form-group" id="pengirim1" >
                                                <label class="control-label col-md-3">Nama Pengirim
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" id="sender_name" >
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                         <input type="text" name="nama_pengirim1" id="nama_pengirim1" data-required="1" class="form-control" /> 
                                                </div>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama Penerima
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    <input type="text" name="nama_penerima" id="nama_penerima" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nominal Transaksi
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-dollar"></i>
                                                        </span>
                                                    <input type="text" name="nominal_trans" id="nominal_trans"  data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nilai Kurs
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                    <input type="text" name="nilai_kursx" id="nilai_kursx" data-required="1" value="<?php echo nilaiKurs();?>" class="form-control" disabled/> 
                                                    <input type="hidden" name="nilai_kurs" id="nilai_kurs" data-required="1" value="<?php echo nilaiKurs();?>" class="form-control" /></div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nilai Equivalen nilai USD
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                    <input type="text" name="nilai_ekivalen" id="nilai_ekivalen" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Kantor Cabang
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-book"></i>
                                                        </span>
                                                    <select class="form-control select2" name="id_cabang" id="id_cabang">
                                                    <option value="">Select...</option>
                                                    <?php
                                                        $query=" select * from unit order by  nama_unit asc ";
                                                        $result=pg_query($connection,$query);
                                                        while ($row=pg_fetch_array($result)) {
                                                            if(getIdCabang()==$row['id_unit']){
                                                            echo "<option value='$row[id_unit]' selected='selected' > $row[id_unit] | ".strtoupper($row['nama_unit'])."</option>";
                                                            } else {
                                                            echo "<option value='$row[id_unit]'> $row[id_unit] | ".strtoupper($row['nama_unit'])."</option>";
                                                            }
                                                        }

                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Jenis Tujuan Transaksi
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cogs"></i>
                                                        </span>
                                                    <select class="form-control select2" name="id_trans" id="id_trans">
                                                       
                                                        <?php
                                                        $query=" select * from tujuan_transaksi order by  nama_tj_transaksi asc ";
                                                        $result=pg_query($connection,$query);
                                                        while ($row=pg_fetch_array($result)) {

                                                            echo "<option value='$row[id_trans]'>$row[nama_tj_transaksi]</option>";
                                                            
                                                        }

                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Jenis Dok. Underlying
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-book"></i>
                                                        </span>
                                                    <select class="form-control select2" name="id_jenis" id="id_jenis">
                                                      <?php
                                                      $query_m2  ="  select distinct b.id_jenis,b.nama_js_underlying from mapp_tujuan_trans a  ";
                $query_m2 .=" left join jenis_underlying b on a.id_jenis=b.id_jenis  order by  b.nama_js_underlying asc  ";
                
                $r_m2=pg_query($connection,$query_m2);
                while ($row_m2=pg_fetch_array($r_m2)){
                
                    

                        echo "<option value='$row_m2[id_jenis]' >$row_m2[nama_js_underlying] </option> ";   
                       
                }
                                                      ?>  
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">List Dok. Underlying
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4 md-checkbox-list" id="list_list_dok" >
                                                    
                                                    <span class="help-block"> ( <i>Pilih Jenis Dok. Underlying dahulu...</i>) </span>
                                                    <div id="form_2_services_error"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Upload Dokumen </label>
                                                <div class="col-md-6">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input input-fixed input-large" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                <span class="fileinput-filename" id="myfile"> </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>

                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="file_attach" id="file_attach"> </span>
                                                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tanggal Terbit </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <input type="text" class="form-control" readonly name="datepicker" id="tgl_terbit1">
                                                        <input type="hidden" class="form-control" name="tgl_terbit" id="tgl_terbit2">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nominal Dokumen Underlying
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                    <input type="text" name="nominal_dok_underlying" id="nominal_dok_underlying" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama yang mengeluarkan Underlying
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    <input type="text" name="nama_out" id="nama_out" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama yang tertera di Underlying
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    <input type="text" name="nama_tertera" id="nama_tertera" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Keterangan 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="keterangan" id="keterangan" data-error-container="#editor1_error" required></textarea>
                                                    <div id="editor1_error"> </div>
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
                                    </div> 

                                               
                                                
                                            </div>
                                            <!-- /.modal-content -->
                                            
                                            <!-- END FORM-->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    </div>
                                    <!-- #########################  /end modal edit trans ############################# -->




















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
                    keterangan: {
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

    // FORM EDIT

    // basic validation
    var handleValidation2 = function() {
            var form1 = $('#form_sample_edit');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                rules: {
                     nama_pengirim1: {
                         required: true
                     },
                    nama_penerima: {
                        required: true
                    },
                    nominal_trans: {
                        required: true,
                        number: true
                    },
                    nilai_kurs: {
                        required: true,
                        number: true
                    },
                    nilai_ekivalen: {
                        required: true,
                        number: true
                    },
                    id_cabang: {
                        required: true
                    },
                    id_trans: {
                        required: true
                    },
                    id_jenis: {
                        required: true
                    },
                    tgl_terbit: {
                        required: true
                    },
                    nominal_dok_underlying: {
                        required: true
                    },
                    nama_out: {
                        required: true
                    },
                    keterangan: {
                        required: true
                    },
                    nama_tertera: {
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
            handleValidation2();   
        }

    };

}();

</script>

<script type="text/javascript">
$(document).ready(function() {
  

$("#nominal_trans").keyup(function() 
{ 
var nominal = document.getElementById("nominal_trans").value;

var a=13000;
var jml_ekivalen=nominal*a;
document.getElementById('nilai_ekivalen').value=jml_ekivalen;



});





     $('#id_trans').change(function() {
        
        //var e = document.getElementById("id_trans");
        //var id_trans = e.options[e.selectedIndex].value;
        var id_trans=$(this).val();
        var dataString = 'id='+id_trans;
        
        //alert(dataString);
     
        //$('#my_multi_select1').multiSelect({ selectableOptgroup: true });
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_jenis_transaksi.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#id_jenis").html(html);
        } 
            }); 


        });


     $('#id_jenis').change(function() {
        
        var e = document.getElementById("id_trans");
        var id_trans = e.options[e.selectedIndex].value;
        var id_jenis =$(this).val();
        var dataString = 'id='+id_jenis+'&id2='+id_trans;
        
        //alert(dataString);
     
        //$('#my_multi_select1').multiSelect({ selectableOptgroup: true });
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_list_transaksi.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#list_list_dok").html(html);
        } 
            }); 


        });












   $('.detailRecheck').click(function() {
        var idtrans = $(this).attr('id-idtrans');

        var dataString = 'id='+idtrans;

        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_detail_transaksi.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#form_sample_1").html(html);
        } 
            }); 


    });


       // EDIT
      
$('.detailEdit').click(function() {


        var idtransaksi = $(this).attr('id-idtrans');
        document.getElementById('no_trans').value=idtransaksi;
        document.getElementById('no_trans_edit').value=idtransaksi;
        var pengirim = $(this).attr('id-pengirim');
        document.getElementById('nama_pengirim1').value=pengirim;
        var cifNumber = $(this).attr('id-cifno');
        document.getElementById('no_cifx').value=cifNumber;
        
        //alert(pengirim);
        var penerima = $(this).attr('id-penerima');
        document.getElementById('nama_penerima').value=penerima;
        var nominalTrans = $(this).attr('id-nominalTrans');
        document.getElementById('nominal_trans').value=nominalTrans;
        var nilaiKurs = $(this).attr('id-nilaiKurs');
        document.getElementById('nilai_kurs').value=nilaiKurs;
        var nilaiEkivalen = $(this).attr('id-nilaiEkivalen');
        document.getElementById('nilai_ekivalen').value=nilaiEkivalen;
        var cabang = $(this).attr('id-cabang');
        //document.getElementById('id_cabang').value=cabang;
        var idTrans = $(this).attr('id-idJnsTrans');
        //document.getElementById('id_trans').value=idTrans;
        var idJenis = $(this).attr('id-idJenis');
       // document.getElementById('id_jenis').value=idJenis;
       
        var tglTerbit = $(this).attr('id-tglTerbit');
        document.getElementById('tgl_terbit2').value=tglTerbit;
        document.getElementById('tgl_terbit1').value=tglTerbit;
       
        var nominalDokumen = $(this).attr('id-nominalDokumen');
        document.getElementById('nominal_dok_underlying').value=nominalDokumen;
        var namaOut = $(this).attr('id-namaOut');
        document.getElementById('nama_out').value=namaOut;
        var keterangan = $(this).attr('id-keterangan');
        document.getElementById('keterangan').value=keterangan;
         
        var namaTertera = $(this).attr('id-namaTertera');
        document.getElementById('nama_tertera').value=namaTertera;

        var fileAttach = $(this).attr('id-attachFile');
        $("#myfile").empty();
        $("#myfile").append(fileAttach);
        
                    
        //var fileName = $(this).attr('id-attachFile');
        //document.getElementById('file_attach').value=fileName;
        
        //alert(fileName);
        
        var dataString = 'id='+cabang;
        var dataString2 = 'id='+idTrans;
        var dataString3 = 'id='+idTrans+'&id2='+idJenis;
        //var dataString4 = 'id='+idTrans+'&id2='+idJenis;
        var dataString4 = 'id='+idJenis+'&id2='+idTrans+'&id3='+idtransaksi;
        // CABANG 
        //alert(dataString3);
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_edit_id_unit.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#id_cabang").html(html);
        } 
            }); 

        // TUJUAN TRANSAKSI
      
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_list_tujuan_trans.php",
        data: dataString2,
        cache: false,
        success: function(html)
        {
            $("#id_trans").html(html);
        } 
            }); 


        // JENIS TRANSAKSI
      
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_tujuan_trans.php",
        data: dataString3,
        cache: false,
        success: function(html)
        {
            $("#id_jenis").html(html);
        } 
            }); 

        // LIST DOKUMEN 
        
        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_list_transaksi_edit.php",
        data: dataString4,
        cache: false,
        success: function(html)
        {
            $("#list_list_dok").empty();
            $("#list_list_dok").html(html);
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


 