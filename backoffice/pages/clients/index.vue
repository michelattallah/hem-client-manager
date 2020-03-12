<template>
  <div>
  <v-layout justify-center align-center row wrap>
    <PageTitle :title="title" />
 </v-layout>

    <v-layout>
      <v-flex lg7 md7 sm12 xs12 class="border-right-gery" align-stretch style="min-height:78vh">

          <v-layout>
            <v-flex xs12 py-5 class="border-bottom-gery">
              <LettersFilter @filter="filterClients" :selected="filter.letter"  />
            </v-flex>
          </v-layout>

          <v-layout row v-if="clients.length && !loading" pa-5>
              <v-flex xs12 >
                  <v-list dense pa-5>
                    <Client v-for="client in clients" :key="client.id" :client="client" />
                  </v-list>
              </v-flex>
          </v-layout>
          
          <Loader v-if="loading" />
          
          <v-layout v-if="!clients.length && !loading" pa-5>
            <v-flex xs12  class="my-4"> 
                <Empty />
            </v-flex>
          </v-layout>
          
          <Pagination v-if="pagination" :length="pagination.last_page" :meta="pagination" @paginate="paginate"/>

      </v-flex>

      <v-flex lg5 md5 sm12 xs12>
          <v-layout>
            <v-flex xs12 py-3 class="border-bottom-gery" align="justify-end">
              <div style="margin:2px 0" class="justify-end pr-3">
                <v-btn depressed meduim color="primary" class="pull-right">+ Add New</v-btn>
              </div>
            </v-flex>
          </v-layout>

          <v-layout>
            <v-flex xs12 pa-2>
              <AddClient />
            </v-flex>
          </v-layout>

      </v-flex>

    </v-layout>
     
  </div>
</template>

<script>
import PageTitle from '@/components/core/PageTitle'
import LettersFilter from '@/components/core/LettersFilter'
import Loader from '@/components/core/Loader'
import Pagination from '@/components/core/Pagination';
import Empty from '@/components/core/Empty';

import Client from '@/components/clients/Client'
import AddClient from '@/components/clients/AddClient'

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
    Empty,
    AddClient
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
