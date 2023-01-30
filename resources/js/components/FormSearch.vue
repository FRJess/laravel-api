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

            const data = new FormData();
            data.append('tosearch', this.tosearch);

            axios.post(BASE_URL + 'projects/search', data)
                .then(result => {
                    this.tosearch = '';
                    store.projects = result.data;
                    console.log(store.projects)

                })

        }
    }

}
</script>

<template>
    <nav class="navbar">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input v-model.trim="tosearch" @keyup.enter="getApi" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button @click="getApi" class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
    </nav>
</template>


<style lang="scss" scoped>
@use '../../scss/appVue.scss';

</style>
