<template>
    <div >
        <h4 class="pa-4">{{title}}</h4>
    <v-navigation-drawer
      v-model="drawer"
      :mini-variant="miniVariant"
      :clipped="clipped"
      fixed
      app
      flat
      color="accent"
      dark
    >
      <v-list class="pt-5">
        <v-list-item
          v-for="(item, i) in Menu"
          :key="i"
          :to="item.to"
          router
          exact
          dense
        >
          <v-list-item-action>
            <v-icon color="grey lighten-1">{{ item.icon }}</v-icon>
          </v-list-item-action>
          
          <v-list-item-content>
            <v-list-item-title v-text="item.title" color="grey lighten-1" />
          </v-list-item-content>

        </v-list-item>

      </v-list>
    </v-navigation-drawer>
    </div>
</template>


<script>
import {Menu} from '@/data/menu'
export default {
  data () {
    return {
      clipped: true,
      drawer: true,
      fixed: true,
      miniVariant: false,
      right: true,
      rightDrawer: false,
      title: 'Higher Education Marketing',
      Menu
    }
  }
}
</script>