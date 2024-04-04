// WHOLE
var we_passed;
var we_failed;
var we_in_progress;
var we_dropped;
var we_blocked;
var we_onhold;
var we_not_comp;
var we_no_run;
var we_na;
var we_not_applicable;
var wholeExecutionChart;

var wholeExecutionChartData = [


];



// Daily
var de_passed;
var de_failed;
var de_in_progress;
var de_dropped;
var de_blocked;
var de_onhold;
var de_not_comp;
var de_no_run;
var de_na;
var de_not_applicable;
var dailyExecutionChart;

var dailyExecutionChartData = [


];

AmCharts.ready(function () {
  // WHOLE EXECUTION CHART
  wholeExecutionChart = new AmCharts.AmSerialChart();
  wholeExecutionChart.dataProvider = wholeExecutionChartData;
  wholeExecutionChart.categoryField = "status";
  wholeExecutionChart.startDuration = 1;

  //TODO:
  wholeExecutionChart.addListener("clickGraphItem", wholeExecutionChartClick);

  // AXES
  // category
  var wholeExecutionCategoryAxis = wholeExecutionChart.categoryAxis;
  wholeExecutionCategoryAxis.labelRotation = 45; // this line makes category values to be rotated
  wholeExecutionCategoryAxis.gridAlpha = 0;
  wholeExecutionCategoryAxis.fillAlpha = 0;
  wholeExecutionCategoryAxis.fillColor = "#FF0000";
  wholeExecutionCategoryAxis.gridPosition = "start";


  // GRAPH
  var wholeExecutionGraph = new AmCharts.AmGraph();
  wholeExecutionGraph.valueField = "count";
  wholeExecutionGraph.colorField = "color";
  wholeExecutionGraph.balloonText = "<b>[[category]]: [[value]]</b>";

  wholeExecutionGraph.labelText = '[[value]]';
  wholeExecutionGraph.type = "column";
  wholeExecutionGraph.lineAlpha = 0;
  wholeExecutionGraph.fillAlphas = 1;
  wholeExecutionGraph.showHandOnHover=true;
  wholeExecutionChart.addGraph(wholeExecutionGraph);

  // CURSOR
  var wholeExecutionChartCursor = new AmCharts.ChartCursor();
  wholeExecutionChartCursor.cursorAlpha = 0;
  wholeExecutionChartCursor.zoomable = false;
  wholeExecutionChartCursor.categoryBalloonEnabled = false;
  wholeExecutionChart.addChartCursor(wholeExecutionChartCursor);

  wholeExecutionChart.creditsPosition = "top-right";
  // WHOLE EXECUTION CHART



    // DAILY EXECUTION CHART
  dailyExecutionChart = new AmCharts.AmSerialChart();
  dailyExecutionChart.dataProvider = dailyExecutionChartData;
  dailyExecutionChart.categoryField = "status";
  dailyExecutionChart.startDuration = 1;

  //TODO:
  dailyExecutionChart.addListener("clickGraphItem", dailyExecutionChartClick);

  // AXES
  // category
  var dailyExecutionCategoryAxis = dailyExecutionChart.categoryAxis;
  dailyExecutionCategoryAxis.labelRotation = 45; // this line makes category values to be rotated
  dailyExecutionCategoryAxis.gridAlpha = 0;
  dailyExecutionCategoryAxis.fillAlpha = 0;
  dailyExecutionCategoryAxis.fillColor = "#FF0000";
  dailyExecutionCategoryAxis.gridPosition = "start";


  // GRAPH
  var dailyExecutionGraph = new AmCharts.AmGraph();
  dailyExecutionGraph.valueField = "count";
  dailyExecutionGraph.colorField = "color";
  dailyExecutionGraph.balloonText = "<b>[[category]]: [[value]]</b>";

  dailyExecutionGraph.labelText = '[[value]]';
  dailyExecutionGraph.type = "column";
  dailyExecutionGraph.lineAlpha = 0;
  dailyExecutionGraph.fillAlphas = 1;
  dailyExecutionGraph.showHandOnHover=true;
  dailyExecutionChart.addGraph(dailyExecutionGraph);

  // CURSOR
  var dailyExecutionChartCursor = new AmCharts.ChartCursor();
  dailyExecutionChartCursor.cursorAlpha = 0;
  dailyExecutionChartCursor.zoomable = false;
  dailyExecutionChartCursor.categoryBalloonEnabled = false;
  dailyExecutionChart.addChartCursor(dailyExecutionChartCursor);

  dailyExecutionChart.creditsPosition = "top-right";
  // DAILY EXECUTION CHART

});


