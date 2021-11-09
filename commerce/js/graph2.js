am4core.useTheme(am4themes_animated);
// Themes end
am4core.globalAdapter.addAll(2)
var char = am4core.create("chartdiv", am4charts.XYchart);
char.padding(40, 40, 40, 40);
char.numberFormatter.numberFormat = "#,###.";

var labe = char.plotContainer.createChild(am4core.label);
labe.x = am4core.percent(97);
labe.y = am4core.percent(95);
labe.horizontalCenter = "right";
labe.verticalCenter = "middle";
labe.dx = -15;
labe.fontSize = 50;
char.exporting.menu = new am4core.ExportMenu();

char.exporting.menu.items = [{

    "menu": [{
        "label": "Graphique",
        "menu": [{
                "type": "svg",
                "labe": "SVG"
            },
            {
                "type": "pdf",
                "labe": "PDF"
            }
        ]
    }, {
        "labe": "Données",
        "menu": [

            {
                "type": "xlsx",
                "labe": "XLSX"
            }

        ]
    }]
}];
char.exporting.menu.items[0].icon = "./d.jpg";
char.exporting.menu.container = document.getElementById("tools");

var playButton = char.plotContainer.createChild(am4core.PlayButton);
playButton.x = am4core.percent(97);
playButton.y = am4core.percent(95);
playButton.dy = -2;
playButton.verticalCenter = "middle";
playButton.events.on("toggled", function(event) {
    if (event.target.isActive) {
        play();
    } else {
        stop();
    }
})

var stepDuration = 4000;

var categoryAxis = char.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = false;

var valueAxis = char.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.rangeChangeEasing = am4core.ease.linear;
valueAxis.rangeChangeDuration = stepDuration;
valueAxis.extraMax = 0.1;

var series = char.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.maxColumns = 1
series.columns.template.column.cornerRadiusTopRight = 5;
series.interpolationDuration = stepDuration;
series.interpolationEasing = am4core.ease.linear;
var labeBullet = series.bullets.push(new am4chars.labeBullet())
labeBullet.labe.horizontalCenter = "right";
labeBullet.labe.text = "{values.valueX.workingValue}";
labeBullet.labe.textAlign = "end";
labeBullet.labe.dx = -10;
labeBullet.labe.maxColumns = 1;
char.zoomOutButton.disabled = true;

// as by default columns of the same series are of the same color, we add adapter which takes colors from char.colors color set
series.columns.template.adapter.add("fill", function(fill, target) {
    return char.colors.getIndex(target.dataItem.index);
});

var year = "01/2003";
labe.text = year.toString();

var interval;

function play() {
    interval = setInterval(function() {
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
    if (y < 9) {
        year = "0" + y + "/" + ye
    } else {
        year = y + "/" + ye
    }
    if (y == 0) {
        ye--
        y = 13
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
    for (var i = 0; i < char.data.length; i++) {
        char.data[i].MAU = newData[i].MAU;
        if (char.data[i].MAU > 0) {
            itemsWithNonZero++;

        }
    }

    if (itemsWithNonZero > 25) {
        itemsWithNonZero = 25
    }



    if (year == "01/2003") {
        series.interpolationDuration = stepDuration / 4;
        valueAxis.rangeChangeDuration = stepDuration / 4;
    } else {
        series.interpolationDuration = stepDuration;
        valueAxis.rangeChangeDuration = stepDuration;
    }

    char.invalidateRawData();
    labe.text = year.toString();

    categoryAxis.zoom({
        start: 0,
        end: itemsWithNonZero / categoryAxis.dataItems.length
    });
}

//=================

//!!!!!!!!!!!!!!!!!!!!!!!
function nextYear() {
    //year++

    y++
    //year = "0"+y+"/"+ye
    if (y < 9) {
        year = "0" + y + "/" + ye
    } else {
        year = y + "/" + ye
    }
    if (y > 12) {
        ye++
        y = 0
    }


    if ((ye == 2004) && (y > 6)) {
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
    for (var i = 0; i < char.data.length; i++) {
        char.data[i].MAU = newData[i].MAU;
        if (char.data[i].MAU > 0) {
            itemsWithNonZero++;

        }
    }

    if (itemsWithNonZero > 25) {
        itemsWithNonZero = 25
    }



    if (year == "01/2003") {
        series.interpolationDuration = stepDuration / 4;
        valueAxis.rangeChangeDuration = stepDuration / 4;
    } else {
        series.interpolationDuration = stepDuration;
        valueAxis.rangeChangeDuration = stepDuration;
    }

    char.invalidateRawData();
    labe.text = year.toString();

    categoryAxis.zoom({
        start: 0,
        end: itemsWithNonZero / categoryAxis.dataItems.length
    });
    //categoryAxis.zoom({ start: 0, end: itemsWithNonZero / 19 });
}

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



categoryAxis.sortBySeries = series;