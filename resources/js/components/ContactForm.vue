<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
export default {
    name: 'ContactForm',
    data(){
        return{
            name: '',
            email: '',
            message: '',
            errors: {},

        }
    },
    methods:{
        sendForm(){
            this.loading = true;
            const data = {
                name: this.name,
                email: this.email,
                message: this.message
            }

            axios.post(`${BASE_URL}contacts`, data)
            .then(result => {
                if(!result.data.success){
                    this.errors = result.data.errors;
                }else{
                    this.name = '';
                    this.email = '';
                    this.message = '';
                    this.errors = {};
                }
            })

        }
    }

}
</script>

<template>
    <form @submit.prevent="sendForm()" action="">
        <div class="mb-3">
            <input :class="{'is-invalid': errors.name}" v-model.trim="name" type="text" class="form-control"  placeholder="Name">
            <p v-for="(error, index) in errors.name" :key="'name'+index" class="error">{{ error }}</p>
        </div>
        <div class="mb-3">
            <input :class="{'is-invalid': errors.email}" v-model.trim="email" type="text" class="form-control" placeholder="name@example.com">
            <p v-for="(error, index) in errors.email" :key="'Mail'+index" class="error">{{ error }}</p>
        </div>
        <div class="mb-3">
            <textarea :class="{'is-invalid': errors.message}" class="form-control" rows="3"></textarea>
            <p v-for="(error, index) in errors.message" :key="'message'+index" class="error">{{ error }}</p>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>

    </form>

</template>

<style lang="scss" scoped>
@use '../../scss/appVue.scss';

</style>
