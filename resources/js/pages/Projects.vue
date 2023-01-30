<script>
import axios from 'axios';
import ProjectItem from '../components/ProjectItem.vue';
import Pagination from '../components/Pagination.vue';

export default {
    name: 'App',
    components: {
        ProjectItem,
        Pagination
    },
    data(){
        return {
            baseUrl: 'http://127.0.0.1:8000/api/',
            projects : [],
            contentMaxLenght: 150,
            pagination:{
                current: 1,
                last: null
            }
        }
    },

    methods:{
        getApi(page){
            this.pagination.current = page;
            axios.get(this.baseUrl + 'projects', {
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
        this.getApi(1);
    }
}

</script>

<template>

    <h1>Projects list</h1>


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
