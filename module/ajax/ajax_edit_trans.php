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
    <!--
<div class="row">
                                                <div class="col-md-12">
                                                 <div class="form-group">
                                                <label class="control-label col-md-3">Description 
                                                    <span class="required">  </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="hidden" name="idtrans_out" value="<?php echo $row['idtrans_out']; ?>" >
                                                    <textarea class="wysihtml5 form-control" rows="3" name="keterangan" data-error-container="#editor1_error" required></textarea>
                                                    <div id="editor1_error"> </div>
                                                </div>
                                               </div>
                                                            </div>
                                                           
                                                          
                                                        </div>
                                                        -->

                                                </div>



                                                <div class="modal-footer">
                                                    <button type="button" class="btn red " data-dismiss="modal">Close </button>
                                                    <button type="submit" class="btn green"> <i class="fa fa-close"></i> Reject  </button>
                                                    
                                                </div> 
 

<?php
}


?>


