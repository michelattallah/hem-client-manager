<template>
    <div class="client-container" :class="{'active' : details}">
        <v-list-item  flat>
            <v-list-item-avatar>
              <v-img :src="client.logo"></v-img>
            </v-list-item-avatar>
           
            <v-list-item-content>
              <v-list-item-title>
                  <a href="#">{{client.name}}</a>
              </v-list-item-title>
              <v-list-item-subtitle color="grey" v-html="client.description"></v-list-item-subtitle>
            </v-list-item-content>
            <v-list-item-icon>
                <v-btn icon color="grey" @click="showDetails">
                    <v-icon>mdi-chevron-down </v-icon>
                </v-btn>
            </v-list-item-icon>

        </v-list-item>
        <div v-show="details">
            <v-divider></v-divider>
            <div class="pa-5">
                <ClientSummary :client="client" :show="details" />
            </div>
        </div>
    </div>
</template>

<script>
import ClientSummary from '@/components/clients/ClientSummary'
export default {
  props: ['client'],
    data() {
        return {
          details:false
        }
    },
    methods: {
        showDetails(){
            this.details = !this.details;
        }
    },
    components:{
        ClientSummary
    }
}
</script>