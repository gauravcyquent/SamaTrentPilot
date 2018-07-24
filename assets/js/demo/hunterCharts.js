$(function () {

    var lineData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Example dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "Example dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.7)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(26,179,148,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var lineOptions = {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    };


    /*var ctx = document.getElementById("lineChart").getContext("2d");
     var myNewChart = new Chart(ctx).Line(lineData, lineOptions);*/

    var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }

    /* Charts For KPI NTB */

    var ntbData = {
        labels: months,
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(250,150,5,1)",
                strokeColor: "rgba(250,150,5,1)",
                highlightFill: "rgba(250,150,5,1)",
                highlightStroke: "rgba(250,150,5,1)",
                data: [65, 59, 80, 81]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(0,114,66,1)",
                strokeColor: "rgba(0,114,66,1)",
                highlightFill: "rgba(0,114,66,1)",
                highlightStroke: "rgba(0,114,66,1)",
                data: financialntb
            }
        ]
    };

    var ntbOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }


    var ntb = document.getElementById("ntbChart").getContext("2d");
    var myNewChart = new Chart(ntb).Bar(ntbData, ntbOptions);
	
    /* End OF charts for KPI NTB */

    /* Charts For Loan Bundle */

    var loanbundleChartData = {
        labels: months,
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(250,150,5,1)",
                strokeColor: "rgba(250,150,5,1)",
                highlightFill: "rgba(250,150,5,1)",
                highlightStroke: "rgba(250,150,5,1)",
                data: [65, 59, 80, 81]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(0,114,66,1)",
                strokeColor: "rgba(0,114,66,1)",
                highlightFill: "rgba(0,114,66,1)",
                highlightStroke: "rgba(0,114,66,1)",
                data: ntbwithloadbundle
            }
        ]
    };

    var loanbundleChartOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }


    var loanbundleChart = document.getElementById("loanbundleChart").getContext("2d");
    var myNewChart = new Chart(loanbundleChart).Bar(loanbundleChartData, loanbundleChartOptions);

    /* End OF charts for Loan Bundle */
    
    /* Charts For Successfull referals */

    var refferalChartData = {
        labels: months,
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(250,150,5,1)",
                strokeColor: "rgba(250,150,5,1)",
                highlightFill: "rgba(250,150,5,1)",
                highlightStroke: "rgba(250,150,5,1)",
                data: [65, 59, 80, 81]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(0,114,66,1)",
                strokeColor: "rgba(0,114,66,1)",
                highlightFill: "rgba(0,114,66,1)",
                highlightStroke: "rgba(0,114,66,1)",
                data: ntbwithloadbundle
            }
        ]
    };

    var refferalChartOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }


    var refferalChart = document.getElementById("refferalChart").getContext("2d");
    var myNewChart = new Chart(refferalChart).Bar(refferalChartData, refferalChartOptions);

    /* End OF charts for Successfull referals */
    
    /* Charts For NTB Without Loans */

    var ntbwithoutLoanChartData = {
        labels: months,
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(250,150,5,1)",
                strokeColor: "rgba(250,150,5,1)",
                highlightFill: "rgba(250,150,5,1)",
                highlightStroke: "rgba(250,150,5,1)",
                data: [65, 59, 80, 81]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(0,114,66,1)",
                strokeColor: "rgba(0,114,66,1)",
                highlightFill: "rgba(0,114,66,1)",
                highlightStroke: "rgba(0,114,66,1)",
                data: ntbwithoutloan
            }
        ]
    };

    var ntbwithoutLoanChartOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }


    var ntbwithoutLoanChart = document.getElementById("ntbwithoutLoanChart").getContext("2d");
    var myNewChart = new Chart(ntbwithoutLoanChart).Bar(ntbwithoutLoanChartData, ntbwithoutLoanChartOptions);

    /* End OF charts for NTB Without Loans*/
    
     /* Charts For NTB Without Loans */

    var ntbwithLoanChartData = {
        labels: months,
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(250,150,5,1)",
                strokeColor: "rgba(250,150,5,1)",
                highlightFill: "rgba(250,150,5,1)",
                highlightStroke: "rgba(250,150,5,1)",
                data: [65, 59, 80, 81]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(0,114,66,1)",
                strokeColor: "rgba(0,114,66,1)",
                highlightFill: "rgba(0,114,66,1)",
                highlightStroke: "rgba(0,114,66,1)",
                data: ntbwithloan
            }
        ]
    };

    var ntbwithLoanChartOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
    }


    var ntbwithLoanChart = document.getElementById("ntbwithLoanChart").getContext("2d");
    var myNewChart = new Chart(ntbwithLoanChart).Bar(ntbwithLoanChartData, ntbwithLoanChartOptions);

    /* End OF charts for NTB Loans*/


    /*var ctx = document.getElementById("barChart").getContext("2d");
     var myNewChart = new Chart(ctx).Bar(barData, barOptions);*/

    /*var ctx = document.getElementById("barChart1").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);

    var ctx = document.getElementById("barChart2").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);

    var ctx = document.getElementById("barChart3").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);

    var ctx = document.getElementById("barChart4").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);*/

    var polarData = [
        {
            value: 300,
            color: "#a3e1d4",
            highlight: "#1ab394",
            label: "App"
        },
        {
            value: 140,
            color: "#dedede",
            highlight: "#1ab394",
            label: "Software"
        },
        {
            value: 200,
            color: "#b5b8cf",
            highlight: "#1ab394",
            label: "Laptop"
        }
    ];

    var polarOptions = {
        scaleShowLabelBackdrop: true,
        scaleBackdropColor: "rgba(255,255,255,0.75)",
        scaleBeginAtZero: true,
        scaleBackdropPaddingY: 1,
        scaleBackdropPaddingX: 1,
        scaleShowLine: true,
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 2,
        animationSteps: 100,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
    };

    /*var ctx = document.getElementById("polarChart").getContext("2d");
     var myNewChart = new Chart(ctx).PolarArea(polarData, polarOptions);*/

    var doughnutData = [
        {
            value: 300,
            color: "#a3e1d4",
            highlight: "#1ab394",
            label: "App"
        },
        {
            value: 50,
            color: "#dedede",
            highlight: "#1ab394",
            label: "Software"
        },
        {
            value: 100,
            color: "#b5b8cf",
            highlight: "#1ab394",
            label: "Laptop"
        }
    ];

    var doughnutOptions = {
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 2,
        percentageInnerCutout: 45, // This is 0 for Pie charts
        animationSteps: 100,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
    };


    /*var ctx = document.getElementById("doughnutChart").getContext("2d");
     var myNewChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);*/


    var radarData = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 90, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 96, 27, 100]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    /*var ctx = document.getElementById("radarChart").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);*/



});