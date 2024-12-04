/*=======/Sales Stats Radial Chart/=======*/
const salesStatsOption = {
  series: [70],
  chart: {
    height: 370,
    type: 'radialBar',
    offsetY: 0,
  },
 
  stroke: {
    dashArray: 25,
    curve: 'smooth',
    lineCap: 'round',
  },
  grid: {
    padding: {
      top: 0,
      left: 0,
      right: 0,
      bottom: 0, 
    },
  },
  plotOptions: {
    radialBar: {
      startAngle: 0,
      endAngle: 360,
      hollow: { 
        size: '75%',
        image: '../assets/images/apexchart/radial-image.png',
        imageWidth: 140,
        imageHeight: 140, 
        imageClipped: false,
      },
      track: { 
        show: true,
        background: 'rgba(43, 94, 94, 0.1)',
        strokeWidth: '97%',
        opacity: 0.4,
      },
      dataLabels: {
        show: true,
        name: {
          show: true,
          fontSize: '16px',
          fontFamily: undefined,
          fontWeight: 600,
          color: undefined,
          offsetY: -10,
        },
        value: {
          show: true, 
          // ...fontCommon,
          colors: '#848789',
          fontFamily: '"Nunito Sans", sans-serif',
          fontWeight: 600,
          fontSize: '20px', 
          color: '#292929',
          offsetY: 6,
          formatter: function (val) {
            return val + '%';
          },
        },
      },
    },
  },
  labels: ['New: 2.4k' , 'Returning: 3.2k'],
  colors: ['var(--theme-default)' , 'rgba(43, 94, 94, 0.1)'], 
  legend: { 
    show: true, 
    position: 'bottom',
    // ...fontCommon,
    colors: '#848789',
    fontSize: '14px',
    fontFamily: '"Nunito Sans", sans-serif',
    fontWeight: 600,
    markers: {
      width: 18,
      height: 18,
      strokeWidth: 5, 
      colors: '#fff',
      strokeColors: 'rgba(43, 94, 94, 0.1)', 
      radius: 20,
    },
    onItemClick: {
      toggleDataSeries: false,
    },
    onItemHover: {
      highlightDataSeries: false,
    },
  },
  responsive: [
    {
      breakpoint: 1600,
      options: {
        plotOptions: {
          radialBar: { 
            hollow: {
              size: '68%',
              imageWidth: 140,
              imageHeight: 140,
            },
            dataLabels: {
              name: {
                fontSize: '14px',
                offsetY: -8,
              },
              value: {
                fontSize: '18px',
              },
            },
          },
        },
      },
    },
    {
      breakpoint: 676,
      options: {
        chart: {
          height: 350,
        },
        plotOptions: {
          radialBar: {
            hollow: {
              size: '68%',
            },
          },
        },
      },
    },
    {
      breakpoint: 576,
      options: {
        chart: {
          height: 320,
        },
        plotOptions: {
          radialBar: {
            hollow: {
              size: '70%',
              imageWidth: 120,
              imageHeight: 120,
            },
          },
        },
      },
    },
    {
      breakpoint: 531,
      options: {
        chart: {
          height: 300,
        },
        plotOptions: {
          radialBar: {
            hollow: {
              size: '70%',
              imageWidth: 100,
              imageHeight: 100,
            },
          },
        },
      },
    },
    {
      breakpoint: 426,
      options: {
        chart: {
          height: 280,
        },
        plotOptions: {
          radialBar: {
            hollow: {
              size: '70%',
              imageWidth: 100,
              imageHeight: 100,
            },
          },
        },
      },
    },
  ],
};

const salesStatsChartsEl = new ApexCharts(document.querySelector('#salesStatsRadialCharts'), salesStatsOption);
salesStatsChartsEl.render();

/*=======/ Social Media Statics Chart /=======*/


