$(function () {
    $.getJSON('bodyChart', function (data) {
        console.log(data);
        var xArr = [];
        var yArr = [];
        for (var i=0;i<data.length;i++){
            xArr.push(data[i].date);
            yArr.push(data[i].weight);
        }

        $('#weight-height-chart').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: '历史体重数据'
            },
            xAxis: {
                categories: xArr
            },
            yAxis: {
                title: {
                    text: '体重 (kg)'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: ' ',
                data: yArr
            }]
        });
    });
});