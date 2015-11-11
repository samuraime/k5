$(function() {
    /* 请求图表数据表单 */
    var tableSelect = $('#chart-table-select');
    var typeSelect = $('#chart-type-select');
    var categorySelect = $('#chart-category-select');
    var optionSelect = $('#chart-option-select');
    var resetSelect = function(select) {
        select.children().not(':first').remove();
    }

    for (var tableName in options.table) {
        tableSelect.append('<option value="' + tableName + '">' + options.table[tableName].name + '</option>');
    }

    tableSelect.change(function() {
        resetSelect(typeSelect);
        if (tableSelect.val() != 0) {
            var table = $(this).val();
            for (var type in options.table[table].charts) {
                typeSelect.append('<option value="' + type + '">' + options.type[type] + '</option>');
            }
        }
    });

    typeSelect.change(function() {
        resetSelect(categorySelect);
        if (typeSelect.val() != 0) {
            var type = $(this).val();
            var categories = options.table[tableSelect.val()].charts[type];
            for (var category in categories) {
                categorySelect.append('<option value="' + category + '">' + categories[category] + '</option>');
            }
        }
    });

    categorySelect.change(function() {
        resetSelect(optionSelect);
        if (typeSelect.val() != 0) {

        }
    });

    /* 生成图表 */
    var chartContainer = $('#chart-container');
    var chartOptions = {};
    var renderChart = function(data) {
        chartOptions.title = $('#chart-title').val(),
        chartOptions.subtitle = $('#chart-subtitle').val(),
        chartOptions.xTitle = $('#chart-xtitle').val(),
        chartOptions.yTitle = $('#chart-ytitle').val();
        chartOptions['3d'] = $('#chart-3d')[0].checked;

        var chartFn = chartOptions.type + 'Chart';
        var options = eval(chartFn)(chartOptions, data);

        chartContainer.highcharts(options);
    }

    var lineChart = function(options, data) {
        return {
            title: {
                text: options.title,
                x: -20 //center
            },
            subtitle: {
                text: options.subtitle,
                x: -20
            },
            xAxis: {
                categories: data.categories,
            },
            yAxis: {
                title: {
                    text: options.yTitle,
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '',
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: '',
                data: data.data,
            }]
        }
    }

    var barChart = function(options, data) {
        return {
            chart: {
                type: 'bar'
            },
            title: {
                text: options.title,
            },
            subtitle: {
                text: options.subtitle,
            },
            xAxis: {
                categories: data.categories,
                title: {
                    text: options.xTitle,
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: options.yTitle,
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: '',
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: '',
                data: data.data,
            }]
        }
    }

    var columnChart = function(options, data) {
        var config = {
            chart: {
                type: 'column'
            },
            title: {
                text: options.title,
            },
            subtitle: {
                text: options.subtitle,
            },
            xAxis: {
                categories: data.categories,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: options.yTitle,
                }
            },
            tooltip: {
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: '',
                data: data.data,
            }]
        }

        if (options['3d']) {
            config.chart.options3d = {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        }
        return config;
    }

    var pieChart = function(options, data) {
        var config = {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: options.title,
            },
            subtitle: {
                text: options.subtitle,
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: "Brands",
                colorByPoint: true,
                data: data.data,
            }]
        }

        if (options['3d']) {
            config.chart.options3d = {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        }

        return config;
    }

    $('#chart-submit').click(function() {
        // 验证表单, 生成请求数据
        var table = tableSelect.val(),
            type = typeSelect.val(),
            category = categorySelect.val(),
            start = $('#chart-start').val(),
            end = $('#chart-end').val();
        if (!(table != 0 && type != 0 && category != 0)) {
            return;
        }

        chartOptions = {
            table: table,
            type: type,
            category: category,
            start: start,
            end: end,
        }
        // 拉取数据, 生成图表
        $.ajax({
            url: '/admin/summary/chart',
            data: chartOptions,
            method: 'GET',
            success: function(data) {
                renderChart(data)
            },
            error: function() {},
        });
    });
});