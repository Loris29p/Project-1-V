$(document.body).css("zoom", document.body.clientWidth / 1920);

window.addEventListener("resize", function () {
    $(document.body).css("zoom", document.body.clientWidth / 1920);
});

let navbar_dropdown_cloud = document.getElementById("navbar-dropdown-cloud");
let navbar_dropdown_vpc = document.getElementById("navbar-dropdown-vpc");
let navbar_dropdown_transit_gateway = document.getElementById("navbar-dropdown-transit-gateway");
let navbar_dropdown_subnets = document.getElementById("navbar-dropdown-subnets");
let navbar_dropdown_route_table = document.getElementById("navbar-dropdown-route-table");
let navbar_dropdown_vpn = document.getElementById("navbar-dropdown-vpn");

let navbar_dropdown_cloud_li = document.getElementById("navbar-dropdown-cloud-li");
let navbar_dropdown_vpc_li = document.getElementById("navbar-dropdown-vpc-li");
let navbar_dropdown_transit_gateway_li = document.getElementById("navbar-dropdown-transit-gateway-li");
let navbar_dropdown_subnets_li = document.getElementById("navbar-dropdown-subnets-li");
let navbar_dropdown_table_routage_li = document.getElementById("navbar-dropdown-table-routage-li");
let navbar_dropdown_vpn_li = document.getElementById("navbar-dropdown-vpn-li");

let icon_menu = document.getElementById("icon-menu");
let show_more_elements_navbar_cloud = document.getElementById("show_more_elements_navbar_cloud");
let show_more_elements_navbar_vpc = document.getElementById("show_more_elements_navbar_vpc");
let show_more_elements_navbar_transit_gateway = document.getElementById("show_more_elements_navbar_transit_gateway");
let show_more_elements_navbar_subnets = document.getElementById("show_more_elements_navbar_subnets");
let show_more_elements_navbar_route_table = document.getElementById("show_more_elements_navbar_route_table");
let show_more_elements_navbar_vpn = document.getElementById("show_more_elements_navbar_vpn");

let navbar_dropdown_infos_elements = document.getElementById("navbar-dropdown-infos-elements");

let icon_menu_close_infos_element = document.getElementById("icon-menu-close-infos-element");
let vpc_info = document.getElementById("vpc_info");

let vpc_show_aws = document.getElementById("vpc_show_aws");

var icon_menu_click = false;

if (navbar_dropdown_vpn_li != null) {
    navbar_dropdown_vpn_li.addEventListener("mouseenter", function( event ) {
        if (icon_menu_click == true) {
            return;
        }
        navbar_dropdown_vpn.animate([
            { opacity: '0' },
            { opacity: '1' }
        ], {
            duration: 300,
        });
        navbar_dropdown_vpn.style.display = "flex";
    }, false);

    navbar_dropdown_vpn_li.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_vpn.style.display = "none";
    }, false);
    
    navbar_dropdown_vpn.addEventListener("mouseenter", function( event ) {
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            return;
        }
        navbar_dropdown_vpn.style.display = "flex";
    }, false);
    
    navbar_dropdown_vpn.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_vpn.style.display = "none";
    }, false);

    navbar_dropdown_vpn_li.addEventListener("click", function( event ) {
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            show_more_elements_navbar_cloud.style.display = "none";
        }
        if (show_more_elements_navbar_vpc.style.display == "flex") {
            show_more_elements_navbar_vpc.style.display = "none";
        }
        if (show_more_elements_navbar_transit_gateway.style.display == "flex") {
            show_more_elements_navbar_transit_gateway.style.display = "none";
        }
        if (show_more_elements_navbar_subnets.style.display == "flex") {
            show_more_elements_navbar_subnets.style.display = "none";
        }
        if (show_more_elements_navbar_route_table.style.display == "flex") {
            show_more_elements_navbar_route_table.style.display = "none";
        }

        show_more_elements_navbar_vpn.style.display = "flex";
    }, false);
}

