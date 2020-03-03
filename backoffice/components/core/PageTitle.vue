<template>
    <v-flex xs12 lg12 class="page-banner">
      <div>
        <h1 class="display-2">{{title}}</h1>
      </div>
    </v-flex>
</template>

<script>
export default {
    props:['title']
}
</script>