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


$connectionx = pg_connect("host=localhost port=5432 dbname=commone user=postgres password=Instance12");

if (!$connectionx) {
	echo "System sedang down atau dalam masa maintenance...!, harap hubungi System Administrator COMMONE.";
	die();
}

?>