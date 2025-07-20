<script crossorigin="anonymous">
    var closeMenuButton = document.getElementById("closeMenuButton");
    var openMenuButton = document.getElementById("menuButton");
    var toggleTopMenu = document.getElementById("overlayMenu");

    openMenuButton.addEventListener("click", function () {
        toggleTopMenu.style.display = "block";
    });
    
    closeMenuButton.addEventListener("click", function() {
        toggleTopMenu.style.display = "none";
    });
</script>