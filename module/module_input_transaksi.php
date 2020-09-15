<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

?>


                                        <!-- ##################   modal insert ###################################-->



                        <div class="modal fade bs-modal-lg" id="large"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Transaction History </span>
                                                    <span class="caption-helper">Last Transaction History ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form" id="last_penerima">
                                    
                                                
                                    </div>
                                    </div> 

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn red " data-dismiss="modal">Close </button>
                                                    <!-- <button type="submit" class="btn green">Submit </button> -->
                                                    
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- #########################  /end modal insert ############################# -->

<?php 
if (isset($_GET['message']) && isset($_GET['idtrans']) && isset($_GET['id_dokumen']) && ($_GET['message']=="sameDok")){
?>


 <div class="modal show" id="large"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">Confirm Transaction History </span>
                                                    <span class="caption-helper">Last Transaction History ...</span>
                                                </div>
                                                
                                            </div>

                                    <div class="portlet-body form" >
                                    <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=UpSttrans"; ?>"  class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <?php 
                                     echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Nomor Document : <b>".$_GET['nomorDok']."</b> Sudah Pernah Digunakan ....!  </div>";
                                     ?>
                                    <table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">

                                        <thead>
                                            <tr>
                                                <th> No. Transaksi / CIF </th>
                                                <th> Nama Pengirim / Nominal Transaksi / Nama Penerima </th>
                                                <th> Tujuan Transaksi / Jenis transaksi / Tanggal Terbit </th>
                                                <th> Penginput /  Nominal Dokumen /  Keterangan </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                          
<?php
                                $query = " select * from transaksi_outgoing  a ";
                                $query.= " left join tujuan_transaksi b on b.id_trans=a.id_trans   ";
                                $query.= " left join jenis_underlying c on c.id_jenis=a.id_jenis WHERE a.idtrans_out='$_GET[idtrans]' and a.status <> '99'  ";
                                $query.= " order by a.idtrans_out asc ";

                                //echo $query;
                                //die();
                                $result=pg_query($connection,$query);
                                $i=1;
                                while ($row=pg_fetch_array($result)) {
                                   
                                    echo "<tr>";
                                    echo "<td width='5%' style='font-size:12px'> <b>$row[idtrans_out] <br>CIF : $row[cif_number] </b></td>";
                                    echo "<td width='20%' style='font-size:12px'> $row[nama_pengirim] <br>".$row['nominal_trans']." <br> $row[nama_penerima]</td>";
                                    echo "<td width='30%' style='font-size:12px'> $row[nama_tj_transaksi] <br> $row[nama_js_underlying] <br>".date('d-m-Y',strtotime($row['tgl_terbit']))." </td>";
                                    echo "<td width='45%' style='font-size:12px'> $row[id_user] <br>".$row['nominal_dokumen']." <br> $row[keterangan] </td>";
                                    
                                    echo "</tr>";
                                    $i++;

                                    //$nom_ekivalen_sblmny=$row['nilai_ekivalen'];
                                    # code...
                                }

                                $nil_nominal_dok=getNominalDok($_GET['idtrans2']);
                                $new_nomdok=$nil_nominal_dok+($nil_nominal_dok*0.025);
                                $nom_trans=getNominalTrans($_GET['idtrans2'])+getNominalTrans($_GET['idtrans']);
                                ?> 
                                            
                                    </tbody>
                                        </table> 
                                                
                                    </div>
                                    </div> 

                                                </div>
                                                <!-- INPUT TYPE UpSttrans -->
                                                <div class="row">
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label class="control-label col-md-2 bold">Nominal Transaksi 
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-2">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                    <input type="text" name="nomtrans"  value="<?php echo $nom_trans;?>" class="form-control" disabled="disabled" /> </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label class="control-label col-md-2 bold">Nominal Dokumen 
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-2">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                    <input type="text" name="nomdok" value="<?php echo $nil_nominal_dok;?>" class="form-control" disabled="disabled" /> </div>
                                                    </div>

                                                    <label class="control-label col-md-1 bold center">Toleransi 
                                                    <span class="required">  </span> 
                                                    </label>   
                                                    <div class="col-md-2">

                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                    <input type="text" name="nomdok"  data-required="1" value="<?php echo $new_nomdok;?>" class="form-control" disabled="disabled" /> </div>
                                                    </div>
                                                </div>     
                                                </div>
                                                </div>
                                                <br>
                                                <input type="hidden" name="idtrans_out_for_edit" value="<?php echo $_GET['idtrans2'];?>">
                                                <div class="modal-footer">
                                                     <a href="<?php echo $page;?>" class="btn red" >Cancel   </a>

                                                     <?php
                                                     if($nom_trans <= $new_nomdok ){

                                                     ?>
                                                     <button type="submit" class="btn green">Continue and Confirm  </button> 
                                                    <?php
                                                }
                                                    ?>
                                                </div>
                                            </div>
                                            </form>
                                            <!-- /.modal-content -->
                                            
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- #########################  /end modal insert ############################# -->

<?php
}
?>


