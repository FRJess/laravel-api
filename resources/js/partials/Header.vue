<script>
import FormSearch from '../components/FormSearch.vue';

export default {
    name: 'Header',
    components: {
        FormSearch
    }
}

</script>

<template>
    <div class="header">
        <nav class="navbar navbar-expand text-center navbar-dark bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav mb-2 ms-4">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'home'}">home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'projects'}">projects</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'about'}">about</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <router-link class="nav-link" :to="{ name: 'contacts'}">Contact us</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<style lang="scss" scoped>
@use '../../scss/appVue.scss';

nav{
    ul{
        li{
            a{
                text-transform: uppercase;
            }
        }
    }
}
</style>
