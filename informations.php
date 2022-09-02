<?php
    require_once("./Src/Controller/User/User.php");
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/SGBD/sgbd.php');
    require_once('./Config/Config.php');
    require_once('./Src/Controller/Informations/Informations.class.php');
?>

<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/navbar.css">
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="./Src/assets/css/informations.css"> 
        <script src="./Src/assets/script/config.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>

    <body>

        <header>

            <div class="navbar_top_right">
                <div id="account_top_right">
                    <img src="./Src/assets/img/RGB_VEOLIA_HD.png" alt=""/>
                    <i class="fad fa-user-circle"></i>
                </div>
                <a class="icon-menu2" href="./index.php">
                    <i class="fad fa-home"></i>
                </a>
            </div>
            
            <div class="big_navbar">
                <nav class="navbar2">
                    <a id="icon-menu">
                        <i class="fad fa-bars"></i>
                    </a>
                    <div class="navbar2-ul">
                        <ul>
                            <?php 
                            if (isset($_GET['cloud'])) {
                                ?>
                                <li id="navbar-dropdown-cloud-li">
                                    <i class="fad fa-cloud"></i>
                                    <a>Comptes</a>
                                </li>
                                <?php
                            }
                            ?>
                            <?php if (isset($_GET['account'])) {
                            ?>
                                <li id="navbar-dropdown-vpc-li">
                                    <i class="fad fa-server"></i>
                                    <a>VPC</a>
                                </li>
                                <li id="navbar-dropdown-transit-gateway-li">
                                    <i class="fal fa-ethernet"></i>
                                    <a>Transit Gateway</a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </nav>

                <div id="show_more_elements_navbar_cloud">
                    <div class="show_more_elements_navbar_cloud_2">
                        <h2>Comptes</h2>
                    </div>
                    <div class="show_more_elements_navbar_cloud_3">
                        <div>
                            <i class="fab fa-aws"></i>
                            <ul>
                                <?php 
                                foreach ($accounts as $account) {
                                    ?>
                                    <li>
                                        <i class="fad fa-users"></i>
                                        <a href="./index.php?account=<?php echo $account['name']; ?>&aside=vpc&cloud=<?php echo $_GET["cloud"]; ?>"><?php echo $account['name']; ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="show_more_elements_navbar_vpc">
                    <div class="show_more_elements_navbar_vpc_2">
                        <h2>VPC</h2>
                    </div>
                    <div class="show_more_elements_navbar_vpc_3">
                        <div>
                            <i class="fab fa-aws"></i>
                            <ul>
                                <?php 
                                    foreach ($vpcArray as $vpc) {
                                        echo '<li>';
                                        echo '<i class="fad fa-stream"></i>';
                                        echo '<a href="./index.php?vpc='.$vpc['vpc_id'].'&account='.$_GET['account'].'&aside='.$_GET['aside'].'&cloud='.$_GET['cloud'].'">' . $vpc['vpc'] . '</a>';
                                        echo '</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="show_more_elements_navbar_transit_gateway">
                    <div class="show_more_elements_navbar_transit_gateway_2">
                        <h2>Transit Gateway</h2>
                    </div>
                    <div class="show_more_elements_navbar_transit_gateway_3">
                        <div>
                            <i class="fab fa-aws"></i>
                            <ul>
                                <?php
                                    foreach ($transitGatewayArray as $transit) {
                                        echo '<li>';
                                        echo '<i class="fad fa-stream"></i>';
                                        echo '<a href="./index.php?transit_gateway='.$transit['gateway'].'&account='.$_GET['account'].'&aside='.$_GET['aside'].'&cloud='.$_GET['cloud'].'">' . $transit['gateway'] . '</a>';
                                        echo '</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="navbar-dropdown-cloud">
                    <div class="top-class-navbar-dropdown-cloud">
                        <h2>Comptes</h2>
                    </div>
                    <div class="list-navbar-dropdown-cloud">
                        <div>
                            <i class="fab fa-aws"></i>
                            <ul>
                                <?php 
                                foreach ($accounts as $account) {
                                    ?>
                                    <li>
                                        <i class="fad fa-users"></i>
                                        <a href="./index.php?account=<?php echo $account['name']; ?>&aside=vpc&cloud=<?php echo $_GET["cloud"]; ?>"><?php echo $account['name']; ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="navbar-dropdown-vpc">
                    <div class="top-class-navbar-dropdown-vpc">
                        <h2>VPC</h2>
                    </div>
                    <div class="list-navbar-dropdown-vpc">
                        <div>
                            <ul>
                                <?php 
                                    foreach ($vpcArray as $vpc) {
                                        echo '<li>';
                                        echo '<i class="fad fa-stream"></i>';
                                        echo '<a href="./index.php?vpc='.$vpc['vpc_id'].'&account='.$_GET['account'].'&aside='.$_GET['aside'].'&cloud='.$_GET['cloud'].'">- ' . $vpc['vpc'] . '</a>';
                                        echo '</li>';
                                    }
                                ?>
                            </ul>   
                        </div>
                    </div>
                </div>

                <div id="navbar-dropdown-transit-gateway">
                    <div class="top-class-navbar-dropdown-transit-gateway">
                        <h2>Transit Gateway</h2>
                    </div>
                    <div class="list-navbar-dropdown-transit-gateway">
                        <div>
                            <ul>
                                <?php
                                    foreach ($transitGatewayArray as $transit) {
                                        echo '<li>';
                                        echo '<i class="fad fa-stream"></i>';
                                        echo '<a class="button_vpc_text" href="./index.php?transit_gateway='.$transit['gateway'].'&account='.$_GET['account'].'&aside='.$_GET['aside'].'&cloud='.$_GET['cloud'].'">' . $transit['gateway'] . '</a>';
                                        echo '</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="navbar-dropdown-vpc">
                    <div class="top-class-navbar-dropdown-vpc">
                        <h2>VPC</h2>
                    </div>
                    <div class="list-navbar-dropdown-vpc">
                        <div>
                            <ul>
                                <?php 
                                    foreach ($vpcArray as $vpc) {
                                        echo '<li>';
                                        echo '<i class="fad fa-stream"></i>';
                                        echo '<a href="./index.php?vpc='.$vpc['vpc_id'].'&account='.$_GET['account'].'&aside='.$_GET['aside'].'&cloud='.$_GET['cloud'].'">- ' . $vpc['vpc'] . '</a>';
                                        echo '</li>';
                                    }
                                ?>
                            </ul>   
                        </div>
                    </div>
                </div>

                <div id="navbar-dropdown-infos-elements">
                    <div class="top-class-navbar-dropdown-infos-elements">
                        <h2>Informations</h2>
                        <i id="icon-menu-close-infos-element" class="fad fa-times"></i>
                        <a href="./informations.php?vpc=<?php echo $vpc['vpc_id']; ?>&account=<?php echo $_GET['account'] ?>&aside=<?php echo $_GET['aside'] ?>&cloud=<?php echo $_GET['cloud'] ?>&vpc=<?php echo $_GET['vpc'] ?>">
                            <i id="icon-menu-shwo-more-infos-element" class="fad fa-info-circle"></i>
                        </a>
                    </div>
                    <div id="list-navbar-dropdown-infos-elements">
                        <!-- create table -->
                        <table>
                            <tr>
                                <th>Mois</th>
                                <th>Data</th>
                            </tr>
                            <tr>
                                <td>Janvier</td>
                                <td>10.01.2014</td>
                            </tr>
                            <tr>
                                <td>Février</td>
                                <td>10.01.2014</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="navbar-dropdown-account">
                    <div class="message_advert_account">
                        <span class="message_advert_account_first_span">
                            Ce compte est géré par <span class="message_advert_account_first_span_2">veolia.com</span> 
                        </span>
                        <span data-et="14" data-dt="3" class="show_more_account_advert">
                            <a target="_blank" href="https://support.google.com/accounts/answer/181692?hl=fr&authuser=0">
                                En savoir plus
                            </a>
                        </span>
                    </div>
                    <div class="account_details_dropdown">
                        <?php 
                            if (isset($_SESSION['id'])) {
                                ?>
                                <div class="account_details_dropdown_img">
                                    <img src="./Src/assets/img/img_avatar.png" alt="Avatar">
                                </div>
                                <div class="first_last_name_dropdown">Loris Poilly</div>
                                <div class="mail_dropdown">loris.poilly@veolia.com</div>
                                <div>
                                    <a class="manage_account_dropdown_a">
                                        Gérer votre compte
                                    </a>
                                </div>
                                <div class="logout_dropdown">
                                    <a href="./index.php" class="logout_dropdown_a">
                                        <div class="logout_dropdown_div">
                                            Se déconnecter
                                        </div>
                                    </a>
                                </div>
                                <?php   
                            } else {
                                ?>
                                <div class="account_details_dropdown_img" style="opacity: 0.3;">
                                    <img src="./Src/assets/img/img_avatar.png" alt="Avatar">
                                </div>
                                <div class="first_last_name_dropdown" style="opacity: 0.3;">----- -----</div>
                                <div class="mail_dropdown" style="opacity: 0.3;">-------------------------</div>
                                <div>
                                    <a class="manage_account_dropdown_a" style="opacity: 0.3;">
                                        Gérer votre compte
                                    </a>
                                </div>
                                <div class="logout_dropdown">
                                    <a href="./login_form.php" class="logout_dropdown_a">
                                        <div class="logout_dropdown_div">
                                            Se connecter
                                        </div>
                                    </a>
                                    <a href="./register_form.php" class="logout_dropdown_a">
                                        <div class="logout_dropdown_div">
                                            S'enregistrer
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                        ?>
                        <div class="bottom_account_details_dropdown">
                            <span>
                                <a class="bottom_account_details_dropdown_1" href="https://policies.google.com/terms?hl=fr" target="_blank">
                                    Règles de confidentialité
                                </a>
                            </span>
                            <span class="bottom_account_details_dropdown_2"> • </span>
                            <span>
                                <a class="bottom_account_details_dropdown_3" href="https://policies.google.com/privacy?hl=fr" target="_blank">
                                    Conditions d'utilisation
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <main>
            <div id="infos-elements">
                <div class="top-class-infos-elements">
                    <h2>Informations</h2>
                </div>
                <div id="list-infos-elements">
                        
                </div>
            </div>
        </main>

        <script src="./Src/assets/script/main.js"></script>
    </body>