<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

#chartdiv {
  width: 100%;
  height: 500px;
}
    </style>
</head>
<body>
    <div id="chartdiv"></div>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script>
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

var year = 2003;
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

function nextYear() {
  year++

  if (year > 2020) {
    year = 2003;
  }

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
  
  

  if (year == 2003) {
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


categoryAxis.sortBySeries = series;

var allData = {
  "2003": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 0
    },
    {
      "network": "Burkina Faso	",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },

    {
      "network": "S??n??gal",
      "MAU": 4470000
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 0
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 0
    },
    {
      "network": "Kenya",
      "MAU": 0
    },
    {
      "network": "Cameroun",
      "MAU": 0
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 0
    }
  ],
  "2004": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 0
    },
    {
      "network": "Burkina Faso	",
      "MAU": 3675135
    },
    {
      "network": "S??n??gal",
      "MAU": 5970054
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 980036
    },
    {
      "network": "Liberia",
      "MAU": 4900180
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 0
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 0
    },
    {
      "network": "Kenya",
      "MAU": 0
    },
    {
      "network": "Cameroun",
      "MAU": 0
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 0
    }
  ],
  "2005": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 0
    },
    {
      "network": "Burkina Faso	",
      "MAU": 7399354
    },
    {
      "network": "S??n??gal",
      "MAU": 7459742
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 9731610
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 19490059
    },
    {
      "network": "Liberia",
      "MAU": 9865805
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 0
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 0
    },
    {
      "network": "Kenya",
      "MAU": 0
    },
    {
      "network": "Cameroun",
      "MAU": 0
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 1946322
    }
  ],
  "2006": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 0
    },
    {
      "network": "Burkina Faso	",
      "MAU": 14949270
    },
    {
      "network": "S??n??gal",
      "MAU": 8989854
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 19932360
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 54763260
    },
    {
      "network": "Liberia",
      "MAU": 14966180
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 248309
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 0
    },
    {
      "network": "Kenya",
      "MAU": 0
    },
    {
      "network": "Cameroun",
      "MAU": 0
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 19878248
    }
  ],
  "2007": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 0
    },
    {
      "network": "Burkina Faso	",
      "MAU": 29299875
    },
    {
      "network": "S??n??gal",
      "MAU": 24253200
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 29533250
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 69299875
    },
    {
      "network": "Liberia",
      "MAU": 26916562
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 488331
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 0
    },
    {
      "network": "Kenya",
      "MAU": 0
    },
    {
      "network": "Cameroun",
      "MAU": 0
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 143932250
    }
  ],
  "2008": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 100000000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 30000000
    },
    {
      "network": "S??n??gal",
      "MAU": 51008911
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 55045618
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 72408233
    },
    {
      "network": "Liberia",
      "MAU": 44357628
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 1944940
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 0
    },
    {
      "network": "Kenya",
      "MAU": 0
    },
    {
      "network": "Cameroun",
      "MAU": 0
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 294493950
    }
  ],
  "2009": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 276000000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 41834525
    },
    {
      "network": "S??n??gal",
      "MAU": 28804331
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 57893524
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 70133095
    },
    {
      "network": "Liberia",
      "MAU": 47366905
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 3893524
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 0
    },
    {
      "network": "Kenya",
      "MAU": 0
    },
    {
      "network": "Cameroun",
      "MAU": 0
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 413611440
    }
  ],
  "2010": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 517750000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 54708063
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 166029650
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 59953290
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 68046710
    },
    {
      "network": "Liberia",
      "MAU": 49941613
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 0
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 43250000
    },
    {
      "network": "Kenya",
      "MAU": 0
    },
    {
      "network": "Cameroun",
      "MAU": 19532900
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 480551990
    }
  ],
  "2011": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 766000000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 66954600
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 170000000
    },
    {
      "network": "Niger",
      "MAU": 0
    },
    {
      "network": "Djibouti",
      "MAU": 46610848
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 46003536
    },
    {
      "network": "Liberia",
      "MAU": 47609080
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 0
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 0
    },
    {
      "network": "Tchad",
      "MAU": 92750000
    },
    {
      "network": "Kenya",
      "MAU": 47818400
    },
    {
      "network": "Cameroun",
      "MAU": 48691040
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 642669824
    }
  ],
  "2012": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 979750000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 79664888
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 170000000
    },
    {
      "network": "Niger",
      "MAU": 107319100
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 0
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 45067022
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 0
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 146890156
    },
    {
      "network": "Tchad",
      "MAU": 160250000
    },
    {
      "network": "Kenya",
      "MAU": 118123370
    },
    {
      "network": "Cameroun",
      "MAU": 79195730
    },
    {
      "network": "Tanzanie",
      "MAU": 0
    },
    {
      "network": "Rwanda",
      "MAU": 844638200
    }
  ],
  "2013": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 1170500000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 80000000
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 170000000
    },
    {
      "network": "Niger",
      "MAU": 205654700
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 117500000
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 0
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 293482050
    },
    {
      "network": "Tchad",
      "MAU": 223675000
    },
    {
      "network": "Kenya",
      "MAU": 196523760
    },
    {
      "network": "Cameroun",
      "MAU": 118261880
    },
    {
      "network": "Tanzanie",
      "MAU": 300000000
    },
    {
      "network": "Rwanda",
      "MAU": 1065223075
    }
  ],
  "2014": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 1334000000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 0
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 170000000
    },
    {
      "network": "Niger",
      "MAU": 254859015
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 250000000
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 135786956
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 388721163
    },
    {
      "network": "Tchad",
      "MAU": 223675000
    },
    {
      "network": "Kenya",
      "MAU": 444232415
    },
    {
      "network": "Cameroun",
      "MAU": 154890345
    },
    {
      "network": "Tanzanie",
      "MAU": 498750000
    },
    {
      "network": "Rwanda",
      "MAU": 1249451725
    }
  ],
  "2015": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 1516750000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 0
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 170000000
    },
    {
      "network": "Niger",
      "MAU": 298950015
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 400000000
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 0
    },
    {
      "network": "Mali",
      "MAU": 163346676
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 475923363
    },
    {
      "network": "Tchad",
      "MAU": 304500000
    },
    {
      "network": "Kenya",
      "MAU": 660843407
    },
    {
      "network": "Cameroun",
      "MAU": 208716685
    },
    {
      "network": "Tanzanie",
      "MAU": 800000000
    },
    {
      "network": "Rwanda",
      "MAU": 1328133360
    }
  ],
  "2016": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 1753500000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 0
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 398648000
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 550000000
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 143250000
    },
    {
      "network": "Mali",
      "MAU": 238972480
    },
    {
      "network": " Mauritanie",
      "MAU": 238648000
    },
    {
      "network": " Togo",
      "MAU": 0
    },
    {
      "network": " Sierra Leone",
      "MAU": 565796720
    },
    {
      "network": "Tchad",
      "MAU": 314500000
    },
    {
      "network": "Kenya",
      "MAU": 847512320
    },
    {
      "network": "Cameroun",
      "MAU": 281026560
    },
    {
      "network": "Tanzanie",
      "MAU": 1000000000
    },
    {
      "network": "Rwanda",
      "MAU": 1399053600
    }
  ],
  "2017": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 2035750000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 0
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 495657000
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 750000000
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 195000000
    },
    {
      "network": "Mali",
      "MAU": 297394200
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 239142500
    },
    {
      "network": " Sierra Leone",
      "MAU": 593783960
    },
    {
      "network": "Tchad",
      "MAU": 328250000
    },
    {
      "network": "Kenya",
      "MAU": 921742750
    },
    {
      "network": "Cameroun",
      "MAU": 357569030
    },
    {
      "network": "Tanzanie",
      "MAU": 1333333333
    },
    {
      "network": "Rwanda",
      "MAU": 1495657000
    }
  ],
  "2018": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 2255250000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 0
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 430000000
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 1000000000
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 246500000
    },
    {
      "network": "Mali",
      "MAU": 355000000
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 500000000
    },
    {
      "network": " Sierra Leone",
      "MAU": 624000000
    },
    {
      "network": "Tchad",
      "MAU": 329500000
    },
    {
      "network": "Kenya",
      "MAU": 1000000000
    },
    {
      "network": "Cameroun",
      "MAU": 431000000
    },
    {
      "network": "Tanzanie",
      "MAU": 1433333333
    },
    {
      "network": "Rwanda",
      "MAU": 1900000000
    }
  ],
  "2019": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 2255250000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 0
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 430000000
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 1000000000
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 246500000
    },
    {
      "network": "Mali",
      "MAU": 355000000
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 500000000
    },
    {
      "network": " Sierra Leone",
      "MAU": 624000000
    },
    {
      "network": "Tchad",
      "MAU": 329500000
    },
    {
      "network": "Kenya",
      "MAU": 1000000000
    },
    {
      "network": "Cameroun",
      "MAU": 431000000
    },
    {
      "network": "Tanzanie",
      "MAU": 1433333333
    },
    {
      "network": "Rwanda",
      "MAU": 1900000000
    }
  ],
  "2020": [
    {
      "network": "C??te d???Ivoire	",
      "MAU": 2255250000
    },
    {
      "network": "Burkina Faso	",
      "MAU": 0
    },
    {
      "network": "S??n??gal",
      "MAU": 0
    },
    {
      "network": "Guin??e",
      "MAU": 0
    },
    {
      "network": "Niger",
      "MAU": 430000000
    },
    {
      "network": "Djibouti",
      "MAU": 0
    },
    {
      "network": " Gambie",
      "MAU": 1000000000
    },
    {
      "network": " Ghana",
      "MAU": 0
    },
    {
      "network": "Liberia",
      "MAU": 0
    },
    {
      "network": "B??nin",
      "MAU": 246500000
    },
    {
      "network": "Mali",
      "MAU": 355000000
    },
    {
      "network": " Mauritanie",
      "MAU": 0
    },
    {
      "network": " Togo",
      "MAU": 500000000
    },
    {
      "network": " Sierra Leone",
      "MAU": 624000000
    },
    {
      "network": "Tchad",
      "MAU": 329500000
    },
    {
      "network": "Kenya",
      "MAU": 1000000000
    },
    {
      "network": "Cameroun",
      "MAU": 431000000
    },
    {
      "network": "Tanzanie",
      "MAU": 1433333333
    },
    {
      "network": "Rwanda",
      "MAU": 1900000000
    }
  ]
}

chart.data = JSON.parse(JSON.stringify(allData[year]));
categoryAxis.zoom({ start: 0, end: 1 / chart.data.length });

series.events.on("inited", function() {
  setTimeout(function() {
    playButton.isActive = true; // this          starts interval
  }, 2000)
})
</script>
</body>
</html>