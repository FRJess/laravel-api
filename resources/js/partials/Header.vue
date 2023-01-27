<script>
export default {
    name: 'Header',
}

</script>

<template>
    <div class="header">
        <nav class="navbar navbar-expand text-center navbar-dark bg-dark">
            <ul class="navbar-nav mb-2 ms-4">
                <li class="nav-item">
                    <router-link class="nav-link active" :to="{ name: 'home'}">home</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'about'}">about</router-link>
                </li>
                <li class="nav-item dropdown">
                    <router-link class="nav-link" :to="{ name: 'contacts'}">contacts</router-link>
                </li>
            </ul>
        </nav>

    </div>
</template>

<style lang="scss" scoped>
@use '../../scss/appVue.scss';

nav{
    // padding: 30px 0;
    ul{
        // list-style: none;
        li{
            // display: inline-block;
            // padding: 10px 20px;
            a{
                color: black;
                text-decoration: none;
                text-transform: uppercase;
            }
        }
    }
}
</style>
