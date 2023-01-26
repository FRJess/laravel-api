<script>
import axios from 'axios';

export default {
    name: 'App',
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
        getApi(){
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
        },
        truncateText(summary){
            if(summary.length > this.contentMaxLenght){
                return summary.substr(0, this.contentMaxLenght) + '...';
            }
            return summary;
        }
    },
    mounted(){
        this.getApi(1);
    }
}

</script>

<template>
    <div class="container">
        <h1>Projects list</h1>

        <div>
            <div v-for="project in projects" :key="project.name" class="project-box">
                <h3>{{project.name}}</h3>
                <h4 class="badge text-bg-info">{{ project.type.name }}</h4>
                <div class="technologies" v-if="project.technologies.length">
                    <span class="badge text-bg-secondary" v-for="technology in project.technologies" :key="technology.id">{{ technology.name }}</span>
                 </div>
                <p v-html="truncateText(project.summary)"></p>
            </div>
        </div>

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
            @onclick="getApi(i)"
            >{{ i }}
            </button>

            <button class="btn btn-primary"
            :disabled="pagination.current === pagination.last"
            @click="getApi(pagination.current + 1)"
            >&rarr;</button>

            <button class="btn btn-primary"
            :disabled="pagination.current === pagination.last"
            @click="getApi(1)"
            >|></button>
        </div>

    </div>

</template>

<style lang="scss">
@use '../scss/appVue.scss';
</style>
