(function ($) {
  var updatingChart = $(".updating-chart").peity("line");

  setInterval(function () {
    var random = Math.round(Math.random() * 10);
    var values = updatingChart.text().split(",");
    values.shift();
    values.push(random);

    updatingChart.text(values.join(",")).change();
  }, 1000);

  $(".line").peity("line");

  $(".bar").peity("bar");

  $(".donut").peity("donut");

  $(".data-attributes span").peity("donut");

  $("span.pie").peity("pie");

  $(".bar-colours-1").peity("bar", {
    fill: [ZonoAdminConfig.primary, ZonoAdminConfig.secondary, "#51bb25"],
    width: "100",
    height: "82",
  });

  $(".bar-colours-2").peity("bar", {
    fill: function (value) {
      return value > 0 ? ZonoAdminConfig.primary : ZonoAdminConfig.secondary;
    },
    width: "100",
    height: "82",
  });

  $(".bar-colours-3").peity("bar", {
    fill: function (_, i, all) {
      var g = parseInt((i / all.length) * 94);
      return "rgb(23, " + g + ", 94)";
    },

    width: "100",
    height: "82",
  });

  $(".pie-colours-1").peity("pie", {
    fill: [
      ZonoAdminConfig.primary,
      ZonoAdminConfig.secondary,
      "#51bb25",
      "#f8d62b",
    ],
    width: "100",
    height: "82",
  });
})(jQuery);
