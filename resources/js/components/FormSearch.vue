<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
import { store } from '../data/store';


export default {
    name:'FormSearch',
    data(){
        return{
            tosearch: '',
            store
        }
    },
    methods:{
        getApi(){
            axios.get(BASE_URL + 'projects/search', {
                params:{
                    tosearch: this.tosearch
                }
            })
                .then(result => {
                    this.tosearch = '';
                    store.projects = result.data;
                    store.show_paginate = false;
                    console.log(result.data)
                })
        }
    }

}
</script>

<template>
    <nav class="navbar">
        <div class="container-fluid">
            <input v-model.trim="tosearch" @keyup.enter="getApi" class="form-control me-2" type="search" placeholder="Search for a project" aria-label="Search">
            <button @click="getApi" class="btn btn-outline-dark">Search</button>
        </div>
    </nav>
</template>


<style lang="scss" scoped>
@use '../../scss/appVue.scss';

</style>