if (navbar_dropdown_table_routage_li != null) {
    navbar_dropdown_table_routage_li.addEventListener("mouseenter", function( event ) {
        if (icon_menu_click == true) {
            return;
        }
        navbar_dropdown_route_table.animate([
            { opacity: '0' },
            { opacity: '1' }
        ], {
            duration: 300,
        });
        navbar_dropdown_route_table.style.display = "flex";
    }, false);

    navbar_dropdown_table_routage_li.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_route_table.style.display = "none";
    }, false);
    
    navbar_dropdown_route_table.addEventListener("mouseenter", function( event ) {
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            return;
        }
        navbar_dropdown_route_table.style.display = "flex";
    }, false);
    
    navbar_dropdown_route_table.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_route_table.style.display = "none";
    }, false);

    navbar_dropdown_table_routage_li.addEventListener("click", function( event ) {
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            show_more_elements_navbar_cloud.style.display = "none";
        }
        if (show_more_elements_navbar_vpc.style.display == "flex") {
            show_more_elements_navbar_vpc.style.display = "none";
        }
        if (show_more_elements_navbar_transit_gateway.style.display == "flex") {
            show_more_elements_navbar_transit_gateway.style.display = "none";
        }
        if (show_more_elements_navbar_subnets.style.display == "flex") {
            show_more_elements_navbar_subnets.style.display = "none";
        }
        if (show_more_elements_navbar_vpn.style.display == "flex") {
            show_more_elements_navbar_vpn.style.display = "none";
        }

        show_more_elements_navbar_route_table.style.display = "flex";
    }, false);
}

if (navbar_dropdown_subnets_li != null) {
    navbar_dropdown_subnets_li.addEventListener("mouseenter", function( event ) {
        if (icon_menu_click == true) {
            return;
        }
        navbar_dropdown_subnets.animate([
            { opacity: '0' },
            { opacity: '1' }
        ], {
            duration: 300,
        });
        navbar_dropdown_subnets.style.display = "flex";
    }, false);

    navbar_dropdown_subnets_li.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_subnets.style.display = "none";
    }, false);
    
    navbar_dropdown_subnets.addEventListener("mouseenter", function( event ) {
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            return;
        }
        navbar_dropdown_subnets.style.display = "flex";
    }, false);
    
    navbar_dropdown_subnets.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_subnets.style.display = "none";
    }, false);

    navbar_dropdown_subnets_li.addEventListener("click", function( event ) {
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            show_more_elements_navbar_cloud.style.display = "none";
        }
        if (show_more_elements_navbar_vpc.style.display == "flex") {
            show_more_elements_navbar_vpc.style.display = "none";
        }
        if (show_more_elements_navbar_transit_gateway.style.display == "flex") {
            show_more_elements_navbar_transit_gateway.style.display = "none";
        }
        if (show_more_elements_navbar_route_table.style.display == "flex") {
            show_more_elements_navbar_route_table.style.display = "none";
        }
        if (show_more_elements_navbar_vpn.style.display == "flex") {
            show_more_elements_navbar_vpn.style.display = "none";
        }

        show_more_elements_navbar_subnets.style.display = "flex";
    }, false);
}

if (navbar_dropdown_cloud_li != null) {
    navbar_dropdown_cloud_li.addEventListener("mouseenter", function( event ) {
        if (icon_menu_click == true) {
            return;
        }
        navbar_dropdown_cloud.animate([
            { opacity: '0' },
            { opacity: '1' }
        ], {
            duration: 300,
        });
        navbar_dropdown_cloud.style.display = "flex";
    }, false);

    navbar_dropdown_cloud_li.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_cloud.style.display = "none";
    }, false);
    
    navbar_dropdown_cloud.addEventListener("mouseenter", function( event ) {
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            return;
        }
        navbar_dropdown_cloud.style.display = "flex";
    }, false);
    
    navbar_dropdown_cloud.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_cloud.style.display = "none";
    }, false);

    navbar_dropdown_cloud_li.addEventListener("click", function( event ) {
        navbar_dropdown_subnets_li.style.display = "none";
        navbar_dropdown_table_routage_li.style.display = "none";
        navbar_dropdown_vpn_li.style.display = "none";
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_subnets.style.display == "flex") {
            show_more_elements_navbar_subnets.style.display = "none";
        }
        if (show_more_elements_navbar_vpc.style.display == "flex") {
            show_more_elements_navbar_vpc.style.display = "none";
        }
        if (show_more_elements_navbar_transit_gateway.style.display == "flex") {
            show_more_elements_navbar_transit_gateway.style.display = "none";
        }
        if (show_more_elements_navbar_route_table.style.display == "flex") {
            show_more_elements_navbar_route_table.style.display = "none";
        }
        if (show_more_elements_navbar_vpn.style.display == "flex") {
            show_more_elements_navbar_vpn.style.display = "none";
        }

        show_more_elements_navbar_cloud.style.display = "flex";
    }, false);
}


