<script>
import { truncateText } from '../data/functions';

export default {
    name: 'ProjectItem',
    data(){
        return{
            truncateText,
            contentMaxLength: 100
        }
    },
    props:{
        project: Object

    }

}
</script>

<template>
    <div class="top">
        <h5>
            <router-link class="link-secondary jt-link" :to="{name: 'details', params:{slug: project.slug} }">{{project.name}}</router-link>
        </h5>
    </div>

        <div class="badge text-bg-info">{{ project.type.name }}</div>
        <div class="technologies" v-if="project.technologies.length">
            <span class="badge text-bg-secondary" v-for="technology in project.technologies" :key="technology.id">{{ technology.name }}</span>
        </div>
        <p v-html="truncateText(project.summary)"></p>

</template>

<style lang="scss">
@use '../../scss/appVue.scss';

.top{
        display: flex;
        justify-content: space-between;
    }

.jt-link{
    text-decoration: none;
}

</style>