var optionsoverview = {
  series: [
    {
      name: "Earning",
      type: "area",
      data: [0, 20, 70, 25, 100, 45, 25],
    },
    {
      name: "Order", 
      type: "area", 
      data: [0, 50, 40, 90, 60, 120, 150],
    },
  ],
  chart: {
    height: 310,
    type: "line",
    stacked: false,
    toolbar: {
      show: false, 
    },
    dropShadow: {
      enabled: true,
      top: 2,
      left: 0,
      blur: 4,
      color: "#000",
      opacity: 0.08,
    },
  },
  stroke: {
    width: [2, 2, 2],  
    curve: "straight",
  },
  grid: {
    show: true,
    borderColor: "var(--chart-border)",
    strokeDashArray: 0,
    position: "back",
    xaxis: {
      lines: {
        show: false,
      },
    },
    yaxis: {
      lines: {
        show: false,
      },
    },
  },
  plotOptions: {
    bar: {
      columnWidth: "50%",
    }, 
  }, 
  colors: [ZonoAdminConfig.primary ,ZonoAdminConfig.secondary],
  fill: { 
    type: "gradient",
    gradient: {
      shade: "light",
      type: "vertical",
      opacityFrom: 0.4,
      opacityTo: 0,
      stops: [0, 100],
    },
  }, 
  labels: [
    "Mon",
    "Tue",
    "Wed",
    "Thu",
    "Fri",
    "Sat",
    "Sun",
  ],
  markers: {
    size: 5
  },
  xaxis: {
    type: "category",
    tickAmount: 4,
    tickPlacement: "between",
    tooltip: {
      enabled: false,
    },
    axisTicks: {
      show: false,
    },
    axisBorder: {  
      color: 'var(--light-bg)'
    },
  },
  legend: {
    show: false,
  },
  yaxis: {
    show: false,
    min: 0,
    tickAmount: 6,
    tickPlacement: "between",
  },
  tooltip: {
    shared: false,
    intersect: false,
  },
  responsive: [
    {
      breakpoint: 1299,
      options: {
        chart: {
          height: 310,
        },
        series: [
          {
            name: "Earning", 
            type: "area",
            data: [0, 20, 70, 25, 100],
          },
          {
            name: "Order",
            type: "area",
            data: [0, 50, 40, 90, 60],
          },
        ],
      },
    },
  ],
};

var chartoverview = new ApexCharts(
  document.querySelector("#orderoverview"),
optionsoverview
);
chartoverview.render();

// Weekly User Activity

var options = {
  chart: { 
    height: 350,
    type: "radialBar" 
  },
  series: [67],
  colors: [ZonoAdminConfig.primary],
  plotOptions: {
    radialBar: {
      hollow: {
          size: "57%"
      },
      track: {
        background: 'rgba(43, 94, 94, 0.1)', 
      },
      dataLabels: {
          showOn: "always",
          name: {
           // offsetY: -10,
            show: true, 
            color: "#848789",
            fontSize: "20px",
            fontWeight: "600", 
          },
          value: { 
            color: "#1f2f3e",
            fontSize: "30px",
            fontWeight: "800",
            show: true 
          }
      }
    }
  },
  stroke: {
    lineCap: "round",
  },
  responsive: [{ 
    breakpoint: 360,
    options: {
      chart: {
        height: 250,
      }
    }
  }], 
  labels: ["Progress"]
  };
var UserActivity = new ApexCharts(document.querySelector("#UserActivity"), options);
UserActivity.render();

//    slider js

