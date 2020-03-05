<template>
    <div>
        <template v-if="!file.name">
            <div 
            class="uploader-container"
            :class="{
                'dragOver' : dragged,
                'has-error'    : error.show
                }"
            @dragover.prevent="dragOver"
            @dragleave.prevent="dragLeave"
            >
            <input type="file" @change="onFilePicked()">
                <div class="d-block uploader-text">
                    <h4 class="accent--text">{{options.label}}</h4>
                    <span>Drag file here to upload or click to <span class="secondary--text">choose file</span></span>
                </div>
            </div>
        </template>
        
        <div class="file-wrapper" v-else transition="slide-x-transition" >
            <v-layout row wrap justify-start align-center>
                    <div transition="slide-x-transition" class="px-3">
                        <v-progress-circular
                            :rotate="360"
                            :size="80"
                            :width="7"
                            :value="progress"
                            color="success"
                            >
                            {{ progress }}%

                        </v-progress-circular>
                    </div>
                    <div class="mb-2">
                        <h4>{{options.label}}</h4>
                        <span class="d-block">{{file.name}}</span>
                        <span>Size: {{fileSize}} MB</span>
                    </div>    
                    <v-spacer></v-spacer>
                    <div v-if="state === states.COMPELET">
                        <v-btn icon small dark depressed color="red" @click.prevent="deleteFile"
                        :loading="loading"
                        >
                            <VIcon>mdi-delete-empty-outline </VIcon>
                        </v-btn>
                        <div class="clear clearfix"></div>
                    </div>
            </v-layout>
        </div>
        
        <small class="secondary--text" v-if="options.helper">{{options.helper}}</small>

    </div>

</template>
<script>
import states from '@/uploader/states'

export default {
    props:{
        options: {
            required: true,
            type: Object,
            default: 
                {
                    label: 'File To Upload',
                    helper: 'Allowed file types (jpg, jpeg, png, pdf)',
                    required: true,
                    endPoint: 'upload',
                }
        },
        error: {
            required:false,
            type: Object,
            default:{
                show: false,
                message:'This file is required'
            }
        }                    

    },

    data(){
        return{
            loading: false,
            dragged: false,
            progress:0,
            state:null,
            states:{},
            loading:false,
            file:{
                name:'',
                url: '',
                size:'',
                uploded_file_name:'',
                path:''
            }
        }
    },
    mounted(){
        this.states = states
        this.state = this.states.WAITING;
    },
    computed:{
        fileSize(){
            return (this.file.size / 1000000).toFixed(2)
        }
    },
    methods: {
        dragOver(){
            this.dragged = true
        },
        dragLeave(){
            this.dragged = false
        },
        makeFormData(file){
            const form = new FormData()
            form.append('file' , file , file.name)
            return form
        },
        handleUploadProgress(e){
            
            this.progress = Math.round( (e.loaded * 100) / e.total ) 
        },
        onFilePicked (){
            const files = event.target.files
            
            this.state=states.UPLOADING
            
            if(files[0] !== undefined) {

                this.file.name = files[0].name
                this.file.size = files[0].size
                
                if(this.file.name.lastIndexOf('.') <= 0) {
					return
                }
                
                this.$axios.post(this.options.endPoint , this.makeFormData(files[0]) , {
                    
                    onUploadProgress: this.handleUploadProgress

                }).then((response)=> {
                    
                    this.state = states.COMPELET
                    this.file.path = response.data.path
                    this.file.uploded_file_name = response.data.fileName
                    this.$emit('uploaded' , this.file )
                    
                }).catch((e)=>{

                    console.log(e)
                })
                    
                
			} else {
                this.file.name = ''
                this.file.url = ''
            }
        },
        deleteFile(){
            this.loading = true;
            this.$axios.post( 'destroy' , this.file)
            .then((response)=> {
                this.loading = false;
                this.file.name = ''
                this.file.url = ''
                this.state = states.WAITING
                this.$emit('deleted')
            })
            .catch((e)=>{
                console.log(e)
            })
        },
        reset(){
            this.loading = false;
            this.file.name = ''
            this.file.url = ''
            this.state = states.WAITING
        }
    }
}
</script>
<style lang="css">
.file-wrapper{
    padding:15px;
    border: 1px solid rgb(158,158,158);
    border-radius: 5px;
    background-color:#fff;
    box-sizing: border-box;
}
.uploader-container:hover{
    border: 1px dashed #000;
}
.uploader-container{
    display: block;
    border: 1px solid rgb(158,158,158);
    border-radius: 5px;
    background-color:#fff;
    margin-bottom: 3px;
    position: relative;
    padding: 30px;
    box-sizing: border-box;
    text-align: center;
}
.uploader-container.dragOver{
    border:1px dashed gray;
}
.uploader-container.has-error{
    border:1px dashed red;
}
.uploader-container input{
    cursor: pointer;
    position: absolute;
    width: 100%;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    opacity: 0;
}
.uploader-text{
text-align: center;
}
</style>