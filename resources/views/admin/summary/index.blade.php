@extends('admin.layout')

@section('title', $secondaryNav)
@section('nav-primary', $primaryNav)
@section('nav-secondary', $secondaryNav)

@section('content')
<ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
    <li>
        <a href="/admin/talent" class="am-text-success">
            <span class="am-icon-btn am-icon-file"></span>
            <br>人才信息
            <br>{{ $stat['talent'] }}
        </a>
    </li>
    <li>
        <a href="/admin/enterprise" class="am-text-warning">
            <span class="am-icon-btn am-icon-file-text"></span>
            <br>企业信息
            <br>{{ $stat['enterprise'] }}
        </a>
    </li>
    <li>
        <a href="/admin/log" class="am-text-danger">
            <span class="am-icon-btn am-icon-calendar"></span>
            <br>访问日志
            <br>{{ $stat['log'] }}
        </a>
    </li>
    <li>
        <a href="/admin/message" class="am-text-secondary">
            <span class="am-icon-btn am-icon-pencil-square-o"></span>
            <br>留言记录
            <br>{{ $stat['message'] }}
        </a>
    </li>
</ul>
<hr/>
<div class="am-g">
    <div id="chart-container" class="am-u-sm-12">
    </div>
</div>
<form id="chart-form" class="am-form am-form-horizontal">
    <h3 class="yaheis am-text-primary"><i class="am-icon-table "></i> 选择数据 <span>必填</span></h3>
    <div class="am-form-group">
        <div class="am-u-md-6 am-u-sm-12 am-u-lg-3">
            <label>数据来源：</label>
            <select id="chart-table-select" data-am-selected>
                <option value="0">数据来源</option>
            </select>
        </div>
        <div class="am-u-md-6 am-u-sm-12 am-u-lg-3">
            <label>图表类型：</label>
            <select id="chart-type-select" data-am-selected>
                <option value="0">图表类型</option>
            </select>
        </div>
        <div class="am-u-md-6 am-u-sm-12 am-u-lg-3">
            <label>分组数据：</label>
            <select id="chart-category-select" data-am-selected>
                <option value="0">分组依据</option>
            </select>
        </div>
        <div class="am-u-md-6 am-u-sm-12 am-u-lg-3">
            <label>其他选项：</label>
            <select id="chart-option-select" data-am-selected>
                <option value="0">其他选项</option>
            </select>
        </div>
    </div>
    <h3 class="yaheis am-text-primary"><i class="am-icon-clock-o"></i> 筛选数据 <span class="optional">选填</span></h3>
    <div class="am-form-group">
        <div class="am-u-sm-3">
            <div class="am-input-group am-datepicker-date" data-am-datepicker="{format: 'yyyy-mm-dd'}">
                <input type="text" class="am-form-field" placeholder="开始时间" id="chart-start" />
                <span class="am-input-group-btn am-datepicker-add-on">
                    <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
                </span>
            </div>
        </div>
        <div class="am-u-sm-3 am-u-end">
            <div class="am-input-group am-datepicker-date" data-am-datepicker="{format: 'yyyy-mm-dd'}">
                <input type="text" class="am-form-field" placeholder="结束时间" id="chart-end" />
                <span class="am-input-group-btn am-datepicker-add-on">
                    <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
                </span>
            </div>
        </div>
    </div>
    <h3 class="yaheis am-text-primary"><i class="am-icon-area-chart"></i> 图表信息 <span class="optional">选填</span></h3>
    <div class="am-form-group">
        <div class="am-u-sm-3">
            <label>图表标题：</label>
            <input type="text" id="chart-title" placeholder="图表标题" class="am-u-sm-12"/>
        </div>
        <div class="am-u-sm-3">
            <label>子标题：</label>
            <input type="text" id="chart-subtitle" placeholder="子标题" class="am-u-sm-12"/>
        </div>
        <div class="am-u-sm-3">
            <label>X轴标题：</label>
            <input type="text" id="chart-xtitle" placeholder="X轴标题" class="am-u-sm-12"/>
        </div>
        <div class="am-u-sm-3">
            <label>Y轴标题：</label>
            <input type="text" id="chart-ytitle" placeholder="Y轴标题" class="am-u-sm-12"/>
        </div>
    </div>
    <div class="am-form-group">
        <div class="am-u-sm-3">
            <label>系列名称：</label>
            <input type="text" id="chart-series-name" placeholder="系列名称" class="am-u-sm-12" value="信息"/>
        </div>
        <div class="am-u-sm-3">
            <label>提示前缀：</label>
            <input type="text" id="chart-tooltip-prefix" placeholder="提示前缀" class="am-u-sm-12" value="" />
        </div>
        <div class="am-u-sm-3">
            <label>提示后缀：</label>
            <input type="text" id="chart-tooltip-suffix" placeholder="提示后缀" class="am-u-sm-12" value="个" />
        </div>
        <div class="am-u-sm-3">
        </div>
    </div>
    <div class="am-form-group">
        <div class="am-u-sm-3 am-u-end">
            <label>
                <input id="chart-3d" type="checkbox"> 3D(柱状图, 饼图)
            </label>
        </div>
    </div>
    <div class="am-form-group">
        <button type="button" id="chart-submit" class="am-u-sm-offset-4 am-u-sm-4 am-btn am-btn-primary">生成图表</button>
    </div>
