<?php

##########################################################################
#            -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE -=              #
# -----------------------------------------------------------------------#
# 																		 #
#  																		 #
#  	Developed by:	Asep Arifyan						    			 #
#	License:		Commercial											 #
#  	Copyright: 		2016. All Rights Reserved.		                     #
#                                                                        #
#  	Additional modules (embedded): 										 #
#	-- Metronic (Themes) 												 #
#																		 #
#																		 #
# -----------------------------------------------------------------------#
#	Designed and built with all the love and loyalty.					 #
##########################################################################

// FOR USER


$connection = pg_connect("host=localhost port=5432 dbname=trans_outgoing user=postgres password=Instance12");

if (!$connection) {
	echo "System sedang down atau dalam masa maintenance...!, harap hubungi System Administrator COMMONE.";
	die();
}

$dsn="cif_source2";
$usr="sa";
$pass="Instance12";
$odbc_conn = odbc_connect($dsn, $usr, $pass);
    
    if(!$odbc_conn){
        die('Failed to connect to server: ' . odbc_error());    
}



?>