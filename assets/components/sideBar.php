<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active bg-secondary min-vh-100">

            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href='dashboard.php?menu=profile&data=personal'><span class="fa fa-user"></span> Profile</a>
                </li>
                <li>
                    <a href='dashboard.php?menu=products'><span class="fa fa-shopping-basket"></span> Products</a>
                </li>
                <li>
                    <a href='dashboard.php?menu=events'><span class="fa fa-calendar"></span> Events</a>
                </li>
                <li>
                    <a href='dashboard.php?menu=services'><span class="fa fa-cogs"></span> Services</a>
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
                                $profileHead = '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">PROFILE</text></div>';
                                    if (isset($_GET['data'])){
                                        if ($_GET['data'] == 'personal'){
                                            $profileHead = $profileHead . '<button class="btn btn-success" data-toggle="modal" data-target="#addProductionPoint" data-backdrop="static" data-keyboard="false"><i class="edit icon"></i>Edit profile</button>';
                                        }elseif ($_GET['data'] == 'productionPoint'){
                                            $profileHead = $profileHead . '<button class="btn btn-success" data-toggle="modal" data-target="#addProductionPoint" data-backdrop="static" data-keyboard="false"><i class="plus icon"></i>Add Farm Land</button>';
                                        }
                                    }
                                echo $profileHead;
                                break;
                            case 'products':
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">PRODUCTS</text></div>';
                                break;
                            case 'events':
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">EVENTS</text></div>';
                                break;
                            case 'services':
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">SERVICES</text></div>';
                                break;
                            default:
                                echo '<text style="font-size: 25px; font-weight: 700; vertical-align: middle;" id="dashboardTitle" class="ml-3">PROFILE</text></div>';
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
                            echo '<h2 class="ml-3">EVENTS</h2>';
                            break;
                        case 'services':
                            echo '<h2 class="ml-3">SERVICES</h2>';
                            break;
                        default:
                            echo '<h2 class="ml-3">PROFILE</h2>';
                            break;
                    }

                }
                ?>

            </div>
        </div>

        </body>