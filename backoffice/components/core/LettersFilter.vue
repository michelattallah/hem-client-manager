<template>
    <div class="d-flex alpha-container">
        <ul class="alpha-list d-flex  justify-center align-center">
            <li class="text-uppercase" :class="{'active': selected == letter}" v-for="letter in letters" :key="letter" @click="filter(letter)">{{letter}}</li>
        </ul>
    </div>
</template>
<script>
export default {
    props:['selected'],
    data(){
        return {
            letters: ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
        }
    },
    methods:{
        filter(letter){
            this.$emit('filter' , letter )
        }
    }
}
</script>

<style scoped>
    .alpha-list{
        list-style: none;
    }
    .alpha-list li{
        display: inline-block;
        padding: 0;
        width: 22px;
        height: 22px;
        line-height: 22px;
        border-radius: 22px;
        text-align: center;
        font-size: 13px;
        margin: 0 1px;
        box-sizing: border-box;
        cursor: pointer;
    }
    .alpha-list li.active , .alpha-list li:hover{
        background-color:#051E34;
        color:#fff;
    }
   

</style>