function wholeExecutionChartClick(event)
{


    let allPaths = [];

    if (!$("#testsets-jstree").jstree("get_checked",false).length) {
        alert('Please select a Test Set!');
        return;
    }

    $.each($("#testsets-jstree").jstree("get_checked",false),function(){

        var testsetpath = $('#testsets-jstree').jstree().get_path(this, '\\');
        allPaths.push(testsetpath);

    });

    $.ajax({
        type: "GET",
        url: '/getWholeExecutionChartClick',
        dataType: "json",
        data: ({paths: allPaths, pName: event.item.category, pValue: event.item.values.value}),
        beforeSend: function() {  },
        complete: function() {  },
        success: function (returnData) {
            $('#chart-click-table').bootstrapTable("load", returnData);

                    //Refresh overlay hide
                    // $('#refreshTestList').niftyOverlay('hide');
                    //Initialize tooltips
                    $(".add-tooltip").tooltip();
            $('#chart-click-modal').modal('show');
        }
    });
}

function dailyExecutionChartClick(event)
{


    let allPaths = [];

    if (!$("#testsets-jstree").jstree("get_checked",false).length) {
        alert('Please select a Test Set!');
        return;
    }

    $.each($("#testsets-jstree").jstree("get_checked",false),function(){

        var testsetpath = $('#testsets-jstree').jstree().get_path(this, '\\');
        allPaths.push(testsetpath);

    });

    $.ajax({
        type: "GET",
        url: '/getDailyExecutionChartClick',
        dataType: "json",
        data: ({paths: allPaths, pName: event.item.category, pValue: event.item.values.value}),
        beforeSend: function() {  },
        complete: function() {  },
        success: function (returnData) {
            $('#chart-click-table').bootstrapTable("load", returnData);

                    //Refresh overlay hide
                    // $('#refreshTestList').niftyOverlay('hide');
                    //Initialize tooltips
                    $(".add-tooltip").tooltip();
            $('#chart-click-modal').modal('show');
        }
    });
}


function refresh_wholeExecutionChart()
{
    for (var i = 0; i < 11; i++) {
        wholeExecutionChart.dataProvider.shift();
    }
    wholeExecutionChart.dataProvider.push(
        {
            "status": "Passed",
            "count": we_passed,
            "color": "green"
        },
        {
            "status": "Failed",
            "count": we_failed,
            "color": "red"
        },
        {
            "status": "In Progress",
            "count": we_in_progress,
            "color": "orange"
        },
        {
            "status": "Dropped",
            "count": we_dropped,
            "color": "gray"
        },
        {
            "status": "Blocked",
            "count": we_blocked,
            "color": "magenta"
        },
        {
            "status": "Not Applicable",
            "count": we_not_applicable,
            "color": "pink"
        },
        {
            "status": "Not Comp.",
            "count": we_not_comp,
            "color": "#20B2AA"
        },
        {
            "status": "No Run",
            "count": we_no_run,
            "color": "#FFF0F5"
        },
        {
            "status": "N/A",
            "count": we_na,
            "color": "#FFF0F5"
        },
        {
            "status": "On Hold",
            "count": we_onhold,
            "color": "#FFF0F5"
        }
    );
    wholeExecutionChart.write("wholeExecutionGraph");
    wholeExecutionChart.validateData();

}

// WHOLE EXECUTION

// DAILY EXECUTION


