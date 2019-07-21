import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);

let label;

let chart = am4core.create("chartdiv", am4charts.XYChart);
chart.paddingRight = 20;

let data = [];
let visits = 10;
for (let i = 1; i < 20; i++) {
    visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 5);
    data.push({ date: new Date(2018, 0, i), value: visits });
}

chart.data = data;

let dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.grid.template.location = 0;

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.renderer.minWidth = 35;

let series = chart.series.push(new am4charts.LineSeries());
series.dataFields.dateX = "date";
series.dataFields.valueY = "value";
series.tooltipText = "{valueY}";
series.tooltip.pointerOrientation = "vertical";
series.tooltip.background.fillOpacity = 0.5;
series.tensionX = 0.7;

chart.scrollbarY = new am4core.Scrollbar();

series.events.on("ready", () => {

    label = series.createChild(am4core.Label);
    label.strokeOpacity = 0;
    label.fontSize = 20;
    label.fill = series.stroke;
    label.fillOpacity = 1;
    label.padding(0, 0, 5, 0);

    label.path = series.segments.getIndex(0).strokeSprite.path;

    series.segments.getIndex(0).strokeSprite.events.on("propertychanged", (event) => {
        if (event.property == "path") {
            label.path = series.segments.getIndex(0).strokeSprite.path;
        }
    })
    animateForward();

}, 1000)


function animateForward() {
    label.text = "I am funky text!"
    let animation = label.animate({ property: "locationOnPath", from: 0, to: 1 }, 12000);
    animation.events.on("animationended", animateBackwards);
}

function animateBackwards() {
    label.text = "And I can go backwards!"
    let animation = label.animate({ property: "locationOnPath", from: 1, to: 0 }, 8000);
    animation.events.on("animationended", animateForward);
}
