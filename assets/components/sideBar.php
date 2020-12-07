<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active bg-secondary min-vh-100">

            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href='profile.php?menu=profile'><span class="fa fa-user"></span> Profile</a>
                </li>
                <li>
                    <a href='profile.php?menu=products'><span class="fa fa-shopping-basket"></span> Products</a>
                </li>
                <li>
                    <a href='profile.php?menu=events'><span class="fa fa-calendar"></span> Events</a>
                </li>
                <li>
                    <a href='profile.php?menu=services'><span class="fa fa-cogs"></span> Services</a>
                </li>
            </ul>

            <div class="footer">

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-2 p-md-3">

            <div class="container-fluid row align-items-center">

                <button type="button" id="sidebarCollapse" class="btn btn-secondary">
           
                    <span class="material-icons">
                        list
                    </span>
 
                </button>



                <?php
                if (isset($_GET['menu'])) {
                    switch ($_GET['menu']){
                        case 'profile':
                            echo '<h2 class="ml-3">PROFILE</h2>';
                            break;
                        case 'products':
                            echo '<h2 class="ml-3">PRODUCTS</h2>';
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
            <?php

            if (isset($_GET['menu'])) {
                switch ($_GET['menu']){
                    case 'profile':
                        echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
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