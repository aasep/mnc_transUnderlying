<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
<ul class="nav navbar-nav">
<li class="classic-menu-dropdown bold"><a href="#"><span aria-hidden="true" class="icon-settings font-blue-soft"></span> <span class="font-blue-soft"> <b> Aplikasi Transaksi Out Going ...  </b> </span></a>
</li>

</ul>
</div>



<div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <?php
                            $varimage=getImage();
                            if(!isset($varimage) && $varimage=="" ) {
                                echo "<img alt='' class='img-circle' src='images/profile/admin.png' >";
                            } else {
                            ?>
                                <img alt="" class="img-circle" src="<?php echo "images/profile/".getImage();?>" />
                            <?php
                        }
                            ?>
                                <span class="username username-hide-on-mobile font-blue"><?php echo "<b>". ucwords(strtolower(getNamaLengkap()))."</span>  <span class='username username-hide-on-mobile font-default'> [ ".ucwords(strtolower(getGroupUserName()))." ] </span>   "."</b>";?>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="home">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                
                                <li>
                                    <a href="logout">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>