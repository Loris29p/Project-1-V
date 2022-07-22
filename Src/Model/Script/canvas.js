const $ = go.GraphObject.make;

const myDiagram = $(go.Diagram, "myDiagramDiv", // must name or refer to the DIV HTML element
    {
        "animationManager.initialAnimationStyle": go.AnimationManager.None,
        "InitialAnimationStarting": e => {
            var animation = e.subject.defaultAnimation;
            animation.easing = go.Animation.EaseOutExpo;
            animation.duration = 500;
            animation.add(e.diagram, 'scale', 0.1, 1);
            animation.add(e.diagram, 'opacity', 0, 1);
        },

        "undoManager.isEnabled": true,
        positionComputation: function(diagram, pt) {
            return new go.Point(Math.floor(pt.x), Math.floor(pt.y));
        }
    });

var VPC = []
var TransitGateway = []

var nodeDataArray = []
var linkDataArray = []

var ZonesSubnets = [
    {x: -250, y: -475},
    {x: 250, y: -510},
    {x: -250, y: -100},
    {x: 250, y: -150},
    {x: -250, y: 200},
    {x: 250, y: 200},
]

myDiagram.nodeTemplate = $(go.Node, "Horizontal", {
        background: "rgb(228, 228, 228)",
        locationSpot: go.Spot.Center,
        width: 200,
        height: 30,
    },
    new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
    $(go.Picture, {
            margin: 5,
            width: 30,
            height: 30,
            background: "transparent"
        },
        new go.Binding("source", "source")),
    $(go.TextBlock, {
            font: "bold small-caps 8pt helvetica, bold arial, sans-serif",
            // margin: 7,
            stroke: "rgba(0, 0, 0, .87)",
        },
        new go.Binding("text").makeTwoWay())
);

myDiagram.linkTemplate =
    new go.Link({ routing: go.Link.Orthogonal, corner: 5 })
    .add(new go.Shape({ strokeWidth: 3, stroke: "#555" }))

myDiagram.addDiagramListener("ObjectDoubleClicked", function(e) {
    var clicked = e.subject.part;
    if (clicked instanceof go.Node) {
        var node = clicked.data;
        if (String(node.key).includes("vpc")) {
            ConstructFirstPartVPCId(node.key);
        } else if (String(node.key).includes("tgw")) {
            ConstructFirstPartTransitGatewayId(node.key);
        }
    }
});

myDiagram.addDiagramListener("ObjectContextClicked", function(e) {
    var clicked = e.subject.part;
    if (clicked instanceof go.Node) {
        var node = clicked.data;
        alert(node.description);
    }
});

var vpc_array = []
var transit_gateway_array = []

