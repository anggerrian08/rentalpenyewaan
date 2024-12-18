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
        var sync3 = $("#sync3");
        var sync4 = $("#sync4");
        var slidesPerPage = 4;
        var syncedSecondary = true;
        sync3
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
        sync4
          .on("initialized.owl.carousel", function () {
            sync4.find(".owl-item").eq(0).addClass("current");
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
          sync4
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
          var onscreen = sync4.find(".owl-item.active").length - 1;
          var start = sync4.find(".owl-item.active").first().index();
          var end = sync4.find(".owl-item.active").last().index();
          if (current > end) {
            sync4.data("owl.carousel").to(current, 100, true);
          }
          if (current < start) {
            sync4.data("owl.carousel").to(current - onscreen, 100, true);
          }
        }
        function syncPosition2(el) {
          if (syncedSecondary) {
            var number = el.item.index;
            sync3.data("owl.carousel").to(number, 100, true);
          }
        }
        sync4.on("click", ".owl-item", function (e) {
          e.preventDefault();
          var number = $(this).index();
          sync3.data("owl.carousel").to(number, 300, true);
        });
      },
    };
    ecommerce_product.init();
  
    var ecommerce_product2 = {
      init: function () {
        var sync3 = $("#sync3-rtl");
        var sync4 = $("#sync4-rtl");
        var slidesPerPage = 4;
        var syncedSecondary = true;
        sync3
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
        sync4
          .on("initialized.owl.carousel", function () {
            sync4.find(".owl-item").eq(0).addClass("current");
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
          sync4
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
          var onscreen = sync4.find(".owl-item.active").length - 1;
          var start = sync4.find(".owl-item.active").first().index();
          var end = sync4.find(".owl-item.active").last().index();
          if (current > end) {
            sync4.data("owl.carousel").to(current, 100, true);
          }
          if (current < start) {
            sync4.data("owl.carousel").to(current - onscreen, 100, true);
          }
        }
        function syncPosition2(el) {
          if (syncedSecondary) {
            var number = el.item.index;
            sync3.data("owl.carousel").to(number, 100, true);
          }
        }
        sync4.on("click", ".owl-item", function (e) {
          e.preventDefault();
          var number = $(this).index();
          sync3.data("owl.carousel").to(number, 300, true);
        });
      },
    };
    ecommerce_product2.init();
  })(jQuery);

//  Total Sale

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
    colors: ['#2B5F60'], 
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

// sales-details

var options = {
  series: [{
      name: 'TEAM A',
      type: 'area',
      data: [60, 80, 20, 90, 10, 30, 100, 10]
  }, {
      name: 'TEAM B',
      type: 'line',
      data: [100, 0, 100, 50, 30, 100, 10, 20]
  }],  
  chart: { 
    height: 325,
    type: 'line',
    toolbar: {
      show: false,
    },
    dropShadow: {
      enabled: true,
      top: 3,
      // left: 1,
      blur: 4,
      color: [ZonoAdminConfig.primary, '#C06240'],
      opacity: 0.3
    },
  },
  stroke: {
    curve: ['straight','smooth'],
    width: [3, 2],
    dashArray: [0, 4]

  },
  grid: {
    show: true,
  },
  fill: {
      type: 'solid',
      opacity: [0, 1],
  },

  responsive: [
      {
        breakpoint: 991,
        options: {
            chart: {
                height: 300
            }
        }
      },
      {
        breakpoint: 1500,
        options: {
            chart: {
                height: 325
            }
        }
      }
  ],
  tooltip: {
    shared: true,
    intersect: false,
    y: {
        formatter: function (y) {
            if (typeof y !== "undefined") {
                return y.toFixed(0) + " points";
            }
            return y;
        }
    }
  },
  annotations: {
    xaxis: [{
        x: 320,
        strokeDashArray: 3,
        borderWidth: 1, 
        borderColor: '#072448',
    },
    ],
    points: [{
        x: 320,
        y: 330,
        marker: {
            size: 8,
            fillColor: ZonoAdminConfig.primary,
            strokeColor: "#ffffff",
            strokeWidth: 4,
            radius: 5,
        },
        label: {
            borderWidth: 1,
            offsetY: 0,
            text: '32.10k',
            style: {
                fontSize: '14px',
                fontWeight: '600',
                fontFamily: 'Nunito Sans ,sans-serif',
            }
        }
    }],
  },
  legend: {
      show: false,
  },
  colors: [ZonoAdminConfig.primary, ZonoAdminConfig.secondary],
  xaxis: {
    labels: {
        style: {
          fontFamily: 'Nunito Sans ,sans-serif',
          fontWeight: 500,
          colors: '#8D8D8D',
        },
    },
    axisBorder: {
      show: false
    },
  },
  yaxis: {
    labels: {
      formatter: function (value) {
          return value + "k";
      },
      style: {
          fontFamily: 'Nunito Sans ,sans-serif',
          fontWeight: 500,
          colors: '#3D434A',
      },
    },
  },
  responsive: [
    {
      breakpoint: 576,
      options: {
          series: [{
              name: 'TEAM A',
              type: 'area',
              data: [ 50, 60, 180, 90, 340, 120, 250, 190, 100, 180, 380, 190, 220, 100, 90, 140]
          }, {
              name: 'TEAM B',
              type: 'line',
              data: [70, 30, 100, 120, 220, 250, 100, 200, 300, 330, 270, 300, 200, 180, 220, 130]
          }],
      }
    }, 
  ]
};
var chart = new ApexCharts(document.querySelector("#chart-dash-2-line"), options);
chart.render();