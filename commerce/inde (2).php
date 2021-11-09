<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
   
    <title>Document</title>

  
</head>
<body>
  <div id="container" >
      <header></header>
      <aside>
        <h6 class="text-center mt-4">Fitre de recherche</h6>
        <div class="aside-content mt-3">
          <form action="">
            <hr>
            <div class="row">
              <div class="col-2">
                <input name ="ar" type="radio">
              </div>
              <div class="col-10">
                Continent Afrique
              </div>
            </div>

            <div class="row">
              <div class="col-2">
                <input name ="ar" type="radio">
              </div>
              <div class="col-10">
                Continent Europe
              </div>
            </div>

            <div class="row">
              <div class="col-2">
                <input name ="ar" type="radio">
              </div>
              <div class="col-10">
                Continent Asie
              </div>
            </div>

            <div class="row">
              <div class="col-2">
                <input name ="ar" type="radio">
              </div>
              <div class="col-10">
                UEMOA
              </div>
            </div>
            <hr>

           <h6 class="text-center mt-4">Indicateurs</h6> 
           <!--- <button class="btn-btn-success" style="text-align: center;" onclick="">Autre critères de recherche</button>
           --> <hr>
            <span id="ar" style="display: non;">
            <div class="row">
              <div class="col-4"><label for="">Indicateurs</label></div>
              <div class="col-8"> <select class="form-select" aria-label="Default select example">
                <!-- <option selected>....</option> -->
                <option value="1">Exportation</option>
                <option value="2">Importation</option>
                <option value="4">Balance commerciale</option>
              </select></div>
            </div>
           
           <hr>
           
<!--
<h6 class="text-center mt-4">Periode</h6> 
<!-- - <button class="btn-btn-success" style="text-align: center;" onclick="">Autre critères de recherche</button>
--> <!---
 <span id="ar" style="display: non;">
 <div class="row">
   <div class="col-4"><label for="">Début</label></div>
   <div class="col-6"> 
     <input type="month" min="2003-01" value="2003-01">
  </div>
 </div>

<hr>-->
           <h6 class="text-center mt-4">Autres critères de recherches</h6>
           </span>
           <hr>
           <span id="ar" style="display: non;">
           <div class="row">
             <div class="col-4"><label for="">Continents</label></div>
             <div class="col-8"> <select class="t" >
               <option selected>....</option>
               <option value="1">Afrique</option>
               <option value="2">Amérique</option>
               <option value="3">Antartique</option>
               <option value="4">Asie</option>
               <option value="5">Europe</option>
               <option value="6">Océanie</option>
             </select></div>
           </div>
           <div class="row">
             <div class="col-4"><label for="">Regions</label></div>
             <div class="col-8"> <select class="form-select" >
               <option selected>...</option>
               <option value="1">Nord</option>
               <option value="2">Sud</option>
               <option value="3">Est</option>
               <option value="2">Ouest</option>
               <option value="3">Centre</option>
             </select></div>
           </div>
          <hr>
           <!-- <div class="row">
              <div class="col-4"><label for=""> S-Regions</label></div>
              <div class="col-8"> <select class="form-select" aria-label="Default select example">
                <option selected>selection3</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select></div>
            </div>-->
           
            <!-- <div class="row">
              <div class="col-4"><label for=""> label 5</label></div>
              <div class="col-8"> <select class="form-select" aria-label="Default select example">
                <option selected>selection4</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select></div>
            </div> -->
           
          </form>
        </div>
      </aside>
       <main>
       
         <div class="main-title">
           <div class="transfert">
             <div class="boutton" ><button class="btn btn-outline-primary" id="0">Données d'exportation </button></div>
             <div class="boutton" ><button class="btn btn-outline-primary" id="1">Données d'importation</button></div>
             <div class="boutton" ><button class="btn btn-outline-primary" id="2">Ballance commerciale</button></div>
           </div>
           <div id="tools"></div>
         </div>
          <!--onglet  -->
            <div class="onglet onglet-active" data-tab="0">
            <div class="title mt-4">
           <h5 class="text-center">Classement des PIB d'importation des pays de l'Afrique l'OUEST </h5>
           <div class="pays">
            <p>Pays</p>
          </div>
         </div>
        <div >
          
       </div>
        <div id="chartdiv"></div>
        <div class="text-center">
          <h5></h5>
        </div>
        <div class="graph-botton">
          <div class="legende">
            <p> </p>
          </div>
          <div class="play-btn"><button onclick="prevYear()">Précédent</button></div><div class="play-btn"><button>Play</button></div> <div class="play-btn"><button onclick="nextYear()">Suivant</button></div>
          <div class="montant">
            <p>Montant En millions</p>
          </div>
        </div>
            </div>
          <!-- onglet fin -->

           <!--onglet2  -->
           <div class="onglet" data-tab="1">
            <div class="title mt-4">
           <h5 class="text-center">Classement des PIB d'importation des pays de l'Afrique l'OUEST 2 </h5>
           <div class="pays">
            <p>Pays</p>
          </div>
         </div>
        <div >
          
       </div>
        <div id="chartdiv"></div>
        <div class="text-center">
          <h5></h5>
        </div>
        <div class="graph-botton">
          <div class="legende">
            <p> </p>
          </div>
          <div class="play-btn"><button onclick="prevYear()">Précédent</button></div><div class="play-btn"><button>Play</button></div> <div class="play-btn"><button onclick="nextYear()">Suivant</button></div>
          <div class="montant">
            <p>Montant En millions</p>
          </div>
        </div>
            </div>
          <!-- onglet2 fin -->
         <!--onglet3  -->
         <div class="onglet" data-tab="2">
            <div class="title mt-4">
           <h5 class="text-center">Classement des PIB d'importation des pays de l'Afrique l'OUEST 33</h5>
           <div class="pays">
            <p>Pays</p>
          </div>
         </div>
        <div >
          
       </div>
        <div id="chartdiv"></div>
        <div class="text-center">
          <h5></h5>
        </div>
        <div class="graph-botton">
          <div class="legende">
            <p> </p>
          </div>
          <div class="play-btn"><button onclick="prevYear()">Précédent</button></div><div class="play-btn"><button>Play</button></div> <div class="play-btn"><button onclick="nextYear()">Suivant</button></div>
          <div class="montant">
            <p>Montant En millions</p>
          </div>
        </div>
            </div>
          <!-- onglet3 fin -->
       </main>
      <footer> </footer>
    </div>
<!--<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>-->
<script src="./js/core.js"></script>
<script src="./js/charts.js"></script>
<script src="./js/animated.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
];
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

// système d'onglet

const ongletBtns = document.querySelectorAll('.transfert button');
const tabs =  document.querySelectorAll('.onglet');

console.log(ongletBtns)
console.log(tabs)

 for(let i = 0; i< ongletBtns.length; i++ ){

   let btn = ongletBtns[i];
   btn.addEventListener('click', ()=>{
     let btnId = btn.getAttribute('id')
    document.querySelector('.onglet-active').classList.remove('onglet-active');
    tabs[btnId].classList.add('onglet-active')  
   })
 }

</script>

<script src="./data.js"></script>
</body>
</html>