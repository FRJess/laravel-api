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
            active_base_url: BASE_URL + 'projects',
            pagination:{
                current: 1,
                last: null
            }
        }
    },

    methods:{
        // getPage(url){
        //     this.active_base_url = url;
        //     this.getApi()
        // },
        getApi(url){
            axios.get(url)
                .then(result => {
                    store.projects = result.data.projects.data;
                    store.links = result.data.projects.links;
                    console.log(store.projects)
                    this.pagination.current = result.data.projects.current_page;
                    this.pagination.last = result.data.projects.last_page;

                })
        }
    },
    mounted(){
        this.getApi(this.active_base_url);
    }
}

</script>

<template>

    <h1>Projects list</h1>
    <FormSearch/>


    <ProjectItem v-for="project in store.projects" :key="project.id" :project="project"/>

    <div class="paginator d-flex justify-content-center">
        <button class="btn btn-primary"
        v-for="link in store.links" :key="link.label"
        :disabled="link.active || !link.url"
        @click="getApi(link.url)"
        v-html="link.label"
        ></button>
    </div>

</template>

<style lang="scss">
@use '../../scss/appVue.scss';


</style>
