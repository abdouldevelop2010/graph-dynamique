  /**
* ---------------------------------------
* This demo was created using amCharts 4.
* 
* For more information visit:
* https://www.amcharts.com/
* 
* Documentation is available at:
* https://www.amcharts.com/docs/v4/
* ---------------------------------------|
*/
/*chart.exporting.menu = new am4core.ExportMenu();
chart.exporting.menu.container = document.getElementById("tools");*/
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
am4core.globalAdapter.addAll(2)
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.padding(40, 40, 40, 40);
chart.numberFormatter.numberFormat = "#,###.";

var label = chart.plotContainer.createChild(am4core.Label);
label.x = am4core.percent(97);
label.y = am4core.percent(95);
label.horizontalCenter = "right";
label.verticalCenter = "middle";
label.dx = -15;
label.fontSize = 50;
chart.exporting.menu = new am4core.ExportMenu();

chart.exporting.menu.items = [
  {
    "label": "...",
    "menu": [
      {
        "label": "Image",
        "menu": [
          { "type": "png", "label": "PNG" },
          { "type": "jpg", "label": "JPG" },
          { "type": "svg", "label": "SVG" },
          { "type": "pdf", "label": "PDF" }
        ]
      }, {
        "label": "Données",
        "menu": [
          { "type": "json", "label": "JSON" },
          { "type": "csv", "label": "CSV" },
          { "type": "xlsx", "label": "XLSX" },
          { "type": "html", "label": "HTML" },
          { "type": "pdfdata", "label": "PDF" }
        ]
      }, {
        "label": "Print", "type": "print"
      }
    ]
  }
];
/*
chart.exporting.menu.items = [
  {
    
    "menu": [
      {
        "label": "Graphique",
        "menu": [
          { "type": "svg", "label": "SVG" },
          { "type": "pdf", "label": "PDF" }
        ]
      }, {
        "label": "Données",
        "menu": [
        
          { "type": "xlsx", "label": "XLSX" }
         
        ]
      }
    ]
  }
];*/
chart.exporting.menu.items[0].icon = "./d.jpg";
chart.exporting.menu.container = document.getElementById("tools");

var playButton = chart.plotContainer.createChild(am4core.PlayButton);
playButton.x = am4core.percent(97);
playButton.y = am4core.percent(95);
playButton.dy = -2;
playButton.verticalCenter = "middle";
playButton.events.on("toggled", function(event) {
if (event.target.isActive) {
  play();
}
else {
  stop();
}
})

var stepDuration = 4000;

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = false;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.rangeChangeEasing = am4core.ease.linear;
valueAxis.rangeChangeDuration = stepDuration;
valueAxis.extraMax = 0.1;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.maxColumns = 1
series.columns.template.column.cornerRadiusTopRight = 5;
series.interpolationDuration = stepDuration;
series.interpolationEasing = am4core.ease.linear;
var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "right";
labelBullet.label.text = "{values.valueX.workingValue}";
labelBullet.label.textAlign = "end";
labelBullet.label.dx = -10;
labelBullet.label.maxColumns = 1;
chart.zoomOutButton.disabled = true;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
return chart.colors.getIndex(target.dataItem.index);
});

var year = "01/2003";
label.text = year.toString();

var interval;

function play() {
interval = setInterval(function(){
  nextYear();
}, stepDuration)
nextYear();
}

function stop() {
if (interval) {
  clearInterval(interval);
}
}
var y = 0
var ye = 2003
//==================
function prevYear() {
//year++

y--
//year = "0"+y+"/"+ye
if(y < 9){
  year = "0"+y+"/"+ye
}else{
  year = y+"/"+ye
}
if(y == 0){
  ye--
  y=13
}

/*
if ( (ye == 2004) && (y>6)) {
  ye = 2003
  y = 0
}*/
/*if(y > 2020){
  year = 2003
}

if(y == 2007){
  year = "01/2007"
}*/

var newData = allData[year];
var itemsWithNonZero = 0;
for (var i = 0; i < chart.data.length; i++) {
  chart.data[i].MAU = newData[i].MAU;
  if (chart.data[i].MAU > 0) {
    itemsWithNonZero++;
    
  }
}

  if(itemsWithNonZero > 25){
  itemsWithNonZero = 25
}



if (year == "01/2003") {
  series.interpolationDuration = stepDuration / 4;
  valueAxis.rangeChangeDuration = stepDuration / 4;
}
else {
  series.interpolationDuration = stepDuration;
  valueAxis.rangeChangeDuration = stepDuration;
}

chart.invalidateRawData();
label.text = year.toString();

categoryAxis.zoom({ start: 0, end: itemsWithNonZero / categoryAxis.dataItems.length });
}

//=================

//!!!!!!!!!!!!!!!!!!!!!!!
function nextYear() {
//year++

y++
//year = "0"+y+"/"+ye
if(y < 9){
  year = "0"+y+"/"+ye
}else{
  year = y+"/"+ye
}
if(y > 12){
  ye++
  y=0
}


if ( (ye == 2004) && (y>6)) {
  ye = 2003
  y = 0
}
/*if(y > 2020){
  year = 2003
}

if(y == 2007){
  year = "01/2007"
}*/

var newData = allData[year];
var itemsWithNonZero = 0;
for (var i = 0; i < chart.data.length; i++) {
  chart.data[i].MAU = newData[i].MAU;
  if (chart.data[i].MAU > 0) {
    itemsWithNonZero++;
    
  }
}

  if(itemsWithNonZero > 25){
  itemsWithNonZero = 25
}



if (year == "01/2003") {
  series.interpolationDuration = stepDuration / 4;
  valueAxis.rangeChangeDuration = stepDuration / 4;
}
else {
  series.interpolationDuration = stepDuration;
  valueAxis.rangeChangeDuration = stepDuration;
}

chart.invalidateRawData();
label.text = year.toString();

categoryAxis.zoom({ start: 0, end: itemsWithNonZero / categoryAxis.dataItems.length });
//categoryAxis.zoom({ start: 0, end: itemsWithNonZero / 19 });
}

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



categoryAxis.sortBySeries = series;