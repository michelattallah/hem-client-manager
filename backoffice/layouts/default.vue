<template>
  <v-app>
    <SideBar/>
    <v-app-bar
      :clipped-left="clipped"
      fixed
      app
      color="white"
      elevation="1"
      elevate-on-scroll
      dense
    >
      <v-spacer />
      <v-btn
        icon
        @click.stop="rightDrawer = !rightDrawer"
      >
      <v-icon>mdi-bell-ring</v-icon>
      </v-btn>
    </v-app-bar>
    
    <v-content>
      <v-container>
        <nuxt />
      </v-container>
    </v-content>
    
     <RightDrawer v-if="rightDrawer" />
     
    <v-footer
      :fixed="fixed"
      app
    >
      <span>&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
import SideBar from '@/components/core/SideBar'
import RightDrawer from '@/components/core/RightDrawer'
export default {
  components:{
    SideBar,
    RightDrawer
  },
  data () {
    return {
      clipped: false,
      drawer: true,
      fixed: true,
      miniVariant: false,
      rightDrawer: false,
      title: 'Higher Education Marketing',
    }
  }
}
</script>
