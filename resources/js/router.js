import {createRouter, createWebHistory} from "vue-router";

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Contacts from './pages/Contacts.vue';
import Error404 from './pages/Error404.vue';
import Projects from './pages/Projects.vue';
import ProjectDetails from './pages/ProjectDetails.vue';

const router = createRouter({
    history: createWebHistory(),
    routes:[
        {
            path: '/',
            name:'home',
            component: Home
        },
        {
            path: '/about',
            name:'about',
            component: About
        },
        {
            path: '/contacts',
            name:'contacts',
            component: Contacts
        },
        {
            path: '/projects',
            name:'projects',
            component: Projects
        },
        {
            path: '/project/project-details/:slug',
            name: 'details',
            component: ProjectDetails
        },
        {
            path: '/:pathMatch(.*)*',
            component: Error404
        },
    ]
});

export {router};
