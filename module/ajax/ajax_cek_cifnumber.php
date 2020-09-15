<?php
require_once '../../config/config.php';
require_once '../../function/function.php';

if($_POST['identitas'])
{
$identitas=$_POST['identitas']; 
//$no_identitas=preg_replace("/[^a-zA-Z0-9_.-\s]/", "", $_POST['no_identitas']);
$no_identitas=$_POST['no_identitas'];
//$no_identitas=preg_replace("/[^a-zA-Z0-9_.-\s]/", "", $no_identitas);

$no_identitas = str_replace(array(':', '\\', '/', '*','.','-','_',' '), '', $no_identitas); 
//echo $no_identitas;
//die();
//$no_identitas=$_POST['no_identitas'];

$tgl_lahir=date('jmy',strtotime($_POST['tgl_lahir'])); 
$tgl_lahir2=date('Y-m-d',strtotime($_POST['tgl_lahir'])); 
$ibu_kandung=$_POST['ibu_kandung']; 


					$query=" SELECT * FROM CURRENT_CFMAST where ".clearSpecialChar()."='$no_identitas' and CFBIR6='$tgl_lahir' and CFSSCD='$identitas' ";
					//echo $query;
					//die();
                    $result=odbc_exec($odbc_conn,$query);
                    $found=odbc_num_rows($result);

                    if ($found>=2){ 
                    $query2 =" SELECT * FROM CURRENT_CFMAST where ".clearSpecialChar()."='$no_identitas' and CFBIR6='$tgl_lahir' and CFSSCD='$identitas' ";
                    $query2.=" and CFMOTN like '%$ibu_kandung%' ";
                    	$result2=odbc_exec($odbc_conn,$query2);
                    	$row2=odbc_fetch_array($result2);
       					$nama_pengirim=$row2['CFSNME'];
      			    	$no_cif=$row2['CFCIF#'];
      			    	?>
<div class="alert alert-success">
<p> <i> Data Berhasil ditemukan ...  <b>Lanjut</b>... Jika anda ingin meneruskan ke proses input transaksi...  </i> 
<a href="#" id-cif="<?php echo $no_cif;?>" class="last_transaction" data-toggle="modal" data-target="#large" ><button class="btn blue"><i class="fa fa-mail-forward"></i> <i>History Transaction</i> <b>CIF</b> [ <?php echo $no_cif;?> ] </button></a>
</p>
<div class="form-group"  >
            <label class="control-label col-md-3">Nama Pengirim
                <span class="required"> * </span>
            </label>
        <div class="col-md-4" id="sender_name1" >
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="nama_pengirimx" id="nama_pengirimx"  value="<?php echo $nama_pengirim;?>" class="form-control" disabled/>
                <input type="hidden" name="nama_pengirim" id="nama_pengirim" data-required="1" value="<?php echo $nama_pengirim;?>"  /> 
            </div>
        </div>
</div>
<div class="form-group"  >
            <label class="control-label col-md-3">CIF Number
                <span class="required"> * </span>
             </label>
        <div class="col-md-4" id="sender_name2" >
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="cifNumberx" id="cifNumberx" data-required="1" value="<?php echo $no_cif;?>" class="form-control" disabled />
                <input type="hidden" name="cifNumber" id="cifNumber" data-required="1" value="<?php echo $no_cif;?>" /> 
            </div>
        </div>
</div>

<?php
      			    } else if ($found =='1') {
      			    	$row=odbc_fetch_array($result);
       					$nama_pengirim=$row['CFSNME'];
      			    	$no_cif=$row['CFCIF#'];
      			    
?>
<div class="alert alert-success">
<p> <i> Data Berhasil ditemukan ...  <b>Lanjut</b>... Jika anda ingin meneruskan ke proses input transaksi...  </i> 
<a href="#" id-cif="<?php echo $no_cif;?>" class="last_transaction" data-toggle="modal" data-target="#large" > <button class="btn blue"><i class="fa fa-mail-forward"></i> <i>History Transaction</i> <b>CIF</b> [ <?php echo $no_cif;?> ]  </button></a>
</p>
</div>
<div class="form-group"  >
            <label class="control-label col-md-3">Nama Pengirim
                <span class="required"> * </span>
            </label>
        <div class="col-md-4" id="sender_name1" >
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="nama_pengirimx" id="nama_pengirimx"  value="<?php echo $nama_pengirim;?>" class="form-control" disabled/>
                <input type="hidden" name="nama_pengirim" id="nama_pengirim" data-required="1" value="<?php echo $nama_pengirim;?>"  /> 
            </div>
        </div>
</div>
<div class="form-group"  >
            <label class="control-label col-md-3">CIF Number
                <span class="required"> * </span>
             </label>
        <div class="col-md-4" id="sender_name2" >
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="cifNumberx" id="cifNumberx" data-required="1" value="<?php echo $no_cif;?>" class="form-control" disabled />
                <input type="hidden" name="cifNumber" id="cifNumber" data-required="1" value="<?php echo $no_cif;?>" /> 
            </div>
        </div>
</div>


<?php
      				} else {

    $query_trans_out =" select * from transaksi_outgoing where identitas='$identitas' and no_identitas='$no_identitas' and to_char(tgl_lahir, 'YYYY-MM-DD')='".$tgl_lahir2."' ";
    $query_trans_out.=" order by date_create desc limit 1 ";

   // echo $query_trans_out;
   /// die();
    $result_trans= pg_query($connection,$query_trans_out);
    $found2=pg_num_rows($result_trans);

    if ($found2 >=1 ) {
        $row_trans=pg_fetch_array($result_trans);
        $nama_pengirim=$row_trans['nama_pengirim'];
        $no_cif=$row_trans['cif_number'];
?>
<div class="alert alert-success">
<p> <i> Data Berhasil ditemukan ...  <b>Lanjut</b>... Jika anda ingin meneruskan ke proses input transaksi...  </i> 
<a href="#" id-cif="<?php echo $no_cif;?>" class="last_transaction" data-toggle="modal" data-target="#large" ><button class="btn blue"><i class="fa fa-mail-forward"></i> <i>History Transaction</i> <b>CIF</b> [ <?php echo $no_cif;?> ]  </button></a>
</p>
</div>
<div class="form-group"  >
            <label class="control-label col-md-3">Nama Pengirim
                <span class="required"> * </span>
            </label>
        <div class="col-md-4" id="sender_name1" >
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="nama_pengirimx" id="nama_pengirimx"  value="<?php echo $nama_pengirim;?>" class="form-control" disabled/>
                <input type="hidden" name="nama_pengirim" id="nama_pengirim" data-required="1" value="<?php echo $nama_pengirim;?>"  /> 
            </div>
        </div>
</div>
<div class="form-group"  >
            <label class="control-label col-md-3">CIF Number
                <span class="required"> * </span>
             </label>
        <div class="col-md-4" id="sender_name2" >
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="cifNumberx" id="cifNumberx" data-required="1" value="<?php echo $no_cif;?>" class="form-control" disabled />
                <input type="hidden" name="cifNumber" id="cifNumber" data-required="1" value="<?php echo $no_cif;?>" /> 
            </div>
        </div>
</div>

<?php
    } else {
?>
<div class="alert alert-danger">
<p> <i> Data Tidak ditemukan ...  <b>Lanjut</b>... Jika anda ingin meneruskan ke proses input transaksi...  </i> </p>
</div>
<div class="form-group"  >
                                                <label class="control-label col-md-3">Nama Pengirim
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" id="sender_name1" >
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                         <input type="text" name="new_nama_pengirim" id="new_nama_pengirim" data-required="1" class="form-control" /> 
                                                </div>
                                                    </div>
                                            </div>
                                            <div class="form-group"  >
                                                <label class="control-label col-md-3">CIF Number
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" id="sender_name2" >
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                         <input type="text" name="new_cifNumber" id="new_cifNumber" data-required="1" value="Auto Create" class="form-control"  disabled /> 
                                                </div>
                                                    </div>
                                            </div>
<?php
    }

?>




<?php
                    } 

?>


<?php

                                                     
}





?>






