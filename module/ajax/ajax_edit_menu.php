<?php
require_once '../../config/config.php';
//include('db.php');
if(isset($_POST['id']))
{
$id=$_POST['id']; //id_product

//########################## id_menu dan parent ############################
$query  =" select * from menu where parent='0' order by nama_menu asc ";
$result=pg_query($connection,$query);
if($id=='0') {
			echo "<option value='0' selected='selected'> No Parent (as Parent)</option>";
		} else {
			echo "<option value='0' > No Parent (as Parent)</option>";
		}


	while ($row=pg_fetch_array($result)) {
		if ($id==$row['id_menu']){
				echo "<option value='$row[id_menu]' selected='selected'> $row[nama_menu]  </option>";
		} //else if($id=='0') {
				//echo "<option value='0' selected='selected'> No Parent (as Parent)</option> </option>";
					//} 
					else {

						echo "<option value='$row[id_menu]' > $row[nama_menu] </option>";  

 			}

	}

}

?>