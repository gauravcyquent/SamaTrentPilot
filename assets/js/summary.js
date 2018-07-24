$(document).ready(function () {
    
    $('#data_decade_view1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });
    $('#data_decade_view2 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

    $('#chart1-1').barChart({
        height: 328,
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 70]]
            }, {
                name: 'Dataset 2',
                values: [[1450569600, 120]]
            },
            {
                name: 'Dataset 3',
                values: [[1450569600, 100]]
            },
            {
                name: 'Dataset 4',
                values: [[1450569600, 120]]
            }
        ]
    });

    $('#chart1-2').barChart({
        height: 328,
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 40]]
            }, {
                name: 'Dataset 2',
                values: [[1450569600, 45]]
            },
            {
                name: 'Dataset 3',
                values: [[1450569600, 50]]
            },
            {
                name: 'Dataset 4',
                values: [[1450569600, 55]]
            }
        ]
    });

    $('#chart').barChart({
        height: 328,
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 40], [1450656000, 30], [1450742400, 15]]
            }, {
                name: 'Dataset 2',
                values: [[1450569600, 45], [1450656000, 33], [1450742400, 49]]
            }
        ]
    });

    $('#chart2').barChart({
        height: 328,
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 40], [1450656000, 30], [1450742400, 15]]
            }, {
                name: 'Dataset 2',
                values: [[1450569600, 45], [1450656000, 33], [1450742400, 49]]
            },
            {
                name: 'Dataset 3',
                values: [[1450569600, 45], [1450656000, 33], [1450742400, 49]]
            }
        ]
    });

    $('#chart3').barChart({
        height: 328,
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 40], [1450656000, 30], [1450742400, 25]]
            }
        ]
    });
    $('#data_5 .input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });


    $('#SMEchart').barChart({
        height: 300,
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 10], [1450656000, 10], [1450742400, 15]]
            }, {
                name: 'Dataset 2',
                values: [[1450569600, 30], [1450656000, 22], [1450742400, 35]]
            },
            {
                name: 'Dataset 3',
                values: [[1450569600, 20], [1450656000, 25], [1450742400, 50]]
            }
        ]
    });

    $('#SMEchart2').barChart({
        height: 300,
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 10], [1450656000, 10], [1450742400, 10]]
            }, {
                name: 'Dataset 2',
                values: [[1450569600, 30], [1450656000, 22], [1450742400, 35]]
            },
            {
                name: 'Dataset 3',
                values: [[1450569600, 20], [1450656000, 25], [1450742400, 50]]
            }
        ]
    });

    $('#SMEchart3').barChart({
        height: 300,
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 10], [1450656000, 10], [1450742400, 10]]
            }, {
                name: 'Dataset 2',
                values: [[1450569600, 30], [1450656000, 22], [1450742400, 35]]
            },
            {
                name: 'Dataset 3',
                values: [[1450569600, 20], [1450656000, 25], [1450742400, 50]]
            }
        ]
    });

    $('#SMEchart8').barChart({
        height: 130,
        colors: [
            //"#f8ac59", "#f36a3e", "#f8941c", "#673ab7"
			"#EA5B24", "#EA5B24", "#EA5B24", "#EA5B24"
        ],
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 64]],
            }
        ]
    });
    $('#SMEchart9').barChart({
        height: 130,
        colors: [
            "#EA5B24", "#EA5B24", "#EA5B24", "#EA5B24"
        ],
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 64]],
            }
        ]
    });
    $('#SMEchart10').barChart({
        height: 130,
        colors: [
            "#EA5B24", "#EA5B24", "#EA5B24", "#EA5B24"
        ],
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 64]],
            }
        ]
    });
    $('#SMEchart11').barChart({
        height: 90,
        colors: [
            "#EA5B24", "#EA5B24", "#EA5B24", "#EA5B24"
        ],
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 32]],
            }
        ]
    });
    $('#SMEchart12').barChart({
        height: 60,
        colors: [
            "#EA5B24", "#EA5B24", "#EA5B24", "#EA5B24"
        ],
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 8]],
            }
        ]
    });
    $('#SMEchart13').barChart({
        height: 70,
        colors: [
            "#EA5B24", "#EA5B24", "#EA5B24", "#EA5B24"
        ],
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 24]],
            }
        ]
    });
    $('#SMEchart14').barChart({
        height: 100,
        colors: [
            //"#f8ac59", "#f36a3e", "#f8941c", "#673ab7"
			"#EA5B24", "#EA5B24", "#EA5B24", "#EA5B24"
        ],
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 30]],
            }
        ]
    });
    $('#SMEchart15').barChart({
        height: 100,
        colors: [
            "#EA5B24", "#EA5B24", "#EA5B24", "#EA5B24"
        ],
        bars: [
            {
                name: 'Dataset 1',
                values: [[1450569600, 20]],
            }
        ]
    });
	
});


window.onload = function() {
CanvasJS.addColorSet("greenShades4",
            [
                "#EA5B24",
                "#007242",
                "#FDD100",
            ]);	
	new CanvasJS.Chart("chartContainer26", {
		animationEnabled: true,
        animationDuration: 500, //change to 1000, 500 etc
        //width: 160,
        height:200,
        colorSet: "greenShades4",
		title: { 
			//text: "Worldwide Smartphone sales by brand - 2012",
			fontSize: 12
		}, 
		axisY: { 
			title: "Products in %" 
		}, 
		legend :{ 
			verticalAlign: "center",
			fontSize: 14,			
			horizontalAlign: "left" 
		}, 
		data: [ 
		{ 
			type: "pie", 
			showInLegend: true, 
			toolTipContent: "{label} <br/> {y} %", 
			indexLabel: "{y} %", 
			dataPoints: [ 
				{ label: "Retail",  y: 25.3, legendText: "Retail"}, 
				{ label: "FMCG",    y: 64.0, legendText: "FMCG"  }, 
				{ label: "Others",   y: 10.7,  legendText: "Others" }, 
				//{ label: "Automotive",       y: 7.0,  legendText: "Automotive"}, 
				//{ label: "Others",   y: 39.6, legendText: "Others" } 
			] 
		} 
		] 
	}).render(); 
	new CanvasJS.Chart("chartContainer27", {
		animationEnabled: true,
        animationDuration: 500, //change to 1000, 500 etc
        //width: 160,
        height:200,
        colorSet: "greenShades4",
		title: { 
			//text: "Worldwide Smartphone sales by brand - 2012",
			fontSize: 12
		}, 
		axisY: { 
			title: "Products in %" 
		}, 
		legend :{ 
			verticalAlign: "center",
			fontSize: 14,			
			horizontalAlign: "left" 
		}, 
		data: [ 
		{ 
			type: "pie", 
			showInLegend: true, 
			toolTipContent: "{label} <br/> {y} %", 
			indexLabel: "{y} %", 
			dataPoints: [ 
				{ label: "Overdraft",  y: 64.0, legendText: "Overdraft"}, 
				{ label: "CASA",    y: 10.3, legendText: "CASA"  }, 
				{ label: "Term Loan",   y: 25.7,  legendText: "Term Loan" }, 
				//{ label: "Automotive",       y: 7.0,  legendText: "Automotive"}, 
				//{ label: "Others",   y: 39.6, legendText: "Others" } 
			] 
		} 
		] 
	}).render(); 
	
} 