<script>
export default {
    name: 'Home',
}

</script>

<template>
    <div class="jt-container">
        <div class="container p-5">
            <h1 class="mb-4">Welcome on my portfolio</h1>
            <p>
                My name is Jessica and I am a web developer based in Rome, Italy. My journey in this world has started on 2022 and I have now skills in HTML, CSS, PHP and JavaScript.
            </p>
            <p>I am taking baby steps but I am always happy to learn new things.
            </p>
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
