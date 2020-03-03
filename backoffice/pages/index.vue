<template>
  <v-layout
    justify-center
    align-center
  >
    <PageTitle :title="title" />
  </v-layout>
</template>

<script>
import PageTitle from '@/components/core/PageTitle'
export default {
  inject: ['theme'],
  data: () => ({
    title: 'Dashboard'    
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