</form>
@stop

@section('foot-assets')
<script type="text/javascript" src="/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="/js/highcharts/highcharts-3d.js"></script>
<script type="text/javascript" src="/js/highcharts/highcharts-more.js"></script>
<script type="text/javascript" src="/js/highcharts/exporting.js"></script>
<script type="text/javascript">
    var options = {!! json_encode($chart) !!};
</script>
<script type="text/javascript" src="/js/chart.js"></script>
<script type="text/javascript">

//     $(function () {
//         $.get('/admin/summary/personnel-by-gender-month', {}, function(personnels) {
//             var options = {
//                 chart: {
//                     type: 'column'
//                 },
//                 title: {
//                     text: '千人的出生月'
//                 },
//                 subtitle: {
//                     text: 'Source: nwsuaf.edu.cn'
//                 },
//                 xAxis: {
//                     categories: [
//                     'Jan',
//                     'Feb',
//                     'Mar',
//                     'Apr',
//                     'May',
//                     'Jun',
//                     'Jul',
//                     'Aug',
//                     'Sep',
//                     'Oct',
//                     'Nov',
//                     'Dec'
//                     ],
//                     crosshair: true
//                 },
//                 yAxis: {
//                     min: 0,
//                     title: {
//                         text: '人数'
//                     }
//                 },
//                 tooltip: {
//                     headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//                     pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
//                     '<td style="padding:0"><b>{point.y:f} 人</b></td></tr>',
//                     footerFormat: '</table>',
//                     shared: true,
//                     useHTML: true
//                 },
//                 plotOptions: {
//                     column: {
//                         pointPadding: 0.2,
//                         borderWidth: 0
//                     }
//                 },
//                 series: [{
//                     name: 'male',
//                     data: personnels.male

//                 }, {
//                     name: 'female',
//                     data: personnels.female

//                 }]
//             }

//         // $('#column-basic').highcharts(options);

//         var chart = new Highcharts.Chart({
//             chart: {
//                 renderTo: 'column-3d',
//                 type: 'column',
//                 margin: 75,
//                 options3d: {
//                     enabled: true,
//                     alpha: 15,
//                     beta: 15,
//                     depth: 50,
//                     viewDistance: 25
//                 }
//             },
//             title: {
//                 text: 'Chart rotation demo'
//             },
//             subtitle: {
//                 text: 'Test options by dragging the sliders below'
//             },
//             xAxis: {
//                 categories: [
//                 'Jan',
//                 'Feb',
//                 'Mar',
//                 'Apr',
//                 'May',
//                 'Jun',
//                 'Jul',
//                 'Aug',
//                 'Sep',
//                 'Oct',
//                 'Nov',
//                 'Dec'
//                 ],
//                 crosshair: true
//             },
//             yAxis: {
//                 min: 0,
//                 title: {
//                     text: '人数'
//                 }
//             },            plotOptions: {
//                 column: {
//                     depth: 25
//                 }
//             },
//             series: [{
//                 name: 'male',
//                 data: personnels.male

