$(function () {
// Let's display some charts
// I have tried different charts models but I found lines the best for this type of information
    var options = {
        chart: {
            renderTo: '',
            type: 'line'
        },
        title: {
            text: ''
        },
        tooltip: {
            shared: true,
            formatter: function () {
                var s = '<b>' + this.x + '</b>';

                $.each(this.points, function (i, point) {
                    if (point.series.name != 'Cl Enabled') {
                        s += '<br/><span style="color:' + point.series.color + '">\u25CF</span> ' + point.series.name + ': ' + point.y;
                    } else {
                        var lb = 'TRUE';

                        if (point.y == 0) {
                            lb = 'FALSE';
                        }

                        s += '<br/><span style="color:' + point.series.color + '">\u25CF</span> ' + point.series.name + ': ' + lb;
                    }
                });

                return s;
            },
        },
        yAxis: {
            title: {
                text: ''
            },
            tickLength: 10
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            },
        },
        series: [{}, {}, {}],
        exporting: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        legend: {
            useHTML: true,
            labelFormatter: function () {
                if (this.name != 'Cl Enabled') {
                    var total = 0;
                    var max = -1;
                    var min = 9999999999999;
                    var avg = 0;

                    for (var i = this.yData.length; i--;) {
                        total += this.yData[i];

                        if (this.yData[i] > max) {
                            max = this.yData[i];
                        }

                        if (this.yData[i] < min) {
                            min = this.yData[i];
                        }
                    }

                    avg = total / this.yData.length;
                    var list = '<ul style="list-style-type:none;margin-left: -30px;"><li><em>Min:</em> ' + min + '</li><li><em>Max: </em>' + max + '</li><li><em>Avg: </em>' + Highcharts.numberFormat(avg, 2) + '</li></ul>';
                    return this.name + '<br> ' + list;

                } else {
                    var v_true = 0;
                    var v_false = 0;

                    for (var i = this.yData.length; i--;) {
                        if (this.yData[i] == 1) {
                            v_true++;
                        } else {
                            v_false++;
                        }
                    }

                    var list = '<ul style="list-style-type:none;margin-left: -30px;"><li><em>TRUE:</em> ' + v_true + '</li><li><em>FALSE: </em>' + v_false + '</li></ul>';
                    return this.name + '<br> ' + list;
                }
            }
        }
    };


//Lets get some print data
    $.getJSON(printDataUrl, function (data) {
        options.chart.renderTo = 'printData';
        options.series[0].data = data.dead_percent.data;
        options.series[0].name = data.dead_percent.name;
        options.series[1].data = data.elasticity.data;
        options.series[1].name = data.elasticity.name;
        options.series[2].data = data.live_percent.data;
        options.series[2].name = data.live_percent.name;
        var printDataChart = new Highcharts.Chart(options);

    });
//Lets get some crosslinking data
    $.getJSON(printCrosslinkUrl, function (data) {
        options.chart.renderTo = 'printCrosslink';
        options.series[0].data = data.cl_duration.data;
        options.series[0].name = data.cl_duration.name;
        options.series[1].data = data.cl_enabled.data;
        options.series[1].name = data.cl_enabled.name;
        options.series[2].data = data.cl_intensity.data;
        options.series[2].name = data.cl_intensity.name;
        var printCrossChart = new Highcharts.Chart(options);
    });
//Lets get some pressure data
    $.getJSON(pressureUrl, function (data) {
        options.chart.renderTo = 'pressureChart';
        options.series[0].data = data.extruder1.data;
        options.series[0].name = data.extruder1.name;
        options.series[1].data = data.extruder2.data;
        options.series[1].name = data.extruder2.name;
        var printPressureChart = new Highcharts.Chart(options);
        printPressureChart.series[2].remove(true);
    });
//Lets get some resolution data
    $.getJSON(resolutionUrl, function (data) {
        options.chart.renderTo = 'resolutionChart';
        options.series[1].data = data.layer_height.data;
        options.series[1].name = data.layer_height.name;
        options.series[0].data = data.layer_num.data;
        options.series[0].name = data.layer_num.name;
        var printPressureChart = new Highcharts.Chart(options);
        printPressureChart.series[2].remove(true);
    });
//these colors are pretty
    Highcharts.setOptions({
        colors: ['#7cb5ec', '#90ed7d', '#f7a35c', '#8085e9',
            '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1']
    });
});