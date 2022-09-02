<?php 
    require_once('./Src/Controller/Mother.php');

    $mother = new Mother();
    $vpcArray = $mother->GetAllType()['vpc'];
    $transitGatewayArray = $mother->GetAllType()['transit_gateway'];
    $transitGatewayAttachmentsArray = $mother->GetAllType()['transit_gateway_attachments'];
    $natGatewayArray = $mother->GetAllType()['nat_gateway'];
    $internetGatewaysArray = $mother->GetAllType()['internet_gateways'];
    $endpointsArray = $mother->GetAllType()['endpoints'];
    $vpnArray = $mother->GetAllType()['vpn'];
    $peeringConnectionsArray = $mother->GetAllType()['peering_connections'];
    $privateGatewayArray = $mother->GetAllType()['private_gateway'];
    $vpcNetworkArray = $mother->GetAllType()['vpc_network'];
    $networkArray = $mother->GetAllType()['network'];
    $routeTablesArray = $mother->GetAllType()['route_tables'];

    define("VPC_ARRAY", $vpcArray);
    define("TRANSIT_GATEWAY_ARRAY", $transitGatewayArray);
    define("TRANSIT_GATEWAY_ATTACHMENTS_ARRAY", $transitGatewayAttachmentsArray);
    define("NAT_GATEWAY_ARRAY", $natGatewayArray);
    define("INTERNET_GATEWAYS_ARRAY", $internetGatewaysArray);
    define("ENDPOINTS_ARRAY", $endpointsArray);
    define("VPN_ARRAY", $vpnArray);
    define("PEERING_CONNECTIONS_ARRAY", $peeringConnectionsArray);
    define("PRIVATE_GATEWAY_ARRAY", $privateGatewayArray);
    define("VPC_NETWORK_ARRAY", $vpcNetworkArray);
    define("NETWORK_ARRAY", $networkArray);
    define("ROUTE_TABLES_ARRAY", $routeTablesArray);