<template>
   
    <div class="text-xs-center pagination-container">
        <center>
            <small class="grey--text">
                Showing {{meta.from}} to {{meta.to}} of {{meta.total}} entries
            </small>
        </center>
        <v-pagination
        v-if="length > 1"
        circle
        v-model="page"
        :length="length"
        :total-visible="7"
        @input="paginate()"
        color="accent"
        ></v-pagination>
    </div>

</template>
<script>
export default {
    props: ['length' , 'meta'],
    data(){
        return{
            page: 1  
        } 
    },
    methods: {
        paginate(){
           this.$emit('paginate' , this.page)
        }
    }
}
</script>