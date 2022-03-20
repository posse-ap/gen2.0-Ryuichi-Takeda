// var dataLabelPlugin = {
//   afterDatasetsDraw: function (chart, easing) {
//       //To only draw at the end of animation, check for easing === 1
//       var ctx = chart.ctx;
//       chart.data.datasets.forEach(function (dataset, i) {
//           var dataSum = 0;
//           dataset.data.forEach(function (element){
//               dataSum += element;
//           });
//           var meta = chart.getDatasetMeta(i);
//           if (!meta.hidden) {
//               meta.data.forEach(function (element, index) {
//                   // Draw the text in black, with the specified font
//                   ctx.fillStyle = 'rgb(255, 255, 255)';
//                   var fontSize = 12;
//                   var fontStyle = 'normal';
//                   var fontFamily = 'Helvetica Neue';
//                   ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
//                   // Just naively convert to string for now
//                   var labelString = chart.data.labels[index];
//                   var dataString = (Math.round(dataset.data[index] / dataSum * 1000)/10).toString() + "%";
//                   // Make sure alignment settings are correct
//                   ctx.textAlign = 'center';
//                   ctx.textBaseline = 'middle';
//                   var padding = 5;
//                   var position = element.tooltipPosition();
//                   ctx.fillText(labelString, position.x, position.y - (fontSize / 2) - padding);
//                   ctx.fillText(dataString, position.x, position.y + (fontSize / 2) - padding);
//               });
//           }
//       });
//   }
// };
// // Chart
// var myChart = "doughnut_chart1_cv";
// var chart = new Chart(myChart, {
//   type: 'doughnut',
//   data: {
//       labels:["", "", "", "", "", "", "",  ""],
//       datasets: [{
//            label: "Sample",
//           backgroundColor: [
//           'rgb(0,66,229)',
//           'rgb(0,112,185)',
//           'rgb(0,189,219)',
//           'rgb(8,205,250)',
//           'rgb(203,173,240)',
//           'rgb(108,67,229)',
//           'rgb(70,9,232)',
//           'rgb(45,0,186)',
//       ],
//           data: [128, 120, 46, 82, 67, 46, 16],
//       }]
//   },
//   options: {
//     //  title: {
//     //      display: false,
//     //      text: "Sample"
//     //  },
//   legend:{
//       display: false
//       },
//       maintainAspectRatio: false,
//   },
//   plugins: [dataLabelPlugin],
// });