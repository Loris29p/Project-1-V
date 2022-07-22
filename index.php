<?php 
    require_once("./Config/Config.php");
    require_once("./Src/Controller/User/User.php");
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/Mother.php');
    require_once('./Src/Controller/SGBD/sgbd.php');

    $sgbd = new Sgbd();
    $mother = new Mother();
    $vpcArray = $mother->GetAllType()['vpc'];
    $transitGatewayArray = $mother->GetAllType()['transit_gateway'];

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'vpc_update') {
            $mother->UpdateVPC();
        } elseif ($_POST['action'] == 'endpoints_update') {
            $mother->UpdateEndpoints();
        } elseif ($_POST['action'] == 'transit_gateway_update') {
            $mother->UpdateTransit_Gateway();
        } elseif ($_POST['action'] == 'transit_gateway_attachments_update') {
            $mother->UpdateTransit_Gateway_Attachments();
        } elseif ($_POST['action'] == 'nat_gateway_update') {
            $mother->UpdateNat_Gateway();
        } elseif ($_POST['action'] == 'internet_gateway_update') {
            $mother->UpdateInternet_Gateways();
        } elseif ($_POST['action'] == 'peering_connections_update') {
            $mother->UpdatePeering_Connections();
        } elseif ($_POST['action'] == 'private_gateway_update') {
            $mother->UpdatePrivate_Gateway();
        } elseif ($_POST['action'] == 'route_table_update') {
            $mother->UpdateRouteTable();
        } elseif ($_POST['action'] == 'network_update') {
            $mother->UpdateNetwork();
        } elseif ($_POST['action'] == 'vpc_network_update') {
            $mother->UpdateVPC_Network();
        } elseif ($_POST['action'] == 'vpn_update') {
            $mother->UpdateVPN();
        }
    }
?>

<!-- Initilialiser HTML -->
<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./Src/Model/Style/canvas.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./Src/assets/bootstrap/css/bootstrap.min.css">
        <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
    </head>

    <body>
        <div id="myDiagramDiv"></div>
        <script src="./Src/Model/Script/canvas.js"></script>
        <script>
            Construct(<?php echo json_encode($vpcArray); ?>, <?php echo json_encode($transitGatewayArray); ?>);
        </script>
        <!-- Custom alert -->
        <!-- Ajout d'un boutton qui renvoie sur cette page avec un aprametre en post -->
        <!-- <form action="index.php" method="post">
            <input type="submit" name="action" value="vpc_network_update">
            <input type="submit" name="action" value="vpc_update">
            <input type="submit" name="action" value="endpoints_update">
            <input type="submit" name="action" value="internet_gateway_update">
            <input type="submit" name="action" value="nat_gateway_update">
            <input type="submit" name="action" value="peering_connections_update">
            <input type="submit" name="action" value="transit_gateway_update">
            <input type="submit" name="action" value="transit_gateway_attachments_update">
            <input type="submit" name="action" value="network_update">
            <input type="submit" name="action" value="private_gateway_update">
            <input type="submit" name="action" value="route_table_update">
            <input type="submit" name="action" value="vpn_update">
        </form> -->

        <!-- <div class="container py-4 py-xl-5">
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                <div class="col">
                    <div>
                        <div class="table">
                            <h4>Lorem libero donec</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- <div>
            <h1 id="title">AWS</h1>
        </div>
        <div>
            <h2 id="subtitle">VPC</h2>
        </div> -->

        <!-- Affichage de tous les VPC suivant leur id sous forme de tableau -->
        <?php
            // $vpc = $mother->GetAllType()['vpc'];
            // echo "<table class='table table-striped'>";
            // echo "<tr>";
            // echo "<th>Souscription</th>";
            // echo "<th>Région</th>";
            // echo "<th>VPC</th>";
            // echo "<th>VPC ID</th>";
            // echo "<th>CIDR</th>";
            // echo "<th>Table de routage</th>";
            // echo "<th>ID ACL</th>";
            // echo "</tr>";
            // foreach ($vpc as $key => $value) {
            //     echo "<tr>";
            //     echo "<td>".$value['souscription']."</td>";
            //     echo "<td>".$value['region']."</td>";
            //     echo "<td>".$value['vpc']."</td>";
            //     echo "<td>".$value['vpc_id']."</td>";
            //     echo "<td>".$value['cidr']."</td>";
            //     echo "<td>".$value['id_table_routage']."</td>";
            //     echo "<td>".$value['id_acl']."</td>";
            //     echo "</tr>";
            // }
            // echo "</table>";
        ?>
    </body>