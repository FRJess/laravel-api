<script>
export default {
    name: 'Header',
}

</script>

<template>
    <div class="header text-center">
        <nav class="navbar navbar-expand text-center navbar-dark bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav mb-2">
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
            </div>
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
