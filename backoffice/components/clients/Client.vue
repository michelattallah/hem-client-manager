<template>
    <div class="advisor-container" >

        <v-list-item  @click="" flat>
            <v-list-item-avatar>
              <v-img :src="client.logo"></v-img>
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title v-html="client.name"></v-list-item-title>
              <v-list-item-subtitle v-html="client.description"></v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

        <v-divider class="mt-3"></v-divider>

        <div class="advisor-control pa-3">
            <v-layout>
                <v-flex md8 xs12>
                </v-flex>
                <v-flex md4  xs12>
                    <div class="d-flex justify-center align-center">
                      
                        <v-tooltip top>
                            <template v-slot:activator="{ on }">
                            <a class="icon-btn  grey--text lighten-3" href="javascript:void(0)" v-on="on"><i class="fas fa-user-edit"></i></a>
                            </template>
                            <span>Edit</span>
                        </v-tooltip>
                    </div>
                </v-flex>
            </v-layout>
        </div>
    </div>
</template>

<script>
export default {
  props: ['client']
}
</script>