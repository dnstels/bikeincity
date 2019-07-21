<!-- Styles -->
<head>
  <meta charset="utf-8">
</head>
<style>
#chartdiv {
  width: 100%;
height:550px;
}
</style>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/plugins/forceDirected.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://www.amcharts.com/lib/4/lang/ru_RU.js"></script>
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4plugins_forceDirected.ForceDirectedTree);
chart.language.locale = am4lang_ru_RU;

var networkSeries = chart.series.push(new am4plugins_forceDirected.ForceDirectedSeries())

chart.data = [
  {
	  name: "Центр", value:"200",
	    children: [
{
	name:"Сенной", value:"50",
	children: [
      {
	      name: "1-й Дачный", value:"90",
        children: [
          { name: "Лен р-н", value:"70" },
        ]
        }, {name:"СХИ", value:"30", children:[ {name:"Солнечный", value:"30"}] }
     ]},
      {
	      name: "Лента", value: "100",
        children: [
          { name: "Зав р-н", value:"70" },
        ]
      },
      {
	      name: "Эконом", value:"90",
        children: [
          {
		  name: "Юбилейный", value:"50" 
          }
        ]
      },
      {
	      name: "Дет парк", value:"90",
        children: [
          { name:"Окт р-н", value:"50"},
        ]
      },
      {
	      name: "Мост", value:"90",
        children: [
          {
		  name: "Энгельс", value:"50"
          }
        ]
      }

    ]
  }
];

networkSeries.dataFields.value = "value";
networkSeries.dataFields.name = "name";
networkSeries.dataFields.children = "children";
networkSeries.nodes.template.tooltipText = "{name}:{value}";
networkSeries.nodes.template.fillOpacity = 1;
networkSeries.manyBodyStrength = -20;
networkSeries.links.template.strength = 0.8;
networkSeries.minRadius = am4core.percent(2);

networkSeries.nodes.template.label.text = "{name}"
networkSeries.fontSize = 10;

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