function ConstructFirstPartVPCId(vpc_id) {
    var vpc = vpc_array[vpc_id];
    nodeDataArray = []
    linkDataArray = []

    var LastidRoutage = "";
    var LastIdEndpoint = "";
    var LastPeeringConnection = "";
    var LastInternetGateway = "";
    var LastNatGateway = "";
    var LastNetworkAlias = "";
    var LastSubnetZone = "";
    var LastLocSubnetY = [];

    var TableRoutage = [];
    var Endpoints = [];
    var PeeringConnections = [];
    var InternetGateways = [];
    var NatGateways = [];
    var Networks = [];
    var SubnetZones = [];

    var array = Object.entries(vpc)
    array.forEach(function(element) {
        if (element[0] == 'table_routages') {
            element.forEach(function(item) {
                if (item != 'table_routages') {
                    var array2 = Object.entries(item)
                    array2.forEach(function(item2) {
                        if (LastidRoutage != item2[1]['id']) {
                            LastidRoutage = item2[1]['id'];
                            TableRoutage.push(item2[1])
                            var node = {
                                key: item2[1]['id'],
                                text: item2[1]['name'],
                                source: "Src/assets/img/Res_Amazon-Route-53_Route-Table_48_Light.png",
                                description: "Nom: " + item2[1]['name'] + "\nId: " + item2[1]['id'] + "\nDestination: " + item2[1]['detination'] + "\nPrivate Gateway: " + item2[1]['private_gateway'] + "\nPropagé: " + item2[1]['propagated'] + "\nStatus" + item2[1]['status'] + "\nCible: " + item2[1]['target'],
                                loc: "-500 -100"
                            }
                            nodeDataArray.push(node)
                        }
                    });
                }
            });
        } else if (element[0] == 'endpoints') {
            element.forEach(function(item) {
                if (item != 'endpoints') {
                    var array2 = Object.entries(item)
                    array2.forEach(function(item2) {
                        if (LastIdEndpoint != item2[1]['endpoint_id']) {
                            LastIdEndpoint = item2[1]['endpoint_id'];
                            Endpoints.push(item2[1])
                            var node = {
                                key: item2[1]['endpoint_id'],
                                text: item2[1]['endpoint_id'],
                                source: "Src/assets/img/Res_Amazon-VPC_Endpoints_48_Light.png",
                                description: "Nom: " + item2[1]['name'] + "\nEndpoint Id: " + item2[1]['endpoint_id'] + "\nVpc Id:" + item2[1]['vpc_id'] + "\nNom du service: " + item2[1]['service_name'] + "\nType: " + item2[1]['endoint_type'] + "\nNetwork Interfaces: " + item2[1]['network_interfaces'] + "\nTable de routage: " + item2[1]['route_tables'] + "\nSubnets: " + item2[1]['subnets'],
                            }
                            nodeDataArray.push(node)
                        }
                    });
                }
            });
        } else if (element[0] == 'peering_connections') {
            element.forEach(function(item) {
                if (item != 'peering_connections') {
                    var array2 = Object.entries(item)
                    array2.forEach(function(item2) {
                        if (LastPeeringConnection != item2[1]['name']) {
                            LastPeeringConnection = item2[1]['name'];
                            PeeringConnections.push(item2[1])
                            var node = {
                                key: item2[1]['name'],
                                text: item2[1]['name'],
                                source: "Src/assets/img/Res_Amazon-VPC_Peering-Connection_48_Light.png",
                                description: "Nom: " + item2[1]['name'] + "\nPeering Connection Id: " + item2[1]['peering_connection_id'] + "\nMain: " + item2[1]['main'] + "\nStatus: " + item2[1]['status'] + "\nVpc Id: " + item2[1]['vpc_id'] + "\nTable de Routage: " + item2[1]['route_table_id'] + "\nRequester CIDR: " + item2[1]['requester_cidr'] + "\nRequester Owner: " + item2[1]['requester_owner_id'] + "\nRequester VPC: " + item2[1]['requester_vpc'] + "\nAccepter CIDR: " + item2[1]['accepter_cidr'] + "\nAccepter Owner: " + item2[1]['accepter_owner_id'] + "\nAccepter VPC: " + item2[1]['accepter_vpc'] + "\nAssocié avec: " + item2[1]['associated_with'],
                            }
                            nodeDataArray.push(node)
                        }
                    });
                }
            });
        } else if (element[0] == 'internet_gateways') {
            element.forEach(function(item) {
                if (item != 'internet_gateways') {
                    var array2 = Object.entries(item)
                    array2.forEach(function(item2) {
                        if (LastInternetGateway != item2[1]['name']) {
                            LastInternetGateway = item2[1]['name'];
                            InternetGateways.push(item2[1])
                            var node = {
                                key: item2[1]['internet_gateway_id'],
                                text: item2[1]['name'],
                                source: "Src/assets/img/Res_Amazon-VPC_Internet-Gateway_48_Light.png",
                                description: "Nom: " + item2[1]['name'] + "\nId: " + item2[1]['internet_gateway_id'] + "\nOwner: " + item2[1]['owner'] + "\nStatus: " + item2[1]['state'] + "\nVpc Id: " + item2[1]['vpc_id'],
                                loc: "-500 -300"
                            }
                            nodeDataArray.push(node)
                        }
                    });
                }
            });
        } else if (element[0] == 'nat_gateways') {
            element.forEach(function(item) {
                if (item != 'nat_gateways') {
                    var array2 = Object.entries(item)
                    array2.forEach(function(item2) {
                        if (LastNatGateway != item2[1]['nat_gateway_id']) {
                            LastNatGateway = item2[1]['nat_gateway_id'];
                            NatGateways.push(item2[1])
                            var node = {
                                key: item2[1]['nat_gateway_id'],
                                text: item2[1]['nat_gateway_id'],
                                source: "Src/assets/img/Res_Amazon-VPC_NAT-Gateway_48_Light.png",
                                description: "Nom: " + item2[1]['name'] + "\nNat Gateway Id: " + item2[1]['nat_gateway_id'] + "\nConnectivity Type: " + item2[1]['connectivity_type'] + "\nCreated: " + item2[1]['created'] + "\nDeleted: " + item2[1]['deleted'] + "\nElastic Ip Adress: " + item2[1]['elastic_ip_address'] + "\nNetwork Interface Id: " + item2[1]['network_interface_id'] + "\nPrivate Ip Adresse: " + item2[1]['private_ip_address'] + "\nStatus: " + item2[1]['state'] + "\nMessage Status: " + item2[1]['state_message'] + "\nSubnet: " + item2[1]['subnet'] + "\nVPC: " + item2[1]['vpc'],
                            }
                            nodeDataArray.push(node)
                        }
                    });
                }
            });
        } else if (element[0] == 'network') {
            element.forEach(function(item) {
                if (item != 'network') {
                    var array2 = Object.entries(item)
                    array2.forEach(function(item2, index2) {
                        if (LastNetworkAlias != item2[1]['network_id']) {
                            LastNetworkAlias = item2[1]['network_id'];
                            Networks.push(item2[1])
                            var HasFindZone = false;
                            SubnetZones.forEach(function(item3) {
                                if (item3['zone_disponibility_id'] == item2[1]['zone_disponibility_id']) {
                                    HasFindZone = true;
                                }
                            });
                            if (HasFindZone == false) {
                                SubnetZones.push({
                                    zone_disponibility_id: item2[1]['zone_disponibility_id'],
                                })
                            }
                            var LastIndex3 = null;
                            SubnetZones.forEach(function(item3, index3) {
                                if (item2[1]['zone_disponibility_id'] == item3['zone_disponibility_id']) {
                                    var loc = "" + ZonesSubnets[index3].x + " " + ZonesSubnets[index3].y + "";
                                    if (LastIndex3 != index3 && !LastLocSubnetY[index3]) {
                                        LastIndex3 = index3;
                                        LastLocSubnetY[index3] = ZonesSubnets[index3].y;
                                    }

                                    if (index2 > 0 && LastLocSubnetY[index3] < ZonesSubnets[2].y) {
                                        LastLocSubnetY[index3] = LastLocSubnetY[index3] + 35;
                                        loc = "" + ZonesSubnets[index3].x + " " + LastLocSubnetY[index3] + "";
                                    }

                                    // console.log(loc)

                                    var node = {
                                        key: item2[1]['network_id'],
                                        text: item2[1]['network_id'] + " - " + item2[1]['zone_disponibility'],
                                        source: "Src/assets/img/Res_Amazon-VPC_NAT-Gateway_48_Light.png",
                                        description: "Nom: " + item2[1]['name'] + "\nNetwork Id: " + item2[1]['network_id'] + "\nVpc Id: " + item2[1]['vpc_id'] + "\nCIDR IPV4: " + item2[1]['cidr_ipv4'] + "\nIPV4 Available: " + item2[1]['ipv4_available'] + "\nAcl Network: " + item2[1]['acl_network'] + "\nAuto Private IPV4: " + item2[1]['auto_ipv4_private'] + "\nAuto Public IPV4: " + item2[1]['auto_ipv4_public'] + "\nDefault Subnet: " + item2[1]['default_subnet'] + "\nTable de Routage" + item2[1]['table_routage'] + "\nZone Disponibilité: " + item2[1]['zone_disponibility'] + "\nZone Disponibilité Id: " + item2[1]['zone_disponibility_id'],
                                        loc: loc
                                    }
                                    nodeDataArray.push(node)
                                }
                            });
                        }
                    });
                }
            });
        }
    });

    var transit_gateway = TransitGateway
    var transit_gateway_array = []
    var array2 = Object.entries(transit_gateway)
    array2.forEach(function(element) {
        if (element[1]['gateway_attachments']) {
            var array3 = element[1]['gateway_attachments']
            array3.forEach(function(element2) {
                if (element2['resource_ID'] == vpc_id) {
                    var node = {
                        key: element[0],
                        text: element[0],
                        source: "Src/assets/img/Arch_AWS-Transit-Gateway_64@5x.png",
                        description: "Nom: " + element2['name'] + "\nTransit Gateway Attachments Id" + element2['transit_gateway_attachment_ID'] + "\nTransit Gateway Id" + element2['transit_gateway_ID'] + "\nId Table Routage Associé: " + element2['association_route_table_ID'] + "\nStatus Associé: " + element2['association_state'] + "\nResource ID: " + element2['resource_ID'] + "\nResource Type: " + element2['resource_type'] + "\nStatus: " + element2['state'],
                        loc: "-500 -200"
                    }
                    transit_gateway_array.push(element[0])
                    nodeDataArray.push(node)
                }
            });
        }
    });

    var node = {
        key: "internet",
        text: "internet",
        source: "Src/assets/img/Arch_Amazon-Virtual-Private-Cloud_64@5x.png",
        loc: "-500 -400"
    }
    nodeDataArray.push(node)

    nodeDataArray.forEach(function(element) {
        transit_gateway_array.forEach(function(element2) {
            if (String(element.key).includes("rtb")) {
                var link = {
                    from: element.key,
                    to: element2,
                    color: "black",
                    thickness: 2,
                }
                linkDataArray.push(link)
            }
            if (String(element.key).includes("igw")) {
                var link = {
                    from: element2,
                    to: element.key,
                    color: "black",
                    thickness: 2,
                }
                linkDataArray.push(link)
            }
        });
        InternetGateways.forEach(function(element2) {
            if (String(element.key).includes("internet")) {
                var link = {
                    from: element.key,
                    to: element2['internet_gateway_id'],
                    color: "black",
                    thickness: 2,
                }
                linkDataArray.push(link)
            }
        });
    });

    myDiagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);
}

