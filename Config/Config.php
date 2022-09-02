<?php 
    require_once('./Src/Controller/Mother.php');

    $mother = new Mother();
    $vpcArray = $mother->GetAllType()['vpc'];
    $transitGatewayArray = $mother->GetAllType()['transit_gateway'];

    define("VPC_ARRAY", $vpcArray);
    define("TRANSIT_GATEWAY_ARRAY", $transitGatewayArray);