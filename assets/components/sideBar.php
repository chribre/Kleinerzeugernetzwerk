<?php
/****************************************************************
   FILE             :   sideBar.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   Side bar drwaing menu for dashboard
****************************************************************/
?>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active bg-secondary min-vh-100">

            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href='dashboard.php?menu=profile&data=personal'><span class="fa fa-user"></span> <?php echo gettext("Profile"); ?></a>
                </li>
                <li>
                    <a href='dashboard.php?menu=products'><span class="fa fa-shopping-basket"></span> <?php echo gettext("Products"); ?></a>
                </li>
                <li class="active">
                    <a href='dashboard.php?menu=profile&data=productionPoint'><span class="fa fa-cubes"></span> <?php echo gettext("Production Point"); ?></a>
                </li>
                <li class="active">
                    <a href='dashboard.php?menu=profile&data=seller'><span class="fa fa-shopping-cart"></span> <?php echo gettext("Seller"); ?></a>
                </li>
                <li>
                    <a href='dashboard.php?menu=events'><span class="fa fa-calendar"></span> <?php echo gettext("Events"); ?></a>
                </li>
                <li>
                    <a href='dashboard.php?menu=services'><span class="fa fa-cogs"></span> <?php echo gettext("Services"); ?></a>
                </li>
                <li>
                    <a href='dashboard.php?menu=feeds'><span class="fa fa-newspaper-o"></span> <?php echo gettext("Feeds & Posts"); ?></a>
                </li>
                <li>
                    <a href='dashboard.php?menu=messages'><span class="fa fa-comments"></span> <?php echo gettext("Message"); ?></a>
                </li>
            </ul>

            <div class="footer">

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-2 p-md-3">

            <div class="container-fluid row align-items-center align-middle justify-content-between">

                <div>
                    <button type="button" id="sidebarCollapse" class="btn btn-secondary">

                        <span class="material-icons">
                            list
                        </span>

                    </button>



                    <?php
                    if (isset($_GET['menu'])) {
                        switch ($_GET['menu']){
                            case 'profile':
                                $profileHead = '';

                                if (isset($_GET['data'])){
                                    if ($_GET['data'] == 'personal'){
                                        $profileHead = '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'.gettext("PROFILE").'</text></div>';
                                        $profileHead = $profileHead . '<a class="btn btn-success" href="/kleinerzeugernetzwerk/src/editProfile.php" ><i class="edit icon"></i>'.gettext("Edit profile").'</a>';
                                    }elseif ($_GET['data'] == 'productionPoint'){
                                        $profileHead = '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'. gettext("PRODUCTION POINTS") . '</text></div>';
                                        $profileHead = $profileHead . '<button class="btn btn-success" data-toggle="modal" onclick="openAddProductionPointModal()" data-backdrop="static" data-keyboard="false"><i class="plus icon"></i>'.gettext("Add Production Point").'</button>';
                                    }elseif ($_GET['data'] == 'seller'){
                                        $profileHead = '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'.gettext("SELLERS").'</text></div>';
                                        $profileHead = $profileHead . '<button class="btn btn-success" data-toggle="modal" onclick="openAddSellarModal()" data-backdrop="static" data-keyboard="false"><i class="plus icon"></i>'.gettext("Add Selling Point").'</button>';


                                        //                                        $profileHead = $profileHead . '<button onclick="getSellerDetails()">Click me</button>';
                                    }
                                }
                                echo $profileHead;
                                break;
                            case 'products':
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'.gettext("PRODUCTS").'</text></div>';
                                break;
                            case 'events':
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'.gettext("EVENTS").'</text></div>';
                                break;
                            case 'services':
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'.gettext("SERVICES").'</text></div>';
                                break;
                            case 'feeds':
                                $profileHead = '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'.gettext("NEWS & FEEDS").'</text></div>';
                                $profileHead = $profileHead . '<button class="btn btn-success" data-toggle="modal" onclick="openAddFeedPostModal([])" data-backdrop="static" data-keyboard="false"><i class="plus icon"></i>'.gettext("Add Feed Post").'</button>';
                                echo $profileHead;
                                break;
                            case 'messages':
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'.gettext("MESSAGES").'</text></div>';
                                break;
                            default:
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">'.gettext("PROFILE").'</text></div>';
                                break;
                        }

                    }
                    ?>

                </div>

                <?php

                if (isset($_GET['menu'])) {
                    switch ($_GET['menu']){
                        case 'profile':
                            include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/profile.php");
                            break;
                        case 'products':
                            include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/products.php");
                            break;
                        case 'events':
                            echo '<h2 class="ml-3">'.gettext("EVENTS").'</h2>';
                            break;
                        case 'services':
                            echo '<h2 class="ml-3">'.gettext("SERVICES").'</h2>';
                            break;
                        case 'feeds':
                            include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/feeds-by-user.php");
                            break;
                        case 'messages':
                            include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/messages.php");
                            break;
                        default:
                            echo '<h2 class="ml-3">'.gettext("PROFILE").'</h2>';
                            break;
                    }

                }
                ?>


            </div>
            <!--
<div class="container" id="sideBarContent">
</div>
-->
        </div>

        </body>

    <script>

        function openAddProductionPointModal(){
            setProductionPointModalValue([]);
            $('#addProductionPoint').modal('toggle');
        }

    </script>