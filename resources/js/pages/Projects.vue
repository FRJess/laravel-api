<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
import { store } from '../data/store';

import ProjectItem from '../components/ProjectItem.vue';
import FormSearch from '../components/FormSearch.vue';

export default {
    name: 'App',
    components: {
        ProjectItem,
        FormSearch,
    },
    data(){
        return {
            BASE_URL,
            store,
            contentMaxLenght: 150,
            active_base_url: BASE_URL + 'projects'
        }
    },

    methods:{
        getApi(url){
            axios.get(url)
                .then(result => {
                    store.projects = result.data.projects.data;
                    store.links = result.data.projects.links;
                    store.show_paginate = true;
                    console.log(result.data.projects.data)
                })
        }
    },
    mounted(){
        this.getApi(this.active_base_url);
    }
}

</script>

<template>
        <div class="jt-container">
        <div class="container p-5">

            <h1>My projects</h1>
            <FormSearch/>


            <ProjectItem  v-for="project in store.projects" :key="project.id" :project="project"/>

            <div v-if="store.show_paginate" class="paginator d-flex justify-content-center">
                <button class="btn btn-outline-light"
                v-for="link in store.links" :key="link.label"
                :disabled="link.active || !link.url"
                @click="getApi(link.url)"
                v-html="link.label"
                ></button>
            </div>
        </div>

    </div>



</template>

<style lang="scss">
@use '../../scss/appVue.scss';

.jt-container{
    background-color: #0B192F;
    color: white;
    width: 100%;
    // height: 100vh;
    .container{
        margin: 0;
        padding: 0
    }
}



</style>
