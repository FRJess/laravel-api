<script>
import axios from 'axios';

export default {
    name: 'Pagination',

    data(){
        return {
            baseUrl: 'http://127.0.0.1:8000/api/',
            projects : [],
            pagination:{
                current: 1,
                last: null
            }
        }
    },

}
</script>

<template>

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

<style>

</style>