//             }, {
//                 name: 'female',
//                 data: personnels.female

//             }]
//         });

// }, 'json');

// });

// $(function () {
//     $.get('/admin/summary/personnel-by-gender-height-weight', {}, function(data) {
//         var options = {
//             chart: {
//                 type: 'scatter',
//                 zoomType: 'xy'
//             },
//             title: {
//                 text: 'Height Versus Weight of 1000 Individuals by Gender'
//             },
//             subtitle: {
//                 text: 'Source: nwsuaf.edu.cn'
//             },
//             xAxis: {
//                 title: {
//                     enabled: true,
//                     text: 'Height (cm)'
//                 },
//                 startOnTick: true,
//                 endOnTick: true,
//                 showLastLabel: true
//             },
//             yAxis: {
//                 title: {
//                     text: 'Weight (kg)'
//                 }
//             },
//             legend: {
//                 layout: 'vertical',
//                 align: 'left',
//                 verticalAlign: 'top',
//                 x: 100,
//                 y: 70,
//                 floating: true,
//                 backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
//                 borderWidth: 1
//             },
//             plotOptions: {
//                 scatter: {
//                     marker: {
//                         radius: 5,
//                         states: {
//                             hover: {
//                                 enabled: true,
//                                 lineColor: 'rgb(100,100,100)'
//                             }
//                         }
//                     },
//                     states: {
//                         hover: {
//                             marker: {
//                                 enabled: false
//                             }
//                         }
//                     },
//                     tooltip: {
//                         headerFormat: '<b>{series.name}</b><br>',
//                         pointFormat: '{point.x} cm, {point.y} kg'
//                     }
//                 }
//             },
//             series: [{
//                 name: 'Female',
//                 color: 'rgba(223, 83, 83, .5)',
//                 data: data.female
//             }, {
//                 name: 'Male',
//                 color: 'rgba(119, 152, 191, .5)',
//                 data: data.male
//             }]
//         }

//         $('#scatter-plot').highcharts(options);
//     }, 'json');

// });

// $(function () {
//     $.get('/admin/summary/personnel-by-occupation', {}, function(data) {
//         var type = ['其他', '技能型', '研究型', '艺术型', '经营型', '社交型', '事务型'];
//         data = data.map(function(item, index) {
//             return {
//                 name: type[index],
//                 y: item.count
//             };
//         });

//         var options = {
//             chart: {
//                 plotBackgroundColor: null,
//                 plotBorderWidth: null,
//                 plotShadow: false,
//                 type: 'pie'
//             },
//             title: {
//                 text: '职业类型'
//             },
//             tooltip: {
//                 pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//             },
//             plotOptions: {
//                 pie: {
//                     allowPointSelect: true,
//                     cursor: 'pointer',
//                     dataLabels: {
//                         enabled: false
//                     },
//                     showInLegend: true
//                 }
//             },
//             series: [{
//                 name: "比重",
//                 colorByPoint: true,
//                 data: data
//             }]
//         }
//         $('#pie-with-legend').highcharts(options);


//         $('#pie-with-legend-3d').highcharts({
//             chart: {
//                 type: 'pie',
//                 options3d: {
//                     enabled: true,
//                     alpha: 45,
//                     beta: 0
//                 }
//             },
//             title: {
//                 text: '职业类型'
//             },
//             tooltip: {
//                 pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//             },
//             plotOptions: {
//                 pie: {
//                     allowPointSelect: true,
//                     cursor: 'pointer',
//                     depth: 35,
//                     dataLabels: {
//                         enabled: true,
//                         format: '{point.name}'
//                     },
//                     showInLegend: true
//                 }
//             },
//             series: [{
//                 name: "比重",
//                 colorByPoint: true,
//                 data: data
//             }]
//         });
//     }, 'json');
// });
</script>
@stop