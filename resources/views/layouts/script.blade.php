
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Get all links that have a href attribute starting with '#'
    const menuLinks = document.querySelectorAll('a[href^="#"]');

    menuLinks.forEach(function(menuLink) {
        const submenuId = menuLink.getAttribute('href').substring(1); // Remove the '#' to get the submenu ID
        const subMenu = document.getElementById(submenuId);

        // Initially check if the submenu hash exists in the URL and open the corresponding menu
        if (window.location.hash === "#" + submenuId) {
            subMenu.style.display = "block"; // Show the submenu if the hash is present
        }

        // Add click event listener to each menu link
        menuLink.addEventListener("click", function(e) {
            e.preventDefault();

            // Toggle visibility of the corresponding submenu
            if (subMenu.style.display === "block") {
                subMenu.style.display = "none"; // Hide if it's currently visible
            } else {
                subMenu.style.display = "block"; // Show if it's currently hidden
            }

            // Update the URL hash
            window.location.hash = subMenu.style.display === "block" ? submenuId : "";
        });
    });
});
 
</script>
@endpush