<?php
require_once '../../config/config.php';

if(isset($_POST['id']))
{
$id=$_POST['id']; 

//########################## status account ############################

		if ( $id=='1' ){
			echo "<option value='1' selected='selected'> Aktif </option>"; 
			echo "<option value='0' > Non Aktif </option>";
				
				
		} else {
			    echo "<option value='0' selected='selected'> Non Aktif </option>";
				echo "<option value='1' > Aktif </option>";

 			}

	

}

?>