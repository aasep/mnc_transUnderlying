<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 
if ($id=="2"){
	?>

						<div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="nama_pengirim" id="nama_pengirim" data-required="1" class="form-control" /> 
                        </div>


<?php
}else  {

?>
			
                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-book"></i>
                                                        </span>
                                                    <select class="form-control select2" name="nama_pengirim" id="id_cabang">
                                                        <option value="1001" selected="selected"> 1001 | JOHN DOE </option>
                                                        <option value="1002" > 1001 | STEFANNY  </option>
                                                    </select>
                                                </div>
                                               

<?php
}
}

?>