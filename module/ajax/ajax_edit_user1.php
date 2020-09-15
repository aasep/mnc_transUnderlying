<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id']; 

//########################## group user ############################

$query  =" select id_group,nama_group from group_user order by nama_group asc ";
$result=pg_query($connection,$query);
	while ($row=pg_fetch_array($result)) {
		if ($id==$row['id_group']){
				echo "<option value='$row[id_group]' selected='selected'> $row[nama_group] </option>";
		} else {

				echo "<option value='$row[id_group]' > $row[nama_group] </option>";  

 			}

	}

}

?>