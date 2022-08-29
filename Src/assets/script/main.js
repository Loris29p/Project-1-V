let navbar_dropdown_cloud = document.getElementById("navbar-dropdown-cloud");
let navbar_dropdown_cloud_li = document.getElementById("navbar-dropdown-cloud-li");

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