$(document.body).css("zoom", document.body.clientWidth / 1920);

// resize event
window.addEventListener("resize", function () {
    $(document.body).css("zoom", document.body.clientWidth / 1920);
});

let navbar_dropdown_cloud = document.getElementById("navbar-dropdown-cloud");
let navbar_dropdown_vpc = document.getElementById("navbar-dropdown-vpc");
let navbar_dropdown_transit_gateway = document.getElementById("navbar-dropdown-transit-gateway");

let navbar_dropdown_cloud_li = document.getElementById("navbar-dropdown-cloud-li");
let navbar_dropdown_vpc_li = document.getElementById("navbar-dropdown-vpc-li");
let navbar_dropdown_transit_gateway_li = document.getElementById("navbar-dropdown-transit-gateway-li");

let icon_menu = document.getElementById("icon-menu");
let show_more_elements_navbar_cloud = document.getElementById("show_more_elements_navbar_cloud");
let show_more_elements_navbar_vpc = document.getElementById("show_more_elements_navbar_vpc");
let show_more_elements_navbar_transit_gateway = document.getElementById("show_more_elements_navbar_transit_gateway");

let vpc_show_aws = document.getElementById("vpc_show_aws");

var icon_menu_click = false;

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
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_vpc.style.display == "flex") {
            show_more_elements_navbar_vpc.style.display = "none";
        }
        if (show_more_elements_navbar_transit_gateway.style.display == "flex") {
            show_more_elements_navbar_transit_gateway.style.display = "none";
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
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            show_more_elements_navbar_cloud.style.display = "none";
        }
        if (show_more_elements_navbar_transit_gateway.style.display == "flex") {
            show_more_elements_navbar_transit_gateway.style.display = "none";
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
        if (!icon_menu_click) {
            return;
        }
        if (show_more_elements_navbar_cloud.style.display == "flex") {
            show_more_elements_navbar_cloud.style.display = "none";
        }
        if (show_more_elements_navbar_vpc.style.display == "flex") {
            show_more_elements_navbar_vpc.style.display = "none";
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
});

if (icon_menu != null) {
    icon_menu.addEventListener("click", function( event ) {
        if (icon_menu_click == false) {
            icon_menu_click = true;
        } else {
            icon_menu_click = false;
        }
        if (show_more_elements_navbar_cloud.style.display != "flex") {
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
            if (vpc_show_aws) {
                vpc_show_aws.style.marginLeft = "90px";
                vpc_show_aws.style.width = "1800px";
            }
        }
    }, false);
}
