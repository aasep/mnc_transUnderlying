<?php
require_once '../../config/config.php';
require_once '../../function/function.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 
                                $query = " select * from transaksi_outgoing  a ";
                                $query.= " left join tujuan_transaksi b on b.id_trans=a.id_trans  ";
                                $query.= " left join jenis_underlying c on c.id_jenis=a.id_jenis  ";
                                $query.= " left join unit d on d.id_unit=a.id_cabang  ";
                                $query.= " left join user_account e on e.nik=a.id_user WHERE a.idtrans_out='$id'  ";

                                $result=pg_query($connection,$query);
                                $row=pg_fetch_array($result);



	?>
<div class="form-body">
                                                        
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-layers font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold ">Detail Transaksi ( <?php echo date('d-m-Y',strtotime($row['date_create'])) ?> ) </span>
                                                    
                                                </div>
                                                <hr>
                                            </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Id Transaksi :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['idtrans_out']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nilai Kurs :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nilai_kurs']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nama Pengirim :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nama_pengirim']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nama Penerima :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nama_penerima']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Kantor Cabang :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static" ><?php echo $row['nama_unit']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Penginput : </label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nama_lengkap']; ?>  </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-layers font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold ">Informasi Transaksi </span>
                                                    
                                                </div>
                                                <hr>
                                            </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nama Transaksi :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nama_tj_transaksi']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Jenis Transaksi :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nama_js_underlying']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nominal Transaksi :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nominal_trans']; ?> </p> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nilai Ekivalen :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nilai_ekivalen']; ?> </p> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        
                                                        
                                                        </div>
                                                        <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-layers font-red-haze"></i>
                                                    <span class="caption-subject font-red-haze bold ">Informasi Dokumen (Info Lainnya) </span>
                                                    
                                                </div>
                                                <hr>
                                            </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">CIF Number :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['cif_number']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Tanggal Terbit :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo date('d-m-Y',strtotime($row['tgl_terbit'])); ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->  
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nominal Dokumen :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nominal_dokumen']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Status Upload File :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static">
                                                                        <?php
                                                                        if (isset($row['file_attach']) && $row['file_attach']!="" ){
                                                                            echo "<span aria-hidden='true' class='icon-check font-green'>  <b> Ada </b> </span>  ";
                                                                        } else {

                                                                            echo "<span aria-hidden='true' class='icon-close font-red'> <b> Tidak Ada </b> </span>   ";
                                                                        }

                                                                        ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nama yang Mengeluarkan :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nama_out']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6 bold">Nama yang Tertera :</label>
                                                                    <div class="col-md-6">
                                                                        <p class="form-control-static"> <?php echo $row['nama_tertera']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">

                                                            <?php
                                                            $z=1;
                                                            $query2=" select * from value_list_underlying a ";
                                                            $query2.=" left join  list_underlying b on b.id_list=a.id_list where a.idtrans_out='$id' order by b.nama_ls_underlying asc ";
                                                            //echo $query2;

                                                            $result2=pg_query($connection,$query2);
                                                            while ($row2=pg_fetch_array($result2)) {
                                                                # code...
                                                            if ($z==1) {
                                                            ?>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 bold">Jenis DOk Underlying :</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <i class="fa fa-file"></i> <i><?php echo $row2['nama_ls_underlying']; ?></i> </p> <p> No: <?php echo $row2['doc_number_ori']; ?></p>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                                
                                                            } else {
                                                                ?>                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"></label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <i class="fa fa-file"></i> <i><?php echo $row2['nama_ls_underlying']; ?> </i></p> <p> No: <?php echo $row2['doc_number_ori']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                
                                                            }
                                                                
                                                                $z++;
                                                            }
                                                                ?>

                                                                </div>
                                                            </div>
                                                          
                                                            <!--/span-->
                                                        </div>
 

<?php
}


?>


</div>
                                    </div> 
                                                 

                                            <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 bold">Keterangan :</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <?php echo $row['keterangan']; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>




                                                </div>



                                                <div class="modal-footer">
                                                    <button type="button" class="btn red " data-dismiss="modal">Close </button>
                                                    
                                                    
                                                </div>