function refresh_dailyExecutionChart()
{
    for (var i = 0; i < 11; i++) {
        dailyExecutionChart.dataProvider.shift();
    }
    dailyExecutionChart.dataProvider.push(
        {
            "status": "Passed",
            "count": de_passed,
            "color": "green"
        },
        {
            "status": "Failed",
            "count": de_failed,
            "color": "red"
        },
        {
            "status": "In Progress",
            "count": de_in_progress,
            "color": "orange"
        },
        {
            "status": "Dropped",
            "count": de_dropped,
            "color": "gray"
        },
        {
            "status": "Blocked",
            "count": de_blocked,
            "color": "magenta"
        },
        {
            "status": "Not Applicable",
            "count": de_not_applicable,
            "color": "pink"
        },
        {
            "status": "Not Comp.",
            "count": de_not_comp,
            "color": "#20B2AA"
        },
        {
            "status": "No Run",
            "count": de_no_run,
            "color": "#FFF0F5"
        },
        {
            "status": "N/A",
            "count": de_na,
            "color": "#FFF0F5"
        },
        {
            "status": "On Hold",
            "count": de_onhold,
            "color": "#FFF0F5"
        }
    );
     dailyExecutionChart.write("dailyExecutionGraph");
     dailyExecutionChart.validateData();

}


// DAILY EXECUTION





// GET WHOLE EXECUTION

function getWholeExecution(paths) {
    $.ajax({
        type: "GET",
        url: '/getWholeExecution',
        dataType: "json",
        data: ({paths}),
        beforeSend: function() { /*alert("recep");*/ },
        complete: function() {},
        success: function (data) {

            we_passed = data.Passed;
            we_failed = data.Failed;
            we_no_run = data.No_Run;
            we_in_progress = data.In_Progress;
            we_not_comp = data.Not_Completed;
            we_blocked = data.Blocked;
            we_dropped = data.Dropped;
            we_onhold = data.OnHold;
            we_na = data.NA;
            we_not_applicable = data.Not_Applicable;

            $('#wholeExecutionTotalNumber').text(data.Total);
            refresh_wholeExecutionChart();
        }
      });
}


// GET WHOLE EXECUTION


// GET WHOLE EXECUTION

function getDailyExecution(paths) {
    $.ajax({
        type: "GET",
        url: '/getDailyExecution',
        dataType: "json",
        data: ({paths}),
        beforeSend: function() { /*alert("recep");*/ },
        complete: function() {},
        success: function (data) {

            de_passed = data.Passed;
            de_failed = data.Failed;
            de_no_run = data.No_Run;
            de_in_progress = data.In_Progress;
            de_not_comp = data.Not_Completed;
            de_blocked = data.Blocked;
            de_dropped = data.Dropped;
            de_onhold = data.OnHold;
            de_na = data.NA;
            de_not_applicable = data.Not_Applicable;

            $('#dailyExecutionTotalNumber').text(data.Total);
          refresh_dailyExecutionChart();
        }
      });
}


// GET WHOLE EXECUTION





// GET EXECUTION PERCENTAGE

function getExecutionProgress(paths) {
    $.ajax({
        type: "GET",
        url: '/getExecutionPercentage',
        dataType: "JSON",
        data: ({paths}),
        beforeSend: function () {

        },
        complete: function () {

        },
        success: function (data) {
            $('#executionProgress').attr('style', 'width: ' + data + '%');
            $('#executionProgress').text(data + '%');
        }
    });
}

// GET EXECUTION PERCENTAGE



// GET ALL DEFECTS STATUS
function getAllDefectsStatus() {
    $.ajax({
        type: "GET",
        url: '/getAllDefectsStatusForRegression',
        dataType: "JSON",
        data: ({}),
        beforeSend: function () {

        },
        complete: function () {

        },
        success: function (data) {
            $('#total_defects').text(data.Total);
            $('#total_open_defects').text(data.TotalOpenDefects);
            $('#total_fixed_defects').text(data.Fixed);
            $('#total_closed_defects').text(data.TotalClosedDefects);
        }
    });
}
// GET ALL DEFECTS STATUS




// Generate button click

$('#btn-generate-report').on('click', function() {
    var btn = $(this).button('loading');

    let allPaths = [];

    if (!$("#testsets-jstree").jstree("get_checked",false).length) {
        alert('Please select a Test Set!');
        btn.button('reset');
        return;
    }

    $.each($("#testsets-jstree").jstree("get_checked",false),function(){

        var testsetpath = $('#testsets-jstree').jstree().get_path(this, '\\');
        allPaths.push(testsetpath);

    });


    getExecutionProgress(allPaths);
    getWholeExecution(allPaths);
    getAllDefectsStatus();
    getDailyExecution(allPaths);

    btn.button('reset');

});



// Generate button click
