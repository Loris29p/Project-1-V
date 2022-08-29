<?php
    require_once("./Config/Config.php");
    require_once("./Src/Controller/User/User.php");
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/Mother.php');
    require_once('./Src/Controller/SGBD/sgbd.php');

    $mother = new Mother();
    $vpcArray = $mother->GetAllType()['vpc'];
    $transitGatewayArray = $mother->GetAllType()['transit_gateway'];

    $data_show_aside = "";

    function GetInfosOfVPC($vpcId) {
        $mother = new Mother();
        $vpcArray = $mother->GetAllType()['vpc'];
        foreach ($vpcArray as $vpc) {
            if ($vpc['vpc_id'] == $vpcId) {
                return $vpc;
            }
        }
    }

    if (isset($_GET['account'])) {
        if (isset($_GET['aside'])) {
            $data_show_aside = $_GET['aside'];
        }
        $account = $_GET['account'];
        $array = Array();
        foreach ($vpcArray as $vpc) {
            if ($vpc['souscription'] == $account) {
                $array[$vpc['vpc_id']] = $vpc;
            }
        }
        $vpcArray = $array;
    }
?>

<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/gojs.css">
        <link rel="stylesheet" href="./Src/assets/css/navbar.css">
        <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>

    <body>

        <header>

            <div class="navbar_top_right">
                <a href="./index.php" class="settings">
                    <i class="fad fa-cog"></i>
                </a>
                <a href="./index.php" class="infos_element_top_right">
                    <i class="fad fa-align-center"></i>
                </a>
                <div class="account_top_right">
                    <img src="./Src/assets/img/RGB_VEOLIA_HD.png" alt=""/>
                    <i class="fad fa-user-circle"></i>
                </div>
            </div>
            
            <div class="big_navbar">
                <nav class="navbar2">
                    <div class="icon-menu">
                        <i class="fal fa-bars"></i>
                    </div>
                    <div class="navbar2-ul">
                        <ul>
                            <li id="navbar-dropdown-cloud-li">
                                <i class="fad fa-cloud"></i>
                                <a href="./index.php">Cloud</a>
                            </li>
                            <?php if (isset($_GET['account'])) {
                            ?>
                                <li id="navbar-dropdown-vpc-li">
                                    <i class="fad fa-server"></i>
                                    <a href="./index.php">VPC</a>
                                </li>
                                <li id="navbar-dropdown-transit-gateway-li">
                                    <i class="fal fa-ethernet"></i>
                                    <a href="./index.php">Transit Gateway</a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </nav>

                <div id="navbar-dropdown-cloud">
                    <div class="top-class-navbar-dropdown-cloud">
                        <h2>Cloud</h2>
                    </div>
                    <div class="list-navbar-dropdown-cloud">
                        <div>
                            <i class="fab fa-aws"></i>
                            <ul>
                                <li>
                                    <i class="fad fa-users"></i>
                                    <a href="./vpc.php?account=VESA PROD&aside=vpc">VESA PROD</a>
                                </li>
                                <li>
                                    <i class="fad fa-users"></i>
                                    <a href="./vpc.php?account=VESA ACCESS&aside=vpc">VESA ACCESS</a>
                                </li>
                                <li>
                                    <i class="fad fa-users"></i>
                                    <a href="./vpc.php?account=VESA MANAGEMENT&aside=vpc">VESA MANAGEMENT</a>
                                </li>
                                <li>
                                    <i class="fad fa-users"></i>
                                    <a href="./vpc.php?account=VESA TRANSIT&aside=vpc">VESA TRANSIT</a>
                                </li>
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
                                        echo '<a href="./vpc.php?vpc='.$vpc['vpc_id'].'&account='.$_GET['account'].'&aside='.$_GET['aside'].'">- ' . $vpc['vpc'] . '</a>';
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
                                        echo '<a class="button_vpc_text" href="./vpc.php?transit_gateway='.$transit['gateway'].'&account='.$_GET['account'].'&aside='.$_GET['aside'].'">' . $transit['gateway'] . '</a>';
                                        echo '</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="infos_element">
                    
                </div>
            </div>
        </header>

        <?php 
        if (isset($_GET['vpc'])) {
            $vpc_id = "'".$_GET['vpc']."'";
            ?>
                <div id="vpc_show_aws">
                    <a>
                        <i class="fab fa-aws"></i>
                        AWS Cloud
                    </a>
                    <div class="zone_name">
                        <a>
                            <i class="fal fa-flag"></i>
                            <?php echo GetInfosOfVPC($_GET['vpc'])['region']; ?>
                        </a>
                        <div class="vpc_info">
                            <a>
                            <i class="fal fa-network-wired"></i>
                                <?php echo GetInfosOfVPC($_GET['vpc'])['vpc']; ?>
                                <p><?php echo GetInfosOfVPC($_GET['vpc'])['cidr']; ?></p>
                            </a>
                            <div id="myDiagramDiv"></div>
                            <script src="./Src/assets/script/gojs.js"></script>
                            <div>
                                <script>
                                    Construct(<?php echo json_encode($vpcArray); ?>, <?php echo json_encode($transitGatewayArray); ?>);
                                    ConstructFirstPartVPCId(<?php echo $vpc_id; ?>);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        } elseif (isset($_GET['account']) && !isset($_GET['vpc']) && !isset($_GET['transit_gateway'])) {
        ?>
            <div id="vpc_show_aws">
                <a>
                    <i class="fab fa-aws"></i>
                    AWS Cloud
                </a>
                <div id="myDiagramDiv"></div>
                <script src="./Src/assets/script/gojs.js"></script>
                <div>
                    <script>
                        Construct(<?php echo json_encode($vpcArray); ?>, <?php echo json_encode($transitGatewayArray); ?>, true);
                    </script>
                </div>
            </div>
        <?php
        } elseif (isset($_GET['transit_gateway'])) {
            $transit_gateway_id = "'".$_GET['transit_gateway']."'";
            ?>
                <div id="vpc_show_aws">
                    <a>
                        <i class="fab fa-aws"></i>
                        AWS Cloud
                    </a>
                    <div id="myDiagramDiv"></div>
                    <script src="./Src/assets/script/gojs.js"></script>
                    <div>
                        <script>
                            Construct(<?php echo json_encode($vpcArray); ?>, <?php echo json_encode($transitGatewayArray); ?>);
                            ConstructFirstPartTransitGatewayId(<?php echo $transit_gateway_id; ?>);
                        </script>
                    </div>
                </div>
            <?php
        }
        ?>


        <script src="./Src/assets/script/main.js"></script>
    </body>