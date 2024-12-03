(function () {
  var primary = localStorage.getItem("primary") || "#2B5F60";
  var secondary = localStorage.getItem("secondary") || "#C06240";

  window.ZonoAdminConfig = {
    // Theme Primary Color
    primary: primary, 
    // theme secondary color
    secondary: secondary,
  };
})();