<div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-equalizer font-green-haze"></i>
                                                    <span class="caption-subject font-green-haze bold uppercase">FORM Transaction </span>
                                                    <span class="caption-helper"> Detail Form Transaction ...</span>
                                                </div>

                                            </div>

                                                    
                                        <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="<?php echo "module/action/actions_master?module=$module&pm=$pm&act=add_trans"; ?>" id="form_sample_1" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                        <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
    echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Successful Transaction Added ....! </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="failed")){
    echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Failed Transaction Added ....!  </div>";
}
/*
    if (isset($_GET['message']) && ($_GET['message']=="sameDok")){
    echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Document : <b>".$_GET['nomorDok']."</b> Sudah Pernah Digunakan ....!  </div>";




    }
*/
    ?>
    



                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>


                                                <div class="form-group">
                                                <label class="control-label col-md-3">Pilih Identitas
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cogs"></i>
                                                        </span>
                                                    <select class="form-control select2" name="identitas" id="identitas">
                                                        <option value="" > Select ...  </option>
                                                       <!--  <option value="NPWP" > NPWP </option> -->
                                                        <?php

                                                    $query=" SELECT distinct CFSSCD FROM CURRENT_CFMAST ";
                                                    $result=odbc_exec($odbc_conn,$query);
                                                    while ($row=odbc_fetch_array($result)) {

                                                        echo "<option value='$row[CFSSCD]' > $row[CFSSCD] </option>";
                                                        
                                                    }
                                                        ?>


                                                    </select>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">No Identitas (Sesuai Pilihan)
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cogs"></i>
                                                        </span>
                                                    <input type="text" name="no_identitas" id="no_identitas" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tanggal Lahir 
                                                <span class="required"> * </span></label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" >
                                                        <!-- <input type="text" class="form-control" readonly name="datepicker" > -->
                                                        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" data-required="1" placeholder="dd-mm-yyyy">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama Ibu kandung (optional)
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cogs"></i>
                                                        </span>
                                                    <input type="text" name="ibu_kandung" id="ibu_kandung" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div>

                                            <div class="form-group" id="pengirim1" >
                                                <label class="control-label col-md-3">
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-4" id="sender_name" >
                                                
                                                    <a href="#" class="btn green" id="CekIdentitas" ><i class="fa fa-check-square-o"></i> Check ... </button> </a>
                                                
                                                    </div>
                                            </div>

                                            <div id="ouput_cif">

                                            
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
                                                <label class="control-label col-md-3">Mata Uang 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-book"></i>
                                                        </span>
                                                    <select class="form-control select2" name="mata_uang" id="mata_uang">
                                                    <option value="">Select...</option>
                                                    <?php
                                                        $query=" select * from nilai_kurs ";
                                                        $result=pg_query($connection,$query);
                                                        while ($row=pg_fetch_array($result)) {
                                                            
                                                            echo "<option value='$row[id]'> $row[inisial] | ".strtoupper($row['nama_kurs'])."</option>";
                                                            
                                                        }

                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nilai Kurs
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group" id="nkurs">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-money"></i>
                                                        </span>
                                                    <input type="text" name="nilai_kursx" id="nilai_kursx" data-required="1" class="form-control" disabled/> 
                                                    <input type="hidden" name="nilai_kurs" id="nilai_kurs" data-required="1" class="form-control" /></div>
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
                                                <label class="control-label col-md-3">Tujuan Transaksi
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-cogs"></i>
                                                        </span>
                                                    <select class="form-control select2" name="id_trans" id="id_trans">
                                                        <option value="">Select...</option>
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
                                                <label class="control-label col-md-3">Jenis Tujuan Transaksi
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-book"></i>
                                                        </span>
                                                    <select class="form-control select2" name="id_jenis" id="id_jenis">
                                                        
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- <div  class="form-group" id="list_list_dok">

                                            </div> -->
                                             <div class="form-group">
                                                <label class="control-label col-md-3">List Dok. Underlying
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4 md-checkbox-list"  id="list_list_dok" >
<?php
/*
                                                echo    "<div class='md-checkbox'>
                                    <input type='checkbox' id='checkbox1' class='md-check'  value='$row_m2[id_list]' name='id_list[]'>
                                        <label for='checkbox1'>
                                            <span></span>
                                            <span class='check'></span>
                                            <span class='box'></span> <i class='fa fa-book'> </i> <i> Sample Dokumen </i>  
                                        </label>
                                    <input type='text' name='number_dokx' id='number_dokx' class='form-control input-medium ' placeholder='Nomor Dokumen'  />    
                                </div>";

 */                               
                                ?>

                                                 <div class="md-checkbox" >
                                                <span class="help-block"> ( <i>Pilih Jenis Dok. Underlying dahulu...</i>) </span>
                                                    <div id="form_2_services_error"> </div>
                                                </div>    
                                                    
                                                </div>



                                            </div> 
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Upload Dokumen </label>
                                                <div class="col-md-6">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input input-fixed input-large" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                <span class="fileinput-filename"> </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="file_attach"> </span>
                                                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label class="control-label col-md-3">Nomor Dok. Underlying
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-sort-numeric-asc"></i>
                                                        </span>
                                                    <input type="text" name="no_dok" id="no_dok" data-required="1" class="form-control" /> </div>
                                                    </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tanggal Terbit </label>
                                                <div class="col-md-4">
                                                    <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                        <!-- <input type="text" class="form-control" readonly name="datepicker"> -->
                                                        <input type="text" class="form-control" name="tgl_terbit" placeholder="dd-mm-yyyy">
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
                                                    <textarea class="wysihtml5 form-control" rows="6" name="keterangan" data-error-container="#editor1_error" required></textarea>
                                                    <div id="editor1_error"> </div>
                                                </div>
                                            </div>


                                            
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">

                                                    <button type="submit" class="btn green" id="buttonsubmit">Submit</button>
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




                    <!-- ##################   modal Konfirm Check ###################################-->

                        <div class="modal fade bs-modal-lg" id="checkModal"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-fire font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Confirm Checking Data  </span>
                                                    <span class="caption-helper">Checking data from server ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                
                                        <div class="form-body">
                                            <div class="alert alert-danger">
                                            <p id="cekConfirmData"> </p></div>


                                        </div>
     
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
                                    <!-- #########################  /end Konfirm Check ############################# -->




                        <!-- ##################   modal nominal transaksi terlalu besar  ###################################-->

                        <div class="modal fade bs-modal-lg" id="checkNominalTrans"  role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                                
                                    <div class="modal-body"> 

                                    <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-fire font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold uppercase">Confirm Checking Data  </span>
                                                    <span class="caption-helper">Checking data from server ...</span>
                                                </div>
                                                
                                            </div>
                                    <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                
                                        <div class="form-body">
                                            <div class="alert alert-danger">
                                            <p id="reason"> Nominal Transaksi Terlalu Besar ........ !</p></div>


                                        </div>
     
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
                                    <!-- #########################  /end Konfirm Check ############################# -->