function ConstructFirstPartTransitGatewayId(transit_gateway_id) {
    var transit_gateway = transit_gateway_array[transit_gateway_id];
    nodeDataArray = []
    linkDataArray = []

    var LastIdTransitGatewayAttachments = "";
    var array = Object.entries(transit_gateway)
    array.forEach(function(element) {
        if (element[0] == 'gateway_attachments') {
            element.forEach(function(item) {
                if (item != 'gateway_attachments') {
                    var array2 = Object.entries(item)
                    array2.forEach(function(item2) {
                        if (LastIdTransitGatewayAttachments != item2[1]['transit_gateway_attachment_ID']) {
                            LastIdTransitGatewayAttachments = item2[1]['transit_gateway_attachment_ID'];
                            var node = {
                                key: item2[1]['transit_gateway_attachment_ID'],
                                text: item2[1]['name'],
                                source: "Src/assets/img/Arch_AWS-Transit-Gateway_64@5x.png",
                                description: "Nom: " + item2[1]['name'] + "\nTransit Gateway Attachments Id" + item2[1]['transit_gateway_attachment_ID'] + "\nTransit Gateway Id" + item2[1]['transit_gateway_ID'] + "\nId Table Routage Associé: " + item2[1]['association_route_table_ID'] + "\nStatus Associé: " + item2[1]['association_state'] + "\nResource ID: " + item2[1]['resource_ID'] + "\nResource Type: " + item2[1]['resource_type'] + "\nStatus: " + item2[1]['state'],
                            }
                            nodeDataArray.push(node)
                        }
                    });
                }
            });
        }
    });

    myDiagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);
}

