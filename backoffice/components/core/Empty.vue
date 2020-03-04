<template>
    <div class="mt-5">
        <v-alert
      text
      color="info"
      border="top"
    >
      <h3 class="headline">No Results Found</h3>
      <div>Seems there are none! Try changing a filter (if applicable)</div>

      <v-divider
        class="my-4 info"
        style="opacity: 0.22"
      ></v-divider>

      <v-row
        align="center"
        no-gutters
      >
        <v-col class="grow">How about creating a new one?</v-col>
        <v-spacer></v-spacer>
        <v-col class="shrink">
          <v-btn
            color="info"
            outlined
          >
            Okay
          </v-btn>
        </v-col>
      </v-row>
    </v-alert>

       
    </div>
</template>