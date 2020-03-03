<template>
  <v-layout
    justify-center
    align-center
    row
  >
    <PageTitle :title="title" />

    <v-flex xs12 lg12>
      
    </v-flex>
    
  </v-layout>
</template>

<script>
import PageTitle from '@/components/core/PageTitle'
export default {
  inject: ['theme'],
  data: () => ({
    title: 'Clients'    
  }),
  head () {
    return {
      title: 'HEM :: ' + this.title,
      meta: [
        { hid: 'description', name: 'description', content: 'HEM-Dashboard' }
      ]
    }
  },
  components: {
    PageTitle
  },
 
}
</script>
