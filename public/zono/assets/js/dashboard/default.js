/*=======/ Last Orders /=======*/
const lastOrdersOption = {
  series: [
    {
      data: [
        {
          x: 'Jan',
          y: [210, 400],
        },
        {
          x: 'Feb',
          y: [300, 490],
        },
        {
          x: 'Mar',
          y: [350, 500],
        },
        {
          x: 'Apr',
          y: [210, 390],
        },
        {
          x: 'May',
          y: [280, 400],
        },
        {
          x: 'Jun',
          y: [110, 250],
        },
        {
          x: 'Jul',
          y: [210, 400],
        },
        {
          x: 'Aug',
          y: [290, 390],
        },
        {
          x: 'Sep',
          y: [250, 490],
        },
        {
          x: 'Oct',
          y: [210, 390],
        },
        {
          x: 'Nov',
          y: [190, 310],
        },
        {
          x: 'Dec',
          y: [250, 450],
        },
      ],
    },
  ],
  chart: {
    type: 'rangeBar',
    height: 300,  
    offsetY: 13,
    toolbar: {
      show: false,
    },
  },
  legend: {
    show: false,
    markers: {
      width: 6,
      height: 6,
      radius: 12, 
    },
  },
  grid: {
    show: true,
    borderColor: '#F5F5F5', 
    position: 'back',

    xaxis: {
      lines: {
        show: true,
      },
    },
    yaxis: {
      lines: {
        show: false,
      },
    },
  },
  tooltip: {
    enabled: false,
  },
  colors: ['var(--theme-default)'],
  plotOptions: {
    bar: {
      borderRadius: 7,
      horizontal: false, 
      columnWidth: '20%', 
    },
  },
  dataLabels: {
    enabled: false,
  },

  yaxis: {
    labels: {
      show: true,
      align: 'right',
      style: {
      //   ...fontCommon,
          colors: '#848789',
          fontSize: '14px',
          fontFamily: '"Nunito Sans", sans-serif',
          fontWeight: 600,
      }, 

      formatter: (value) => { 
        return `${value}k`;
      },
    },
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    labels: {
      minHeight: undefined,
      maxHeight: 24,
      offsetX: 0,
      offsetY: 0,
      style: {
        fontWeight: 400,
        colors: '#848789',
        fontSize: '14px',
        fontFamily: '"Nunito Sans", sans-serif',
      },
      tooltip: {
        enabled: false,
      },
    },
    // axisBorder: {
    //   show: false,
    // },
    axisTicks: {
      show: false,
    },
    axisBorder: { 
      color: 'var(--light-bg)'
    },
  },
  responsive: [
    {
      breakpoint: 1600,
      options: {
        chart: {
          height: 295,
        },
        series: [
          {
            data: [ 
              {
                x: 'Jan',
                y: [210, 400],
              },
              {
                x: 'Feb',
                y: [300, 490],
              },
              {
                x: 'Mar',
                y: [350, 500],
              },
              {
                x: 'Apr',
                y: [210, 390],
              },
              {
                x: 'May',
                y: [280, 400],
              },
              {
                x: 'Jun',
                y: [110, 250],
              },
              {
                x: 'Jul',
                y: [210, 400],
              },
            ],
          },
        ],
      },
    },
    {
      breakpoint: 992,
      options: {
        chart: {
          height: 270,
        },
        series: [
          {
            data: [ 
              {
                x: 'Jan',
                y: [210, 400],
              },
              {
                x: 'Feb',
                y: [300, 490],
              },
              {
                x: 'Mar',
                y: [350, 500],
              },
              {
                x: 'Apr',
                y: [210, 390],
              },
              {
                x: 'May',
                y: [280, 400],
              },
            ],
          },
        ],
      },
    },
    {
      breakpoint: 676,
      options: {
        chart: {
          height: 250,
        },
      },
    },
    {
      breakpoint: 576,
      options: {
        chart: {
          height: 200,
        },
        xaxis: {
          labels: {
            maxHeight: 30,
            offsetX: 0,
            offsetY: 0,
            rotate: -45,
            rotateAlways: true,
            style: {
              fontSize: '14px',
            },
          },
        },
        yaxis: {
          labels: {
            show: true,
            align: 'right',
            minWidth: 0,
            maxWidth: 34,
            style: { 
              fontSize: '14px',
            }, 
            formatter: (value) => {
              console.log('Formatter called with value:', value);
              return `${value}k`;
            },
          },
        },
      },
    },
    {
      breakpoint: 376,
      options: {
        chart: {
          height: 200,
        },
        xaxis: {
          labels: {
            maxHeight: 34,
            rotate: -70,
          },
        },
        yaxis: {
          labels: {
            show: true,
            align: 'right',
            minWidth: 0,
            maxWidth: 31,
            style: {
              fontSize: '13px',
            },
          }, 
        },
      }, 
    },
  ],
};

