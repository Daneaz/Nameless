// Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
// -- Area Chart Example
/*var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 20,
      pointBorderWidth: 2,
      data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 40000,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});*/
// -- Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'radar',
  data: {
    labels: ["English", "Maths", "Science", "Literature", "Social Studies"],
    datasets: [{
      label: "Average",
      backgroundColor: "rgba(0,255,0,0.5)",
	 borderColor: "rgba(0,255,0,1)",
	 data: [96, 45, 60, 73, 84],
	 },{
		label: "",
      backgroundColor: "rgba(255,0,0,0)",
      borderColor: "rgba(255,0,0,0)",
      data: [20, 40, 60, 80, 100],
    }],
  },
  options: {
	 title: {
		display:false,
		text: "Subject Score"
	},
    legend: {
      display: false
    },
	 maintainAspectRatio: true,
	 spanGaps:false,
  }
});
// -- Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Present","Absent","MC"],
    datasets: [{
      data: [60, 3, 5],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107'],
    }],
  },
});
var ctx = document.getElementById("myPieChart2");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Present","Absent"],
    datasets: [{
      data: [60, 3],
      backgroundColor: ['#007bff', '#dc3545'],
    }],
  },
});