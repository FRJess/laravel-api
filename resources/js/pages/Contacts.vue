<script>
import ContactForm from '../components/ContactForm.vue';
export default {
    name: 'Contacts',
    components: {
        ContactForm
    }
}

</script>

<template>
    <div class="jt-container">
        <div class="container p-5">
            <h1 class="mb-4">Contact me</h1>
            <ContactForm/>
        </div>
    </div>

</template>

<style lang="scss" scoped>
@use '../../scss/appVue.scss';

.jt-container{
    background-color: #0B192F;
    color: white;
    width: 100%;
    height: 100vh;
    .container{
        margin: 0;
        padding: 0
    }
}

</style>

