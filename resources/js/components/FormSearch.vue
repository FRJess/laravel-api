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
    <nav class="navbar navbar-expand">
        <div class="col-4 me-2">
            <input v-model.trim="tosearch" @keyup.enter="getApi" class="form-control" type="search" placeholder="Search for a project" aria-label="Search">
        </div>
        <div class="col-auto">
            <button @click="getApi" class="btn btn-outline-light">Search</button>
        </div>
    </nav>
</template>


<style lang="scss" scoped>
@use '../../scss/appVue.scss';

</style>
