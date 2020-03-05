<template>
    <div>
        <v-col cols="12">
          <h3>Add New Client</h3>
        </v-col>
        <v-form
          ref="form"
          v-model="valid"
          lazy-validation
        >
          <v-col cols="12">
            <v-text-field 
                label="Name*" 
                v-model="form.name" 
                outlined 
                dense 
                hide-details
                :rules="[rules.required]"
            >
            </v-text-field>
          </v-col>
          
          <v-col cols="12">
            <v-text-field 
                label="Description*"
                v-model="form.description"
                outlined
                dense
                hide-details
                :rules="[rules.required]"
            >
            </v-text-field>
          </v-col>
          
          <v-col cols="12">
            <Uploader 
              :options="{
                  label: 'Client\'s Logo',
                  helper: 'Allowed file types (jpg, jpeg, png)',
                  required: true,
                  endPoint: 'upload'
              }"
              @uploaded="logoUploaded"
              @deleted="logoDeleted"
              ref="uploader"
            />
          </v-col>

          <v-col cols="12">
            <v-btn 
                depressed 
                meduim 
                color="success" 
                class="pull-right"
                @click="addClient"
            >
              Add
            </v-btn>
          </v-col>

        </v-form>
    </div>
</template>
<script>
import Uploader from '@/components/core/Uploader';
import {mapActions,MapGetters,MapMutations, mapGetters} from 'vuex'

export default {
  components:{
    Uploader
  },
  data() {
    return {
      valid: true,
      form: {
        name: '',
        description:'',
        logo:{}
      },
      rules: {
        required: value => !!value || 'This field is required.',
        counter: value => value.length <= 20 || 'Max 20 characters'
      }  
    }
  },
  methods:{
    ...mapActions({
        loadClients: 'clients/loadClients'
    }),

    async addClient(){
      if(!this.$refs.form.validate()) {
          return false;
      }
      const response = await this.$axios.post('/clients', this.form)
      if(response.data.data.id){
        this.loadClients({})
        this.form.name= ' '
        this.form.description =' '
        this.form.logo={}
        // Reset the Uploader
        this.$refs.uploader.reset();
      }
    },
    logoUploaded(logo){
        this.form.logo = logo
    },
    logoDeleted(){
        this.form.logo = {}
    },
  }
    
}
</script>