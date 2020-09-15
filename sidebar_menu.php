

<li class="nav-item ">
                            <a href="home" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title"><b>Home </b></span>
                                <span class="selected"></span>
                                
                            </a>
                            
                        </li>



<?php


// active parent
if (isset($_GET['pm'])){
$active_parent=$_GET['pm'];
} else {
$active_parent="";	
}
// active sub menu
if (isset($_GET['module'])){
$active_submenu=$_GET['module'];
} else {
$active_submenu="";	
}

$parent_count=0;
$query_parent_menu="select distinct (a.parent)  FROM menu a, group_menu b WHERE a.id_menu=b.id_menu AND b.id_group=$_SESSION[SESS_GROUP_USER]";
//echo $query_parent_menu;
//die();
$result_parent_menu = pg_query($connection,$query_parent_menu);
    while ($row = pg_fetch_array($result_parent_menu))
	   { 
	   //===masang class parent menu 
	   $class_parent="class='nav-item'";
		   if ($parent_count==0)
		   {$class='fa fa-gears';}
		   if ($parent_count==1)
		   {$class='fa fa-fire';}
		   if ($parent_count==2)
		   {$class='fa fa-diamond';}
		   if ($parent_count==3)
		   {$class='fa fa-cube';}
		   if ($parent_count==4)
		   {$class='fa fa-bug';}
		   if ($parent_count==5) 
		   {$class='fa fa-recycle';}
		   if ($parent_count==6) 
		   {$class='fa fa-cog';}
		   
		   $parent_menu=$row['parent'];
		   if ($active_parent==hashEncryptedMenu($parent_menu)) {$class_parent="class='nav-item start active open'"; } 
		   
		   $query_nama_menu="SELECT nama_menu  FROM menu WHERE id_menu='$parent_menu'";
		   $result_nama_menu = pg_query($connection,$query_nama_menu);
		   $r_menu = pg_fetch_array($result_nama_menu);
		 //display parent menu 
		 
		  	   
		 echo "<li $class_parent ><a href='#' class='nav-link nav-toggle'><i class='fa $class'></i><span class='title'> <b>$r_menu[nama_menu] </b></span><span class='arrow '></span></a>";
		   
		// SUBMENU=========

		   $q_submenu="select distinct (a.nama_menu) as name,a.id_menu  FROM menu a, group_menu b WHERE a.id_menu=b.id_menu AND b.id_group=$_SESSION[SESS_GROUP_USER]  AND a.parent='$parent_menu' order by a.nama_menu asc";
		   //echo $q_submenu;
		   //die();
		   $result_submenu = pg_query($connection,$q_submenu);
		   $found_submennu = pg_num_rows($result_submenu);
		   if ($found_submennu >= 1)
		   {
		   echo "<ul class='sub-menu'>";
 while ($r_submenu = pg_fetch_array($result_submenu))
		    {
			$class_submenu="class='nav-item' ";
         if ($active_submenu==hashEncryptedMenu($r_submenu['id_menu'])) {$class_submenu="class='nav-item active open'";} 
		echo "<li $class_submenu ><a href='home?module=".hashEncryptedMenu($r_submenu['id_menu'])."&pm=".hashEncryptedMenu($parent_menu)."' class='nav-link' >$r_submenu[name]</a></li>";

			  //$submenu++;
		    } //end while loop submenu
			echo "</ul></li>"; 
		   } // end submenu found
		   $parent_count++;
		   }



		  
?>


				
				
				<li class="last">
					<a href="logout">
					<i class="fa fa-user"></i>
					<span class="title bold">
					Logout</span>
					</a>
				</li>
                
                
            