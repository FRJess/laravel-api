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
    <h1 class="my-4">{{project.name}}</h1>
    <div>Client: <strong>{{ project.client_name }}</strong></div>
    <div v-if="project.type" class="">Type: <strong>{{ project.type.name }}</strong></div>
    <div v-for="technology in project.technologies" :key="technology.id"> Technologies:
        <span class="badge text-bg-secondary me-2">{{ technology.name }}</span>
    </div>

     <div class="text-center my-4">
        <img :src="project.image" :alt="project.name">
     </div>

     <div v-html="project.summary"></div>

</template>



<style lang="scss" scoped>
@use '../../scss/appVue.scss';
img{
    max-width: 50%;
}
</style>
