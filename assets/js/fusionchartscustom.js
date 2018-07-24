FusionCharts.ready(function () {
    /*var revenueChart = new FusionCharts({
        type: 'column2d',
        renderAt: 'chart-container',
        width: '100%',
        height: '270',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                //"caption": "Monthly revenue for last year",
                //"subCaption": "Harry's SuperMart",
                //"xAxisName": "Month",
               // "yAxisName": "Revenues (In USD)",
                //"numberPrefix": "$",
                //"paletteColors": "#06c245",
				"paletteColors" : "#06c245,#c41300,#c41300",
                "bgColor": "#ffffff",
                "borderAlpha": "20",
                "canvasBorderAlpha": "0",
                "usePlotGradientColor": "0",
                "plotBorderAlpha": "10",
                "placevaluesInside": "1",
                "rotatevalues": "1",
                "valueFontColor": "#ffffff",                
                "showXAxisLine": "1",
                "xAxisLineColor": "#999999",
                "divlineColor": "#999999",               
                "divLineIsDashed": "1",
                "showAlternateHGridColor": "0",
                "subcaptionFontBold": "0",
                "subcaptionFontSize": "14"
            },            
            "data": [
                {
                    "label": "Jan",
                    "value": "25",
					//"paletteColors": "#06c245"
                }, 
                {
                    "label": "Feb",
                    "value": "20",
					//"paletteColors": "#c41300"
                }, 
                {
                    "label": "Mar",
                    "value": "20",
					//"paletteColors": "#c41300"
                }, 
                
            ],
            "trendlines": [
                {
                    "line": [
                        {
                            "startvalue": "25",
                            "color": "#c41300",
                            "valueOnRight": "1",
                            "displayvalue": "Target"
                        }
                    ]
                }
            ],
			
        }
    }).render();*/
	
	var revenueChart = new FusionCharts({
        type: 'msstackedcolumn2dlinedy',
        renderAt: 'chart-container',
        width: '100%',
        height: '270',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                //"caption": "Quarterly Sales vs. Profit % in Last Year",
                //"subcaption": "Product-wise Break-up - Harry's SuperMart",
                "xAxisName": "Quarter",
                //"pYAxisName": "Sales",
                "sYAxisName": "Profit %",
                
                //"numberPrefix": "$",
                //"numbersuffix": "M",
                //"sNumberSuffix": "%",
                "sYAxisMaxValue": "25",
                
                //Cosmetics
                "paletteColors": "#06c245,#c41300,#c41300",              
                "baseFontColor" : "#333333",
                "baseFont" : "Helvetica Neue,Arial",
                "captionFontSize" : "14",
                "subcaptionFontSize" : "14",
                "subcaptionFontBold" : "0",
                "showBorder" : "0",
                "bgColor" : "#ffffff",
                "showShadow" : "0",
                "canvasBgColor" : "#ffffff",
                "canvasBorderAlpha" : "0",
                "divlineAlpha" : "100",
                "divlineColor" : "#999999",
                "divlineThickness" : "1",
                "divLineIsDashed" : "1",
                "divLineDashLen" : "1",
                "divLineGapLen" : "1",
                "usePlotGradientColor" : "0",
                "showplotborder" : "0",
                "valueFontColor" : "#ffffff",
                "placeValuesInside" : "1",
                "showXAxisLine" : "1",
                "xAxisLineThickness" : "1",
                "xAxisLineColor" : "#999999",
                "showAlternateHGridColor" : "0",
                //"legendBgAlpha" : "0",
                //"legendBorderAlpha" : "0",
                //"legendShadow" : "0",
                //"legendItemFontSize" : "10",
                //"legendItemFontColor" : "#666666"
                
            },
            "categories": [
                {
                    "category": [
                        { "label": "Q1" },
                        { "label": "Q2" },
                        { "label": "Q3" }
                    ]
                }
            ],
            "dataset": [
                {
                    "dataset": [
                        {
                            "seriesname": "Processed Food",
                            "data": [
                                { "value": "30" },
                                { "value": "26" },
                                { "value": "33" }
                            ]
                        },
                    ]
                }
            ],
            "lineset": [
                {
                    "seriesname": "Profit %",
                    "showValues": "0",
                    "data": [
                        { "value": "30" },
                        { "value": "26" },
                        { "value": "33" }
                    ]
                }
            ]
        }
    });
    
    revenueChart.render();
});