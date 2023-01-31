<script>

import axios from 'axios';

export default {
    name: 'ProjectDetails',
    data(){
        return{
            baseUrl: 'http://127.0.0.1:8000/api/',
            project: {}
        }
    },
    methods: {
        getApi(){
            axios.get(this.baseUrl + 'projects/' + this.$route.params.slug)
                .then(res => {
                    this.project = res.data;
                    // console.log(res.data);
                })
        }
    },
    mounted(){
        // console.log(this.$route.params.slug);
        this.getApi();
    }
}
</script>

<template>
        <div class="jt-container">
        <div class="container p-5">
            <h1 class="my-4">{{project.name}}</h1>
            <div>Client: <strong>{{ project.client_name }}</strong></div>
            <div v-if="project.type" class="">Type: <strong>{{ project.type.name }}</strong></div>
            <div> Technologies:
                <span v-for="technology in project.technologies" :key="technology.id" class="badge text-bg-secondary me-2">{{ technology.name }}</span>
            </div>

             <div class="text-center my-4">
                <img :src="project.image" :alt="project.name">
             </div>

             <div v-html="project.summary"></div>
        </div>
    </div>

</template>



<style lang="scss" scoped>
@use '../../scss/appVue.scss';
img{
    max-width: 50%;
}
.jt-container{
    background-color: #0B192F;
    color: white;
    width: 100%;
    .container{
        margin: 0;
        padding: 0
    }
}
</style>