function Construct(vpc, transit_gateway) {
    VPC = vpc
    TransitGateway = transit_gateway
    var array = Object.entries(vpc)
    array.forEach(function(element) {
        element.forEach(function(item) {
            vpc_array[item['vpc_id']] = element[1];
            if (item['vpc_id'] != undefined) {
                var node = {
                    key: item['vpc_id'],
                    text: item['vpc'],
                    source: "Src/assets/img/Arch_Amazon-Virtual-Private-Cloud_64@5x.png",
                    description: "Souscription: " + item['souscription'] + "\nVPC: " + item['vpc'] + "\nVPC ID:" + item['vpc_id'] + "\nRegion: " + item['region'] + "\nCIDR: " + item['cidr'] + "\nACL: " + item['id_acl'] + "\nTable de routage: " + item['id_table_routage'],
                    // loc: "0 100",
                }
                nodeDataArray.push(node)
            }
        });
    });

    var array2 = Object.entries(transit_gateway)
    array2.forEach(function(element) {
        element.forEach(function(item) {
            console.log(item)
            transit_gateway_array[item['gateway']] = element[1];
            if (item['gateway'] != undefined) {
                var node = {
                    key: item['gateway'],
                    text: item['gateway'],
                    source: "Src/assets/img/Arch_AWS-Transit-Gateway_64@5x.png",
                    description: "Nom: " + item['name'] + "\nGateway: " + item['gateway'] + "\nOwner" + item['owner'] + "\nStatus: " + item['state'],
                    // loc: "50 200",
                }
                nodeDataArray.push(node)
            }
        });
    });

    console.log(vpc)
    console.log(transit_gateway)

    myDiagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);
}