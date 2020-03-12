<template>
    <div>
        <div :id="id" style="width:100%" v-show="show"></div>
    </div>
</template>

<script>
import ApexCharts from 'apexcharts'

export default {
    props:['id'],
    components:{

    },
    data: function() {
        return {
            chart :{},
            show: false
        }
    },
    computed: {
    },

    mounted() {
        
    },
    methods: {
        renderChart(data) {
            var options = {
                series: data.series,
                chart: {
                height: 350,
                type: 'line',
                zoom: {
                        enabled: true
                    },
                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    width: 2,
                    curve: 'straight',
                    dashArray: [0]
                },
                title: {
                    text: 'Usage Overview',
                    align: 'left'
                },
                legend: {
                    tooltipHoverFormatter: function(val, opts) {
                        return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                    }
                },
                markers: {
                    size: 0,
                    hover: {
                        sizeOffset: 6
                    }
                    },
                xaxis: {
                    categories: data.categories,
                },
                tooltip: {
                    y: [
                        {
                        title: {
                            formatter: function (val) {
                            return val + " (leads)"
                            }
                        }
                        },
                        {
                        title: {
                            formatter: function (val) {
                            return val + " (messages)"
                            }
                        }
                        },
                        {
                        title: {
                            formatter: function (val) {
                            return val + " (minutes)";
                            }
                        }
                        }
                    ]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
                };
                this.chart = new ApexCharts(document.querySelector('#' + this.id ), options);
                this.chart.render();
                this.show = true
        },
        destroyChart(){
           this.show = false
           ApexCharts.exec('#'+ this.id, 'destroy')
        }
    }
 
}
</script>
