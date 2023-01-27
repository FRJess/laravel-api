<script>

import axios from 'axios';

export default {
    name: 'About',
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
                    this.post = res.data;
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
      <h1>{{project.name}}</h1>
      <div v-if="project.type" class="badge text-bg-info">{{ project.type.name }}</div>
    <span class="badge text-bg-secondary" v-for="technology in project.technologies" :key="technology.id">{{ technology.name }}</span>


     <!-- <div>
        <img :src="project.image" :alt="project.name">
     </div> -->

     <div v-html="project.summary"></div>

</template>



<style lang="scss" scoped>
@use '../../scss/appVue.scss';
img{
    max-width: 100%;
}
</style>