if (navbar_dropdown_vpc_li != null) {
    navbar_dropdown_vpc_li.addEventListener("mouseenter", function( event ) {
        if (icon_menu_click == true) {
            return;
        }
        navbar_dropdown_vpc.animate([
            { opacity: '0' },
            { opacity: '1' }
        ], {
            duration: 300,
        });
        navbar_dropdown_vpc.style.display = "flex";
    }, false);
    
    navbar_dropdown_vpc_li.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_vpc.style.display = "none";
    }, false);
    
    navbar_dropdown_vpc.addEventListener("mouseenter", function( event ) {
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            return;
        }
        navbar_dropdown_vpc.style.display = "flex";
    }, false);
    
    navbar_dropdown_vpc.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_vpc.style.display = "none";
    }, false);

    navbar_dropdown_vpc_li.addEventListener("click", function( event ) {
        console.log(navbar_dropdown_subnets_li.style.display);
        if (navbar_dropdown_subnets_li.style.display == "none" || navbar_dropdown_subnets_li.style.display == "" ) {
            navbar_dropdown_subnets_li.animate([
                { opacity: '0' },
                { opacity: '1' }
            ], {
                duration: 200,
            });
            navbar_dropdown_table_routage_li.animate([
                { opacity: '0' },
                { opacity: '1' }
            ], {
                duration: 200,
            });
            navbar_dropdown_vpn_li.animate([
                { opacity: '0' },
                { opacity: '1' }
            ], {
                duration: 200,
            });
            navbar_dropdown_subnets_li.style.display = "flex";
            navbar_dropdown_table_routage_li.style.display = "flex";
            navbar_dropdown_vpn_li.style.display = "flex";
        } else if (!icon_menu_click) {
            navbar_dropdown_subnets_li.style.display = "none";
            navbar_dropdown_table_routage_li.style.display = "none";
            navbar_dropdown_vpn_li.style.display = "none";
        }
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_subnets.style.display == "flex") {
            show_more_elements_navbar_subnets.style.display = "none";
        }
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            show_more_elements_navbar_cloud.style.display = "none";
        }
        if (show_more_elements_navbar_transit_gateway.style.display == "flex") {
            show_more_elements_navbar_transit_gateway.style.display = "none";
        }
        if (show_more_elements_navbar_route_table.style.display == "flex") {
            show_more_elements_navbar_route_table.style.display = "none";
        }
        if (show_more_elements_navbar_vpn.style.display == "flex") {
            show_more_elements_navbar_vpn.style.display = "none";
        }

        show_more_elements_navbar_vpc.style.display = "flex";
    }, false);
}


