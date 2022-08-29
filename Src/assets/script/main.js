let navbar_dropdown_cloud = document.getElementById("navbar-dropdown-cloud");
let navbar_dropdown_vpc = document.getElementById("navbar-dropdown-vpc");
let navbar_dropdown_transit_gateway = document.getElementById("navbar-dropdown-transit-gateway");

let navbar_dropdown_cloud_li = document.getElementById("navbar-dropdown-cloud-li");
let navbar_dropdown_vpc_li = document.getElementById("navbar-dropdown-vpc-li");
let navbar_dropdown_transit_gateway_li = document.getElementById("navbar-dropdown-transit-gateway-li");

navbar_dropdown_cloud_li.addEventListener("mouseenter", function( event ) {
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
    navbar_dropdown_cloud.style.display = "flex";
}, false);

navbar_dropdown_cloud.addEventListener("mouseleave", function( event ) {
    navbar_dropdown_cloud.style.display = "none";
}, false);


if (navbar_dropdown_vpc_li != null) {
    navbar_dropdown_vpc_li.addEventListener("mouseenter", function( event ) {
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
        navbar_dropdown_vpc.style.display = "flex";
    }, false);
    
    navbar_dropdown_vpc.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_vpc.style.display = "none";
    }, false);
}


if (navbar_dropdown_transit_gateway_li != null) {
    navbar_dropdown_transit_gateway_li.addEventListener("mouseenter", function( event ) {
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
        navbar_dropdown_transit_gateway.style.display = "flex";
    }, false);
    
    navbar_dropdown_transit_gateway.addEventListener("mouseleave", function( event ) {
        navbar_dropdown_transit_gateway.style.display = "none";
    }, false);
}