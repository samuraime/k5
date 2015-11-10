@extends('admin.layout')

@section('title', '数据统计')

@section('content')
<div class="am-cf am-padding border-bottom">
    <div class="am-fl am-cf">
        <strong class="am-text-primary am-text-lg">数据列表</strong> /
        <small>企业列表</small>
    </div>
</div>
<ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
    <li>
        <a href="#" class="am-text-success">
            <span class="am-icon-btn am-icon-file-text"></span>
            <br>新增页面
            <br>2300</a>
    </li>
    <li>
        <a href="#" class="am-text-warning">
            <span class="am-icon-btn am-icon-briefcase"></span>
            <br>成交订单
            <br>308</a>
    </li>
    <li>
        <a href="#" class="am-text-danger">
            <span class="am-icon-btn am-icon-recycle"></span>
            <br>昨日访问
            <br>80082</a>
    </li>
    <li>
        <a href="#" class="am-text-secondary">
            <span class="am-icon-btn am-icon-user-md"></span>
            <br>在线用户
            <br>3000</a>
    </li>
</ul>
<div class="am-g">
    <div id="column-basic" class="am-u-sm-12">
    </div>
</div>
<div class="am-g">
    <div id="column-3d" class="am-u-sm-12">
    </div>
</div>
<div class="am-g">
    <div id="scatter-plot" class="am-u-sm-12">
    </div>
</div>
<div class="am-g">
    <div id="pie-with-legend" class="am-u-sm-12">
    </div>
</div>
<div class="am-g">
    <div id="pie-with-legend-3d" class="am-u-sm-12">
    </div>
</div>
@stop

@section('foot-assets')
<script type="text/javascript" src="/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="/js/highcharts/highcharts-3d.js"></script>
<script type="text/javascript" src="/js/highcharts/highcharts-more.js"></script>
<script type="text/javascript">
$(function () {
    $.get('/admin/summary/personnel-by-gender-month', {}, function(personnels) {
        var options = {
            chart: {
                type: 'column'
            },
            title: {
                text: '千人的出生月'
            },
            subtitle: {
                text: 'Source: nwsuaf.edu.cn'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '人数'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:f} 人</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'male',
                data: personnels.male

            }, {
                name: 'female',
                data: personnels.female

            }]
        }

        $('#column-basic').highcharts(options);

        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'column-3d',
                type: 'column',
                margin: 75,
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 50,
                    viewDistance: 25
                }
            },
            title: {
                text: 'Chart rotation demo'
            },
            subtitle: {
                text: 'Test options by dragging the sliders below'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '人数'
                }
            },            plotOptions: {
                column: {
                    depth: 25
                }
            },
            series: [{
                name: 'male',
                data: personnels.male

            }, {
                name: 'female',
                data: personnels.female

            }]
        });

    }, 'json');

});

$(function () {
    $.get('/admin/summary/personnel-by-gender-height-weight', {}, function(data) {
        var options = {
            chart: {
                type: 'scatter',
                zoomType: 'xy'
            },
            title: {
                text: 'Height Versus Weight of 1000 Individuals by Gender'
            },
            subtitle: {
                text: 'Source: nwsuaf.edu.cn'
            },
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Height (cm)'
                },
                startOnTick: true,
                endOnTick: true,
                showLastLabel: true
            },
            yAxis: {
                title: {
                    text: 'Weight (kg)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
                borderWidth: 1
            },
            plotOptions: {
                scatter: {
                    marker: {
                        radius: 5,
                        states: {
                            hover: {
                                enabled: true,
                                lineColor: 'rgb(100,100,100)'
                            }
                        }
                    },
                    states: {
                        hover: {
                            marker: {
                                enabled: false
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<b>{series.name}</b><br>',
                        pointFormat: '{point.x} cm, {point.y} kg'
                    }
                }
            },
            series: [{
                name: 'Female',
                color: 'rgba(223, 83, 83, .5)',
                data: data.female
            }, {
                name: 'Male',
                color: 'rgba(119, 152, 191, .5)',
                data: data.male
            }]
        }

        $('#scatter-plot').highcharts(options);
    }, 'json');

});

$(function () {
    $.get('/admin/summary/personnel-by-occupation', {}, function(data) {
        var type = ['其他', '技能型', '研究型', '艺术型', '经营型', '社交型', '事务型'];
        data = data.map(function(item, index) {
            return {
                name: type[index],
                y: item.count
            };
        });

        var options = {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '职业类型'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: "比重",
                colorByPoint: true,
                data: data
            }]
        }
        $('#pie-with-legend').highcharts(options);


        $('#pie-with-legend-3d').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: '职业类型'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: "比重",
                colorByPoint: true,
                data: data
            }]
        });
    }, 'json');
});
</script>
@stop