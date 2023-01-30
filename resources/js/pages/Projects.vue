<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
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
            projects : [],
            contentMaxLenght: 150,
            // active_base_url: BASE_URL + 'projects',
            pagination:{
                current: 1,
                last: null
            }
        }
    },

    methods:{
        getApi(page){
            this.pagination.current = page;
            axios.get(this.BASE_URL + 'projects', {
                params:{
                    page: this.pagination.current
                }
            })
                .then(result => {
                    this.projects = result.data.projects.data;
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


    <ProjectItem v-for="project in projects" :key="project.id" :project="project"/>

    <div class="paginator d-flex justify-content-center">
        <button class="btn btn-primary"
        :disabled="pagination.current === 1"
        @click="getApi(1)"
        >|&lt; </button>

        <button class="btn btn-primary"
        :disabled="pagination.current === 1"
        @click="getApi(pagination.current -1)"
        >&larr;</button>

        <button class="btn btn-primary"
        v-for="i in pagination.last" :key="i"
        :disabled="pagination.current === i"
        @click="getApi(i)"
        >{{ i }}
        </button>

        <button class="btn btn-primary"
        :disabled="pagination.current === pagination.last"
        @click="getApi(pagination.current + 1)"
        >&rarr;</button>

        <button class="btn btn-primary"
        :disabled="pagination.current === pagination.last"
        @click="getApi(pagination.last)"
        >|></button>
    </div>

</template>

<style lang="scss">
@use '../../scss/appVue.scss';


</style>
