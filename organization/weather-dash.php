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

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">

                <?php
                require_once "public/config/topbar.php";
                ?>

            </div>
            <div class="row dashboard-header">
                <div class="panel-heading">
                    <h2 class="page-title">Weather</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">

                    <h2 class="page-title"></h2>

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default panel-outer">
                        <div class="panel-heading">View Panel</div>
                        <div class="panel-body">
                            <?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                            </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-primary text-light">
                                            <div class="stat-panel text-center">
                                               <img src="public/images/wt.png" alt="" style="height:120px;width:120px;object-fit:cover;">
                                                <div class="stat-panel-number h1 "></div>
                                                <div class="stat-panel-title text-uppercase">Weather Forecast</div>
                                            </div>
                                        </div>
                                        <a href="weather.php" class="block-anchor panel-footer text-center">Full
                                            Detail <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-success text-light">
                                            <div class="stat-panel text-center">
                                                    <?xml version="1.0" encoding="iso-8859-1"?>
                                                    <!-- Generator: Adobe Illustrator 17.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 455 455" style="enable-background:new 0 0 455 455;" xml:space="preserve">
                                                    <g>
                                                        <path d="M388.367,66.633C345.397,23.664,288.268,0,227.5,0S109.603,23.664,66.633,66.633C23.664,109.602,0,166.732,0,227.5
                                                            s23.664,117.897,66.633,160.867C109.603,431.336,166.732,455,227.5,455s117.897-23.664,160.867-66.633
                                                            C431.336,345.397,455,288.268,455,227.5S431.336,109.602,388.367,66.633z M227.5,440C110.327,440,15,344.673,15,227.5
                                                            S110.327,15,227.5,15S440,110.327,440,227.5S344.673,440,227.5,440z"/>
                                                        <path d="M408.47,287.517c-18.08-8.265-40.271-15.036-65.283-20.114C344.382,254.329,345,240.979,345,227.5
                                                            s-0.618-26.829-1.813-39.904c25.012-5.077,47.203-11.849,65.283-20.114c3.767-1.722,5.425-6.172,3.703-9.939
                                                            c-1.723-3.767-6.17-5.425-9.939-3.703c-16.541,7.561-37.264,13.873-60.703,18.693c-3.177-24.893-8.47-48.544-15.617-69.895
                                                            c9.22-4.434,18.175-9.499,26.797-15.195c3.456-2.283,4.407-6.936,2.124-10.392s-6.937-4.407-10.392-2.124
                                                            c-7.634,5.043-15.545,9.563-23.684,13.548c-6.54-16.612-14.271-31.532-23.066-44.147c-2.368-3.397-7.043-4.233-10.441-1.864
                                                            c-3.397,2.369-4.232,7.043-1.863,10.441c8.268,11.861,15.541,25.944,21.696,41.67c-22.829,9.232-47.17,14.423-72.084,15.291V37.5
                                                            c0-4.142-3.357-7.5-7.5-7.5s-7.5,3.358-7.5,7.5v72.367c-24.914-0.868-49.255-6.059-72.084-15.291
                                                            c6.155-15.726,13.428-29.808,21.696-41.67c2.369-3.398,1.534-8.073-1.863-10.441c-3.399-2.369-8.073-1.534-10.441,1.864
                                                            c-8.794,12.615-16.526,27.534-23.066,44.147c-8.139-3.984-16.05-8.504-23.684-13.548c-3.455-2.283-8.108-1.332-10.392,2.124
                                                            c-2.283,3.456-1.332,8.109,2.124,10.392c8.622,5.696,17.577,10.762,26.797,15.195c-7.147,21.352-12.44,45.002-15.617,69.895
                                                            c-23.439-4.82-44.162-11.132-60.703-18.693c-3.767-1.722-8.218-0.064-9.939,3.703s-0.063,8.217,3.703,9.939
                                                            c18.08,8.265,40.271,15.036,65.283,20.114C110.618,200.671,110,214.021,110,227.5s0.618,26.829,1.813,39.904
                                                            c-25.012,5.077-47.203,11.849-65.283,20.114c-3.767,1.722-5.425,6.172-3.703,9.939c1.723,3.767,6.172,5.426,9.939,3.703
                                                            c16.541-7.561,37.264-13.873,60.703-18.693c3.177,24.893,8.47,48.544,15.617,69.895c-9.22,4.434-18.174,9.499-26.797,15.195
                                                            c-3.456,2.283-4.407,6.936-2.124,10.392c2.282,3.456,6.936,4.407,10.392,2.124c7.634-5.043,15.545-9.563,23.684-13.548
                                                            c6.54,16.613,14.271,31.532,23.066,44.147c1.458,2.091,3.789,3.211,6.159,3.211c1.479,0,2.976-0.437,4.282-1.348
                                                            c3.397-2.369,4.232-7.043,1.863-10.442c-8.268-11.862-15.541-25.944-21.696-41.67c22.829-9.232,47.17-14.423,72.084-15.291V417.5
                                                            c0,4.142,3.357,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-72.367c24.914,0.868,49.255,6.059,72.084,15.291
                                                            c-6.155,15.726-13.428,29.808-21.696,41.67c-2.369,3.398-1.534,8.073,1.863,10.442c1.307,0.911,2.802,1.348,4.282,1.348
                                                            c2.37,0,4.701-1.12,6.159-3.211c8.794-12.615,16.526-27.535,23.066-44.147c8.139,3.984,16.05,8.504,23.684,13.548
                                                            c1.272,0.841,2.708,1.243,4.127,1.243c2.435,0,4.822-1.184,6.265-3.367c2.283-3.456,1.332-8.109-2.124-10.392
                                                            c-8.623-5.696-17.577-10.761-26.797-15.195c7.147-21.352,12.44-45.002,15.617-69.895c23.439,4.82,44.162,11.132,60.703,18.693
                                                            c1.011,0.462,2.07,0.681,3.113,0.681c2.845,0,5.566-1.627,6.826-4.384C413.895,293.689,412.236,289.239,408.47,287.517z M330,227.5
                                                            c0,12.557-0.556,24.979-1.62,37.147c-28.573-4.837-60.255-7.576-93.38-7.936V198.29c33.125-0.36,64.807-3.1,93.38-7.936
                                                            C329.444,202.521,330,214.943,330,227.5z M312.169,108.701c6.696,20.307,11.653,42.838,14.616,66.603
                                                            c-28.137,4.822-59.465,7.607-91.785,7.981v-58.414C261.662,124.004,287.719,118.516,312.169,108.701z M142.831,108.701
                                                            c24.45,9.815,50.507,15.302,77.169,16.171v58.414c-32.32-0.374-63.648-3.159-91.785-7.981
                                                            C131.179,151.539,136.136,129.008,142.831,108.701z M125,227.5c0-12.557,0.556-24.979,1.62-37.147
                                                            c28.573,4.837,60.255,7.576,93.38,7.936v58.421c-33.125,0.36-64.807,3.1-93.38,7.936C125.556,252.479,125,240.057,125,227.5z
                                                             M142.832,346.299c-6.696-20.307-11.653-42.838-14.617-66.603c28.137-4.822,59.465-7.607,91.785-7.981v58.414
                                                            C193.338,330.996,167.281,336.484,142.832,346.299z M312.168,346.299c-24.449-9.815-50.507-15.302-77.168-16.171v-58.414
                                                            c32.32,0.374,63.648,3.159,91.785,7.981C323.821,303.461,318.864,325.992,312.168,346.299z"/>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    </svg>
                                                    
                                                <div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?>
                                                </div>
                                                <div class="stat-panel-title text-uppercase">Smart Weather</div>
                                            </div>
                                        </div>
                                        <a href="na.php" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>

                                
                                



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
    #page-wrapper>div:nth-child(3)>div>div>div.panel-body>div>div>div>a:hover {
        color: #fff;
    }
    </style>
    <?php
                require_once "public/config/footer.php";
                ?>

</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>

<?php } ?>