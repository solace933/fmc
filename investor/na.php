<?php
        session_start();    
        error_reporting(0);
        $error="";
        $msg="";
        include('includes/config.php');
        if(strlen($_SESSION['alogin'])==0)
            {	
        header('location:index.php');
        }
        else{
            
?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once "public/config/header.php";
        ?>

<body>

    <div id="wrapper">
        <?php
        require_once "public/config/left-sidebar.php";
        ?>
            
            <div id="page-wrapper" class="gray-bg dashbard-1" style="background:rgba(0,0,0,0)">
                <div class="row ">
            
                <?php
                require_once "public/config/topbar.php";
                ?>
                            
                </div>
                <div class="row dashboard-header">
                <div class="panel-heading"><h2 class="page-title">Information</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

                    <h2 class="page-title"></h2>

                  <!-- Zero Configuration Table -->
						<div class="panel panel-default panel-outer" >
							<div class="panel-heading">View</div>
							<div class="panel-body">
								
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-2"><span>
                                        <img src="public/images/decline.png" alt="">
                                    </span></div>
                                    <div class="p-2"><p style="font-size: 3em; color: #FFFFFF;">Not Available. Coming Soon!</p></div>
                                </div>                                     
                            
			
                            </div>
						</div>

                </div>
                   
                <!---
                <div class="col-lg-4">
                        <?php
               // require_once "public/config/right-sidebar.php";
                ?>
					 </div>
		-->
            </div>
                 
                </div>

                
            </div>
            
        </div>
       <style>
		
		   #page-wrapper > div:nth-child(3) > div > div > div.panel-body > div > div > div > a:hover{
			   color:#fff;
		   }
	   </style>
        <?php
                require_once "public/config/footer.php";
                ?>

    </body>
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>