if (navbar_dropdown_transit_gateway_li != null) {
    navbar_dropdown_transit_gateway_li.addEventListener("mouseenter", function( event ) {
        if (icon_menu_click == true) {
            return;
        }
        navbar_dropdown_transit_gateway.animate([
            { opacity: '0' },
            { opacity: '1' }
        ], {
            duration: 300,
        });
        navbar_dropdown_transit_gateway.style.display = "flex";
    }, false);
    
    navbar_dropdown_transit_gateway_li.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_transit_gateway.style.display = "none";
    }, false);
    
    navbar_dropdown_transit_gateway.addEventListener("mouseenter", function( event ) {
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            return;
        }
        navbar_dropdown_transit_gateway.style.display = "flex";
    }, false);
    
    navbar_dropdown_transit_gateway.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_transit_gateway.style.display = "none";
    }, false);

    navbar_dropdown_transit_gateway_li.addEventListener("click", function( event ) {
        navbar_dropdown_subnets_li.style.display = "none";
        navbar_dropdown_table_routage_li.style.display = "none";
        navbar_dropdown_vpn_li.style.display = "none";
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_subnets.style.display == "flex") {
            show_more_elements_navbar_subnets.style.display = "none";
        }
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            show_more_elements_navbar_cloud.style.display = "none";
        }
        if (show_more_elements_navbar_vpc.style.display == "flex") {
            show_more_elements_navbar_vpc.style.display = "none";
        }
        if (show_more_elements_navbar_route_table.style.display == "flex") {
            show_more_elements_navbar_route_table.style.display = "none";
        }
        if (show_more_elements_navbar_vpn.style.display == "flex") {
            show_more_elements_navbar_vpn.style.display = "none";
        }

        show_more_elements_navbar_transit_gateway.style.display = "flex";
    }, false);
}

let account_top_right = document.getElementById("account_top_right");
let navbar_dropdown_account = document.getElementById("navbar-dropdown-account");

if (account_top_right != null) {
    account_top_right.addEventListener("click", function( event ) {
        if (navbar_dropdown_account.style.display != "flex") {
            navbar_dropdown_account.animate([
                { opacity: '0' },
                { opacity: '1' }
            ], {
                duration: 300,
            });
            navbar_dropdown_account.style.display = "flex";
        } else {
            navbar_dropdown_account.style.display = "none";
        }
    }, false);
}

document.addEventListener('click', function handleClickOutsideBox(event) {
    if (!account_top_right.contains(event.target) && !navbar_dropdown_account.contains(event.target)) {
        navbar_dropdown_account.style.display = 'none';
    }

    if (!navbar_dropdown_infos_elements.contains(event.target)) {
        if (vpc_info != null) {
            if (!vpc_info.contains(event.target)) {
                navbar_dropdown_infos_elements.style.display = 'none';
            }
        } else {
            navbar_dropdown_infos_elements.style.display = 'none';
        }
    }
});

if (icon_menu != null) {
    icon_menu.addEventListener("click", function( event ) {
        if (icon_menu_click == false) {
            icon_menu_click = true;
        } else {
            icon_menu_click = false;
        }
        if (icon_menu_click) {
            show_more_elements_navbar_cloud.animate([
                { opacity: '0' },
                { opacity: '1' }
            ], {
                duration: 300,
            });
            
            show_more_elements_navbar_cloud.style.display = "flex";
            if (vpc_show_aws) {
                vpc_show_aws.animate([
                    { transform: 'translateX(240px)' },
                ], {
                    duration: 150,
                });
                setTimeout(function() {
                    vpc_show_aws.style.marginLeft = "330px";
                    vpc_show_aws.style.width = "1560px";
                }, 150);
            }
        } else {
            show_more_elements_navbar_cloud.style.display = "none";
            show_more_elements_navbar_vpc.style.display = "none";
            show_more_elements_navbar_transit_gateway.style.display = "none";
            show_more_elements_navbar_subnets.style.display = "none";
            show_more_elements_navbar_route_table.style.display = "none";
            show_more_elements_navbar_vpn.style.display = "none";
            if (vpc_show_aws) {
                vpc_show_aws.style.marginLeft = "90px";
                vpc_show_aws.style.width = "1800px";
            }
        }
    }, false);
}

if (icon_menu_close_infos_element != null) {
    icon_menu_close_infos_element.addEventListener("click", function( event ) {
        if (navbar_dropdown_infos_elements != null && navbar_dropdown_infos_elements.style.display == "flex") {
            navbar_dropdown_infos_elements.style.display = "none";
            if (vpc_show_aws) {
                vpc_show_aws.style.marginLeft = "90px";
                vpc_show_aws.style.width = "1800px";
            }
        }
    }, false);
}