<!--   VALIDATION FORM -->
<script type="text/javascript">




var FormValidation = function () {

//alert('ok...');
    var handleValidation1 = function() {
            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);


            //var maximal ;

//nominal_trans
$("#nominal_trans").keyup(function(event) { 

                var z = document.getElementById("nominal_dok_underlying").value;
                var y = document.getElementById("nominal_trans").value;

                event.preventDefault();
                

                    if ( z==''){
                        z=0;
                        nom_dok_toleransi=0;
                    } else {

                            x=0.025;
                            var nom_dok_toleransi=parseFloat(z)+x*(z);
                           
                                if ( y <= nom_dok_toleransi) {
                                document.getElementById("buttonsubmit").disabled = false;
                               
                                } else {
                                     document.getElementById("buttonsubmit").disabled = true; 
                                    
                                    }
                        
                        }

                      

 });


//nominal_dok_underlying

$("#nominal_dok_underlying").keyup(function(event) { 

                var z = document.getElementById("nominal_dok_underlying").value;
                var y = document.getElementById("nominal_trans").value;

                event.preventDefault();
                

                    if ( z==''){
                        z=0;
                        nom_dok_toleransi=0;
                    } else {

                            x=0.025;
                            var nom_dok_toleransi=parseFloat(z)+x*(z);
                           
                                if ( y <= nom_dok_toleransi) {
                                document.getElementById("buttonsubmit").disabled = false;
                               
                                } else {
                                     document.getElementById("buttonsubmit").disabled = true; 
                                    
                                    }
                        
                        }

                      

 });








            $("#nama_tertera").keyup(function(event) { 

                var z = document.getElementById("nominal_dok_underlying").value;
                var y = document.getElementById("nominal_trans").value;

                event.preventDefault();
                

                    if ( z==''){
                        z=0;
                        nom_dok_toleransi=0;
                    } else {

                            x=0.025;
                            var nom_dok_toleransi=parseFloat(z)+x*(z);
                            //maximal==parseFloat(z)+x*(z);
                    
                                if ( y <= nom_dok_toleransi) {
                                document.getElementById("buttonsubmit").disabled = false;
                                $('#checkNominalTrans').modal('hide');
                                } else {
                                     document.getElementById("buttonsubmit").disabled = true; 
                                     $('#checkNominalTrans').modal('show');
                                     $("#reason").empty();
                                     $("#reason").append( '<b> Nominal Transaksi Tidak Boleh Melebihi '+ nom_dok_toleransi +'</b>');
                                     //alert('Nominal Transaksi Terlalu Melebihi Batas '+nom_dok_toleransi);
                                    }
                        
                        }

                //your_function(nom_dok_toleransi);       

 });
           
               
                 $("#nama_out").keyup(function(event) { 

                var z = document.getElementById("nominal_dok_underlying").value;
                var y = document.getElementById("nominal_trans").value;

                event.preventDefault();
                

                    if ( y==''){
                        y=0;
                        nom_dok_toleransi=0;
                    } else {

                            x=0.025;
                            var nom_dok_toleransi=parseFloat(z)+x*(z);
                            
                    
                                if ( y <= nom_dok_toleransi) {
                                document.getElementById("buttonsubmit").disabled = false;
                                $('#checkNominalTrans').modal('hide');
                                } else {
                                     document.getElementById("buttonsubmit").disabled = true; 
                                     $('#checkNominalTrans').modal('show');
                                     $("#reason").empty();
                                     $("#reason").append( ' Nominal Transaksi Tidak Boleh Melebihi <b> '+ nom_dok_toleransi +'</b>');
                                     
                                    }
                        
                        }

                //your_function(nom_dok_toleransi);       

 });

//alert(maximal);


            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                
                rules: {
                    // nama_pengirim1: {
                    //     required: true
                    // },
                     mata_uang: {
                         required: true
                     },
                    tgl_lahir: {
                         required: true
                     },
                    identitas: {
                         required: true
                     },
                    no_identitas: {
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
                        number: true,
                        min:100001
                        
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
                    //no_dok: {
                    //    required: true
                    //},
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
                    },
                    test: {
                        required: true
                    }
                    
                    

                },

                 messages: { // custom messages for radio buttons and checkboxes
                    
                     nominal_trans: {
                         required: "Nominal transaksi Wajib diisi...",
                         number: "Harus Berupa Angka...",
                         max:"Melebihi Nilai Dokumen..."
                         //minlength: jQuery.validator.format("Please select  at least {0} types of Service")
                     },
                     nilai_ekivalen: {
                         required: "Nominal transaksi Wajib diisi...",
                         number: "Harus Berupa Angka...",
                         min:"Nominal ekivalen Harus diatas  100000 USD",
                         //minlength: jQuery.validator.format("Please select  at least {0} types of Service")
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
<script type="text/javascript" id="list_list_dok">
                         //checkbox
document.getElementById('checkbox1').innerHTML.onclick = function() {
            if ( this.checked ) {
                     document.getElementById("number_dok_1").disabled = false;
            } else {
                     document.getElementById("number_dok_1").disabled = true;
                }
        }
</script>

<script type="text/javascript">

$(document).ready(function() {



//CekIdentitas

$("#CekIdentitas").click(function() 
{ 
//alert('ok');


    var e = document.getElementById("identitas");
    var identitas = e.options[e.selectedIndex].value;
    var no_identitas = document.getElementById("no_identitas").value;
    var tgl_lahir = document.getElementById("tgl_lahir").value;
    var ibu_kandung = document.getElementById("ibu_kandung").value;

    if (identitas == '' || no_identitas=='' || tgl_lahir==''){

        $('#checkModal').modal('show');
        $("#cekConfirmData").empty();
        $("#cekConfirmData").append( 'Field (<i> Identitas </i>) atau (<i> Nomor Identiatas </i>) atau (<i> Tanggal lahir </i>) <i> <b> Kosong ...! <b> <i>');
        
      
    } else {
            // CEK KE SERVER STAGING ....
            var dataString = 'identitas='+identitas+'&no_identitas='+no_identitas+'&tgl_lahir='+tgl_lahir+'&ibu_kandung='+ibu_kandung;
            $.ajax({
                type: "POST",
                url: "module/ajax/ajax_cek_cifnumber.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#ouput_cif").html(html);
                    

                } 
            }); 
            // CEK KE TABEL TRANSASKI OUTGOING  ....

            //alert(cifNumber);
                $.ajax({
                    type: "POST",
                    url: "module/ajax/ajax_cek_cifnumber_trans.php",
                    data: dataString,
                    cache: false,
                    success: function(html){
                         $("#last_penerima").html(html);
                         //$('#large').modal('show');
                        } 
                }); 






        }

});

// $(document).on("click", ".last_transaction a", function() {
//     alert("ok");
// });





         
$("#nominal_trans").keyup(function() 
{ 
var nominal = document.getElementById("nominal_trans").value;

var a=document.getElementById('nilai_kurs').value;
//alert(a);
var kurs_usd=<?php echo kursUSD();?>;
var jml_ekivalen=(nominal*a)/kurs_usd;

//jml_ekivalen=numb.toFixed(2);
//document.getElementById('nilai_ekivalen').value=jml_ekivalen;
document.getElementById('nilai_ekivalen').value=parseFloat(jml_ekivalen).toFixed(2);
//(Nominal Transaksi x Nilai Kurs) / Kurs USD

});

 $('#mata_uang').change(function() {
        
     
        var id=$(this).val();

        var dataString = 'id='+id;
             $.ajax({
         type: "POST",
         url: "module/ajax/ajax_nilai_kurs.php",
         data: dataString,
         cache: false,
         success: function(html)
         {
            $("#nkurs").html(html);
         } 
             }); 

        
 }); 








 $('#cek').change(function() {
        
     
        var id_cek =$(this).val();
        var dataString = 'id='+id_cek;

        if (id_cek=='1'){
            $("#pengirim2").show();
            $("#pengirim1").hide();

            $.ajax({
        type: "POST",
        url: "module/ajax/ajax_sender2.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#nama_pengirim2").html(html);
        } 
            }); 

        


        } if (id_cek=='2'){

            $("#pengirim1").show();
            $("#pengirim2").hide();
        }

//$("#myModal").modal() 
        
 });         
$('#nama_pengirim2').change(function() {

    var id_cif =$(this).val();
    var dataString = 'id='+id_cif;
     $.ajax({
        type: "POST",
        url: "module/ajax/ajax_last_penerima.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#last_penerima").html(html);
        } 
            }); 


     $('#large').modal('show');   

 }); 



     $('#id_trans').change(function() {

        var id_trans=$(this).val();
        var dataString = 'id='+id_trans;

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

        $.ajax({
        type: "POST",
        url: "module/ajax/ajax_list_transaksi2.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $("#list_list_dok").html(html);
        } 





            }); 


        });





}); // document ready   $(document).ready(function() {

</script>


 