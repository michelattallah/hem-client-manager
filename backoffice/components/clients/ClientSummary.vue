<template>
    <div>
 
        <Logs :id="`client` + client.id" ref="chart" />

        <!-- <Loader v-if="loading" />

        <div v-else>
            <Logs :id="`client` + client.id" ref="chart" />
        </div> -->
    </div>
</template>

<script>
import {mapActions,MapGetters,MapMutations, mapGetters} from 'vuex'
import Loader from '@/components/core/Loader'
import Logs from '@/components/charts/Logs'

export default {
    props:['client' , 'show'],
    data() {
        return {
            loading:false,
            clientSummary:{},
            log: 'chart'
        }
    },
    watch: {
        show(value){
            if(value){
                this.getClientSummary()
            }else{
                this.$refs.chart.destroyChart();
            }
        },
        clientSummary(value){
            this.$refs.chart.renderChart(value.logs);
        }
    },
    components: {
        Loader,
        Logs
    },
    methods: {
        async getClientSummary(){
            this.loading = true;
            const response = await this.$axios.get('/clients/' + this.client.id)
            this.clientSummary = response.data.data;
            this.loading = false;
        }
    },
}
</script>