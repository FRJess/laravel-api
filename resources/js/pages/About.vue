<script>
export default {
    name: 'About',
}

</script>

<template>
    <div class="jt-container">
        <div class="container p-5">
            <h1 class="mb-4">About me</h1>
            <div>
                Languages:
                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JavaScript</li>
                    <li>PHP</li>
                </ul>
            </div>
            <div>
                Frameworks:
                <ul>
                    <li>VueJS</li>
                    <li>Laravel</li>
                </ul>
            </div>
            <div>
                Libraries:
                <ul>
                    <li>Bootstrap</li>
                </ul>
            </div>
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
ul{
    list-style: none;
}

</style>
