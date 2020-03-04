<template>
    <div>
        <Loader v-if="loading" />
        <div v-else>
            {{clientSummary}}
        </div>
    </div>
</template>

<script>
import {mapActions,MapGetters,MapMutations, mapGetters} from 'vuex'
import Loader from '@/components/core/Loader'

export default {
    props:['client' , 'show'],
    data() {
        return {
            loading:false,
            clientSummary:{}
        }
    },
    watch: {
        show(value){
            if(value){
                this.getClientSummary()
            }
        }
    },
    components: {
        Loader
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