(function ($) {
  "use strict";

  var ecommerce_product = {
    init: function () {
      var sync5 = $("#sync5");
      var sync6 = $("#sync6");
      var slidesPerPage = 4;
      var syncedSecondary = true;
      sync5
        .owlCarousel({
          items: 1,
          slideSpeed: 2000,
          nav: false,
          autoplay: true,
          dots: false,
          loop: true,
          responsiveRefreshRate: 200,
        })
        .on("changed.owl.carousel", syncPosition);
      sync6
        .on("initialized.owl.carousel", function () {
          sync6.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
          items: slidesPerPage,
          dots: false,
          nav: false,
          smartSpeed: 200,
          slideSpeed: 500,
          slideBy: slidesPerPage,
          responsiveRefreshRate: 100,
          margin: 15,
        })
        .on("changed.owl.carousel", syncPosition2);
      function syncPosition(el) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
        if (current < 0) {
          current = count;
        }
        if (current > count) {
          current = 0;
        }
        sync6
          .find(".owl-item")
          .removeClass("current")
          .eq(current)
          .addClass("current");
        var onscreen = sync6.find(".owl-item.active").length - 1;
        var start = sync6.find(".owl-item.active").first().index();
        var end = sync6.find(".owl-item.active").last().index();
        if (current > end) {
          sync6.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
          sync6.data("owl.carousel").to(current - onscreen, 100, true);
        }
      }
      function syncPosition2(el) {
        if (syncedSecondary) {
          var number = el.item.index;
          sync5.data("owl.carousel").to(number, 100, true);
        }
      }
      sync6.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        sync5.data("owl.carousel").to(number, 300, true);
      });
    },
  };
  ecommerce_product.init();

  var ecommerce_product2 = {
    init: function () {
      var sync5 = $("#sync5-rtl");
      var sync6 = $("#sync6-rtl");
      var slidesPerPage = 4;
      var syncedSecondary = true;
      sync5
        .owlCarousel({
          rtl: true,
          items: 1,
          slideSpeed: 2000,
          nav: false,
          autoplay: true,
          dots: false,
          loop: true,
          responsiveRefreshRate: 200,
        })
        .on("changed.owl.carousel", syncPosition);
      sync6
        .on("initialized.owl.carousel", function () {
          sync6.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
          rtl: true,
          items: slidesPerPage,
          dots: false,
          nav: false,
          smartSpeed: 200,
          slideSpeed: 500,
          slideBy: slidesPerPage,
          responsiveRefreshRate: 100,
          margin: 15,
        })
        .on("changed.owl.carousel", syncPosition2);
      function syncPosition(el) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);
        if (current < 0) {
          current = count;
        }
        if (current > count) {
          current = 0;
        }
        sync6
          .find(".owl-item")
          .removeClass("current")
          .eq(current)
          .addClass("current");
        var onscreen = sync6.find(".owl-item.active").length - 1;
        var start = sync6.find(".owl-item.active").first().index();
        var end = sync6.find(".owl-item.active").last().index();
        if (current > end) {
          sync6.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
          sync6.data("owl.carousel").to(current - onscreen, 100, true);
        }
      }
      function syncPosition2(el) {
        if (syncedSecondary) {
          var number = el.item.index;
          sync5.data("owl.carousel").to(number, 100, true);
        }
      }
      sync6.on("click", ".owl-item", function (e) { 
        e.preventDefault();
        var number = $(this).index();
        sync5.data("owl.carousel").to(number, 300, true);
      });
    },
  };
  ecommerce_product2.init();
})(jQuery);


/*=======/latestSales-chart/=======*/
var options = {
  series: [{
    name: 'TEAM A',
    type: 'area',  
    data: ['0', '5','6', '11', '12', '14', '18', '18', '22', '30'],
  },],
  colors: ['rgba(43, 95, 96, 0.3)'], 
  chart: { 
    height: 142,
    type: 'line',
    toolbar: {
      show: false,
    }
    
  },
  grid: {
    show: false,
  },
  stroke: {
    curve: 'straight',
    colors: [ZonoAdminConfig.primary],  
  },
  fill: {
    type: 'solid',
    opacity: [1, 0.02],
    type: 'pattern',
    pattern: {
      style: ['verticalLines', 'horizontalLines'],
      width: 15,
      height: 1,
      strokeWidth: 15, 
    },
  },
  markers: {
    discrete: [{
      seriesIndex: 0,
      dataPointIndex: 9,
      fillColor: '#fff',
      strokeColor: '#2B5F60',
      size: 6, 
      shape: "circle"
    },]
  },
  xaxis: { 
    categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
    labels: {
      minHeight: undefined,
      maxHeight: 24,
      offsetX: 0,
      offsetY: 0,
      style: { 
        colors: '#848789',
        fontWeight: 400,
      },
      tooltip: {
        enabled: false,
      },
    },
  },
  yaxis: [{
    show : false,
  }], 
  tooltip: {
    shared: true,
    intersect: false,
    y: {
      formatter: function (y) {
        if (typeof y !== "undefined") {
          return y.toFixed('$100') + " points";
        }
        return y;
      }
    }
  },
  responsive: [
    {
      breakpoint: 1599,
      options: {
        chart: {
          height: 140,
        },
      },
    },
    {
      breakpoint: 1499,
      options: {
        chart: {
          height: 150,
        },
      },
    },
    {
      breakpoint: 1399,
      options: {
        chart: {
          height: 140,
        },
      },
    },
    {
      breakpoint: 1200,
      options: {
        chart: {
          height: 130,
        },
      },
    },
    {
      breakpoint: 1096,
      options: {
        chart: {
          height: 140,
        },
      },
    },
    {
      breakpoint: 1025,
      options: {
        chart: {
          height: 160,
        },
      },
    }, 
    {
      breakpoint: 991,
      options: {
        chart: {
          height: 170,
        },
      },
    },
  ],
};
var chart = new ApexCharts(document.querySelector("#latestSales-chart"), options);
chart.render(); 