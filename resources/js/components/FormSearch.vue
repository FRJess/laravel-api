<script>
export default {
    name:'FormSearch'

}
</script>

<template>
    <nav class="navbar">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
    </nav>
</template>


<style lang="scss" scoped>
@use '../../scss/appVue.scss';

</style>
