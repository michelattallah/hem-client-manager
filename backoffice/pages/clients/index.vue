<template>
  <v-layout
    justify-center
    align-center
    row
    wrap
  >
    <PageTitle :title="title" />

    <v-flex xs12 lg12 pt-5>
      
      <LettersFilter @filter="filterClients" :selected="filter.letter"  />

    </v-flex>

    <v-layout row wrap v-if="clients.length && !loading">
        <v-flex lg4 md4 sm12 xs12 class="my-4" v-for="client in clients" :key="client.id">
            <Client :client="client" />
        </v-flex>

    </v-layout>

    <Loader v-if="loading" />

     <v-layout v-if="!clients.length && !loading">
          <v-flex xs10 offset-xs1  class="my-4"> 
              <Empty />
          </v-flex>
      </v-layout>
      <Pagination v-if="pagination" :length="pagination.last_page" :meta="pagination" @paginate="paginate"/>
     
  </v-layout>
</template>

<script>
import PageTitle from '@/components/core/PageTitle'
import LettersFilter from '@/components/core/LettersFilter'
import Loader from '@/components/core/Loader'
import Pagination from '@/components/core/Pagination';
import Empty from '@/components/core/Empty';

import Client from '@/components/clients/Client'
import {mapActions,MapGetters,MapMutations, mapGetters} from 'vuex'


export default {
  inject: ['theme'],
  data: () => ({
    title: 'Clients',
    filter: {
      limit : 10,
      page:1,
      letter: ''
    },
  }),
  head () {
    return {
      title: 'HEM :: ' + this.title,
      meta: [
        { hid: 'description', name: 'description', content: 'HEM-Dashboard' }
      ]
    }
  },
  computed:{
    ...mapGetters({
        clients: 'clients/clients',
        links: 'clients/links',
        pagination: 'clients/pagination',
        loading: 'clients/loading'
    }),
  },
  mounted(){
    this.loadClients(this.filter)
  },
  components: {
    PageTitle,
    LettersFilter,
    Client,
    Loader,
    Pagination,
    Empty
  },
  methods:{
    ...mapActions({
        loadClients: 'clients/loadClients'
    }),
    filterClients(letter){
      if(this.filter.letter == letter){
        this.filter.letter = null
      }else{
        this.filter.letter = letter
      }
      this.loadClients(this.filter)
    },
    paginate(page){
      this.filter.page = page
      this.loadClients(this.filter)
    }
  }
 
}
</script>
