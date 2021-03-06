module.exports = function () {
    /**
     * @type {?Number}
     */
    var budgetId = null;

    /**
     * @type {?Highcharts}
     */
    var chart = null;

    /**
     * @returns {}
     */
    function registerBinds() {
        $('#budget-history-group-mode').on('change', function () {
            if (chart === null) {
                return;
            }

            var unitMap = {
                'daily': 'day',
                'weekly': 'week',
                'monthly': 'month',
                'yearly': 'year',
            };

            var unit = unitMap[$(this).val()];

            chart.series[0].update({
                dataGrouping: {
                    approximation: 'sum',
                    enabled: true,
                    forced: true,
                    units: [
                        [unit, [1]],
                    ],
                },
            });
        });
    }

    /**
     * @param {[]} rows
     * @returns {}
     */
    function prepareChart(rows) {
        var seriesData = [];

        $(rows).each(function (idx, val) {
            var date = Date.UTC(val[0][0], val[0][1], val[0][2]),
                value = val[1];

            seriesData.push([
                date,
                value,
            ]);
        });

        if (seriesData.length > 0) {
            chart = Highcharts.stockChart('budget-history', {
                chart: {
                    zoomType: 'x',
                },

                title: {
                    text: __('views.finances.budgets.show.history.chart.title'),
                },

                xAxis: {
                    type: 'datetime',
                },

                yAxis: {
                    title: {
                        text: __('views.finances.budgets.show.history.chart.y-axis-title'),
                    },
                },

                legend: {
                    enabled: false,
                },

                tooltip: {
                    valueDecimals: 2,
                },

                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1,
                            },

                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')],
                            ],
                        },

                        marker: {
                            radius: 1,
                        },

                        threshold: null,
                    },
                },

                rangeSelector: {
                    buttons: [
                        {
                            type: 'day',
                            count: 3,
                            text: __('js.highcharts.custom.range-selectors.3-days'),
                        },

                        {
                            type: 'week',
                            count: 1,
                            text: __('js.highcharts.custom.range-selectors.1-week'),
                        },

                        {
                            type: 'month',
                            count: 1,
                            text: __('js.highcharts.custom.range-selectors.1-month'),
                        },

                        {
                            type: 'month',
                            count: 6,
                            text: __('js.highcharts.custom.range-selectors.6-months'),
                        },

                        {
                            type: 'year',
                            count: 1,
                            text: __('js.highcharts.custom.range-selectors.1-year'),
                        },

                        {
                            type: 'all',
                            text: __('js.highcharts.custom.range-selectors.all'),
                        },
                    ],

                    selected: 3,
                },

                series: [
                    {
                        type: 'area',
                        name: __('views.finances.budgets.show.history.chart.y-axis-title'),
                        data: seriesData,
                    },
                ],
            });

            $('#budget-history-group-mode').trigger('change');
        }
    }

    return {

        /**
         * @param {{}} options
         * @return {}
         */
        initializeView: function (options) {
            budgetId = options.budgetId;

            $(function () {
                registerBinds();
                prepareChart(options.recentTransactionsChart);
            });
        },

    };
}();