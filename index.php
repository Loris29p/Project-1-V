<?php 
    require_once("./Config/Config.php");
    require_once("./Src/Controller/User/User.php");
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/Mother.php');

    $mother = new Mother();
    $array = $mother->GetAllType();

    foreach ($array as $key => $value) {
        echo "<h2>$key</h2>";
        echo "<table>";
        echo "<tr>";
        if ($key == "vpc") {
            echo "<th>Souscription</th>";
            echo "<th>Region</th>";
            echo "<th>VPC</th>";
            echo "<th>VPC_ID</th>";
            echo "<th>CIDR</th>";
            echo "<th>ID_Tables_de_routage</th>";
            echo "<th>ID_ACL</th>";
        } elseif ($key == "route_tables") {
            echo "<th>Name</th>";
            echo "<th>Route table id</th>";
            echo "<th>Destination</th>";
            echo "<th>Target</th>";
            echo "<th>Status</th>";
            echo "<th>Propagated</th>";
            echo "<th>Private gateway</th>";
        } elseif ($key == "network") {
            echo "<th>Name</th>";
            echo "<th>Id sous-réseau</th>";
            echo "<th>VPC</th>";
            echo "<th>CIDR</th>";
            echo "<th>IPV4 Dispo</th>";
            echo "<th>Zone</th>";
            echo "<th>Id Zone Dispo</th>";
            echo "<th>Table de routage</th>";
            echo "<th>ACL</th>";
            echo "<th>Sous-réseau par défaut</th>";
            echo "<th>Attribuer automatiquement une adresse IPv4 publique</th>";
            echo "<th>Attribuer automatiquement un adresse IPv4 détenue par le client</th>";
        } elseif ($key == "vpc_network") {
            echo "<th>VPC</th>";
            echo "<th>Id sous-réseau</th>";
        } elseif ($key == "private_gateway") {
            echo "<th>Name</th>";
            echo "<th>Gateway Id</th>";
            echo "<th>Status</th>";
            echo "<th>Type</th>";
            echo "<th>VPC Dispo</th>";
            echo "<th>Amazon ASN</th>";
        } elseif ($key == "peering_connections") {
            echo "<th>Name</th>";
            echo "<th>Peering connection Id</th>";
            echo "<th>Status</th>";
            echo "<th>Requester VPC</th>";
            echo "<th>Accepter VPC</th>";
            echo "<th>Requester CIDR</th>";
            echo "<th>Accepter CIDR</th>";
            echo "<th>Requester VPC Owner</th>";
            echo "<th>Accepter VPC Owner</th>";
            echo "<th>Route table ID</th>";
            echo "<th>VPC ID</th>";
            echo "<th>Main</th>";
            echo "<th>Associated with</th>";
        } elseif ($key == "transit_gateway") {
            echo "<th>Name</th>";
            echo "<th>Transit gateway Id</th>";
            echo "<th>Owner Id</th>";
            echo "<th>Status</th>";
        } elseif ($key == "nat_gateway") {
            echo "<th>Name</th>";
            echo "<th>NAT gateway IDd</th>";
            echo "<th>Connectivity type</th>";
            echo "<th>State</th>";
            echo "<th>State message</th>";
            echo "<th>Elastic IP address</th>";
            echo "<th>Private IP address</th>";
            echo "<th>Network interface ID</th>";
            echo "<th>VPC</th>";
            echo "<th>Subnet</th>";
            echo "<th>Created</th>";
            echo "<th>Deleted</th>";
        } elseif ($key == "internet_gateways") { 
            echo "<th>Name</th>";
            echo "<th>Internet gateway ID</th>";
            echo "<th>State</th>";
            echo "<th>VPC</th>";
            echo "<th>Owner</th>";
        } elseif ($key == "endpoints") {
            echo "<th>Name</th>";
            echo "<th>Endpoint Id</th>";
            echo "<th>VPC</th>";
            echo "<th>Service Name</th>";
            echo "<th>Endpoint type</th>";
            echo "<th>Status</th>";
            echo "<th>Creation time</th>";
            echo "<th>Network interfaces</th>";
            echo "<th>Subnets</th>";
            echo "<th>Route tables</th>";
        }
        echo "</tr>";
        foreach ($value as $key2 => $value2) {
            echo "<tr>";
            if ($key == "vpc") {
                echo "<td>".$value2['souscription']."</td>";
                echo "<td>".$value2['region']."</td>";
                echo "<td>".$value2['vpc']."</td>";
                echo "<td>".$value2['vpc_id']."</td>";
                echo "<td>".$value2['cidr']."</td>";
                echo "<td>".$value2['id_tables_de_routage']."</td>";
                echo "<td>".$value2['id_acl']."</td>";
            } elseif ($key == "route_tables") {
                echo "<td>".$value2['name']."</td>";
                echo "<td>".$value2['id']."</td>";
                echo "<td>".$value2['destination']."</td>";
                echo "<td>".$value2['target']."</td>";
                echo "<td>".$value2['status']."</td>";
                echo "<td>".$value2['propagated']."</td>";
                echo "<td>".$value2['private_gateway']."</td>";
            } elseif ($key == "network") {
                echo "<td>".$value2['name']."</td>";
                echo "<td>".$value2['network_id']."</td>";
                echo "<td>".$value2['vpc_id']."</td>";
                echo "<td>".$value2['cidr_ipv4']."</td>";
                echo "<td>".$value2['ipv4_available']."</td>";
                echo "<td>".$value2['zone_disponibility']."</td>";
                echo "<td>".$value2['zone_disponibility_id']."</td>";
                echo "<td>".$value2['table_routage']."</td>";
                echo "<td>".$value2['acl_network']."</td>";
                echo "<td>".$value2['default_subnet']."</td>";
                echo "<td>".$value2['auto_ipv4_public']."</td>";
                echo "<td>".$value2['auto_ipv4_private']."</td>";
            } elseif ($key == "vpc_network") {
                echo "<td>".$value2['id']."</td>";
                echo "<td>".$value2['id_sous_reseaux']."</td>";
            } elseif ($key == "private_gateway") {
                echo "<td>".$value2['name']."</td>";
                echo "<td>".$value2['gateway']."</td>";
                echo "<td>".$value2['state']."</td>";
                echo "<td>".$value2['type']."</td>";
                echo "<td>".$value2['vpc']."</td>";
                echo "<td>".$value2['asn']."</td>";
            } elseif ($key == "peering_connections") {
                echo "<td>".$value2['name']."</td>";
                echo "<td>".$value2['peering_connection_id']."</td>";
                echo "<td>".$value2['status']."</td>";
                echo "<td>".$value2['requester_vpc']."</td>";
                echo "<td>".$value2['accepter_vpc']."</td>";
                echo "<td>".$value2['requester_cidr']."</td>";
                echo "<td>".$value2['accepter_cidr']."</td>";
                echo "<td>".$value2['requester_owner_id']."</td>";
                echo "<td>".$value2['accepter_owner_id']."</td>";
                echo "<td>".$value2['route_table_id']."</td>";
                echo "<td>".$value2['vpc_id']."</td>";
                echo "<td>".$value2['main']."</td>";
                echo "<td>".$value2['associated_with']."</td>";
            } elseif ($key == "transit_gateway") {
                echo "<td>".$value2['name']."</td>";
                echo "<td>".$value2['gateway']."</td>";
                echo "<td>".$value2['owner']."</td>";
                echo "<td>".$value2['state']."</td>";
            } elseif ($key == "nat_gateway") {
                echo "<td>".$value2['name']."</td>";
                echo "<td>".$value2['nat_gateway_id']."</td>";
                echo "<td>".$value2['connectivity_type']."</td>";
                echo "<td>".$value2['state']."</td>";
                echo "<td>".$value2['state_message']."</td>";
                echo "<td>".$value2['elastic_ip_address']."</td>";
                echo "<td>".$value2['private_ip_address']."</td>";
                echo "<td>".$value2['network_interface_id']."</td>";
                echo "<td>".$value2['vpc']."</td>";
                echo "<td>".$value2['subnet']."</td>";
                echo "<td>".$value2['created']."</td>";
                echo "<td>".$value2['deleted']."</td>";
            } elseif ($key == "internet_gateways") {
                echo "<td>".$value2['name']."</td>";
                echo "<td>".$value2['internet_gateway_id']."</td>";
                echo "<td>".$value2['state']."</td>";
                echo "<td>".$value2['vpc_id']."</td>";
                echo "<td>".$value2['owner']."</td>";
            } elseif ($key == "endpoints") {
                echo "<td>".$value2['name']."</td>";
                echo "<td>".$value2['endpoint_id']."</td>";
                echo "<td>".$value2['vpc_id']."</td>";
                echo "<td>".$value2['service_name']."</td>";
                echo "<td>".$value2['endoint_type']."</td>";
                echo "<td>".$value2['state']."</td>";
                echo "<td>".$value2['creation_time']."</td>";
                echo "<td>".$value2['network_interfaces']."</td>";
                echo "<td>".$value2['subnets']."</td>";
                echo "<td>".$value2['route_tables']."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
