$(function () {
    $.getJSON('weekChart', function (data) {
        console.log(data);
        var arr = [];
        for (var i=0;i<data.length;i++){
            arr.push(data[i].calorie);
        }

        Highcharts.chart('week-sport-chart', {
            title: {
                text: '本周运动消耗量',
                x: -20 //center
            },
            xAxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
            },
            yAxis: {
                title: {
                    text: 'Calorie'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' Calorie'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Calorie',
                data: arr
            }]
        });

    });

    $.getJSON('monthChart', function (data) {
        console.log(data);
        var arr = [];
        for (var i=0;i<data.length;i++){
            arr.push(data[i].calorie);
        }

        Highcharts.chart('month-sport-chart', {
            title: {
                text: '本月运动消耗量',
                x: -20 //center
            },
            xAxis: {
                categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']
            },
            yAxis: {
                title: {
                    text: 'Calorie'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' Calorie'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Calorie',
                data: arr
            }]
        });

    });

});
