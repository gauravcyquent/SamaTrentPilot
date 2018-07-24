$(function () {


    /* Charts For KPI NTB */
    //alert(months);
    var months = ['Jan', 'Feb', 'Mar']
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
        barValueSpacing: 15,
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
                data: financialntb
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
                data: financialntb
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
                data: financialntb
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
                data: financialntb
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


});