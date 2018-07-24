window.onload = function () {
    CanvasJS.addColorSet("greenShades",
            [
                "#06c245",
                "#c41300",
                "#c41300"
            ]);

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        animationDuration: 2000, //change to 1000, 500 etc
        //height: 270,
        colorSet: "greenShades",
        axisY: {
            labelFontSize: 12
        },
        axisX: {
            labelFontSize: 12
        },
        data: [
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    {label: "Jan", y: 25},
                    {label: "Feb", y: 20},
                    {label: "Mar", y: 20},
                ]
            }
        ]
    });
    chart.render();
    CanvasJS.addColorSet("greenShades1",
            [
                "#C41300",
                "#feec00",
                "#06C245"
            ]);
    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        animationDuration: 1500, //change to 1000, 500 etc
        //width: 160,
        height: 100,
        colorSet: "greenShades1",
        axisY: {
            labelFontSize: 11
        },
        axisX: {
            labelFontSize: 11
        },
        data: [
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    {label: "Jan", y: 8},
                    {label: "Feb", y: 5},
                    {label: "Mar", y: 5},
                ]
            },
		],
		
    });
    chart1.render();
    CanvasJS.addColorSet("greenShades2",
            [
                "#feec00",
                "#feec00",
                "#c41300"
            ]);
    var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        animationDuration: 1000, //change to 1000, 500 etc
        //width: 160,
        height: 100,
        colorSet: "greenShades2",
        axisY: {
            labelFontSize: 11
        },
        axisX: {
            labelFontSize: 11
        },
        data: [
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    {label: "Jan", y: 8},
                    {label: "Feb", y: 5},
                    {label: "Mar", y: 7},
                ]
            }
        ]
    });
    chart2.render();
    CanvasJS.addColorSet("greenShades3",
            [
                "#06C245",
                "#06C245",
                "#feec00"
            ]);
    var chart3 = new CanvasJS.Chart("chartContainer3", {
        animationEnabled: true,
        animationDuration: 800, //change to 1000, 500 etc
        //width: 160,
        height: 100,
        colorSet: "greenShades3",
        axisY: {
            labelFontSize: 11
        },
        axisX: {
            labelFontSize: 11
        },
        data: [
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    {label: "Jan", y: 8},
                    {label: "Feb", y: 5},
                    {label: "Mar", y: 5},
                ]
            }
        ]
    });
    chart3.render();
    CanvasJS.addColorSet("greenShades4",
            [
                "#feec00",
                "#C41300",
                "#06C245",
            ]);
    var chart4 = new CanvasJS.Chart("chartContainer4", {
        animationEnabled: true,
        animationDuration: 500, //change to 1000, 500 etc
        //width: 160,
        height: 100,
        colorSet: "greenShades4",
        axisY: {
            labelFontSize: 11
        },
        axisX: {
            labelFontSize: 11
        },
        data: [
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    {label: "Jan", y: 8},
                    {label: "Feb", y: 5},
                    {label: "Mar", y: 5},
                ]
            }
        ]
    });
    chart4.render();
}
$(document).ready(function () {
$('.data_decade_view1 .input-group.date').datepicker({
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    calendarWeeks: true,
    autoclose: true
});
});