const lastOrdersChartEl = new ApexCharts(document.querySelector('#lastOrdersChart'), lastOrdersOption);
lastOrdersChartEl.render();



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
      startAngle: -135,
      endAngle: 135, 
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
      strokeColors:'rgba(43, 95, 96 ,0.03)',
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
        chart: {
          height: 600,
        },
        plotOptions: {
          radialBar: { 
            hollow: {
              size: '70%',
              imageWidth: 110,
              imageHeight: 110,
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

const salesStatsChartEl = new ApexCharts(document.querySelector('#salesStatsRadialChart'), salesStatsOption);
salesStatsChartEl.render();



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
      size: 5,
      
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
        // show: false,
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

/*=======/ Project Summary /=======*/

const groupChartOption = {
  series: [
    {
      name: 'Good',
      data: [170, 250, 350, 150, 230, 120, 330, 350, 280, 300, 250, 110],
    },
    {
      name: 'Very Good',
      data: [290, 180, 120, 290, 370, 250, 230, 200, 140, 220, 220, 330],
    },
  ],
  colors: [ZonoAdminConfig.primary ,ZonoAdminConfig.secondary],
  chart: {
    type: 'bar',
    height: 305,
    width: '100%',
    offsetY: 10,
    offsetX: 0,
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      horizontal: false,
      dataLabels: {
        position: 'top',
      },
    },
  },

  grid: {
    show: false,
    padding: {
      left: -8,
      right: 0,
    },
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    bar: {
      horizontal: false,
      borderRadius: 4, 
      columnWidth: '45%',
      barHeight: '100%',
      s̶t̶a̶r̶t̶i̶n̶g̶S̶h̶a̶p̶e̶: 'rounded',
      e̶n̶d̶i̶n̶g̶S̶h̶a̶p̶e̶: 'rounded',
    },
  },

  stroke: {
    show: true,
    width: 1, 
    colors: ['var(--recent-chart-bg)'],
  },
  tooltip: {
    shared: true,
    intersect: false,
    x: {
      show: true,
      format: 'dd MMM',
      formatter: undefined,
    },
    y: {
      show: false,
    },
  },
  yaxis: {
    show: false,
    min: 0,
    max: 400,
    logBase: 100,
    tickAmount: 4,
  },
  xaxis: {
    show: false,
    labels: {
      show: false,
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  legend: {
    show: false,
  },
  responsive: [
    {
      breakpoint: 1600,
      options: {
        chart: {
          height: 300,
        },
        series: [
          {
            name: 'Good', 
            data: [170, 250, 350, 150, 230, 120, 330, 350, 280],
          },
          {
            name: 'Very Good',
            data: [290, 180, 120, 290, 370, 250, 230, 200, 140],
          },
        ],
      },
    },
    {
      breakpoint: 1200,
      options: {
        chart: {
          height: 193,
        },
      },
    },
    {
      breakpoint: 676,
      options: {
        plotOptions: {
          bar: {
            borderRadius: 8,
            columnWidth: '55%',
          },
        },
      },
    },
    {
      breakpoint: 531,
      options: {
        chart: {
          height: 170,
        },
        series: [
          {
            name: 'Good',
            data: [170, 250, 350, 150, 230, 120, 330],
          },
          {
            name: 'Very Good',
            data: [290, 180, 120, 290, 370, 250, 230],
          },
        ],
      },
    },
    {
      breakpoint: 426,
      options: {
        plotOptions: {
          bar: {
            borderRadius: 5,
            columnWidth: '65%',
          },
        },
        series: [
          {
            name: 'Good',
            data: [170, 250, 350, 150, 230],
          },
          {
            name: 'Very Good',
            data: [290, 180, 120, 290, 370],
          },
        ],
      },
    },
  ],
};

const groupBarChartEl = new ApexCharts(document.querySelector('#groupBarChart'), groupChartOption);
groupBarChartEl.render();
