import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
// Assuming correct import syntax for VuePagination
// import { VuePagination } from 'laravel-vue-pagination';

const app = createApp({});

import Tasks from './components/Tasks/Lists.vue';
import Form from './components/Tasks/Form.vue';
import Edit from './components/Tasks/Edit.vue';

app.component('Tasks', Tasks);
app.component('Form', Form);
app.component('Edit', Edit);

const routes = [
  { path: '/form', component: Form },
  { path: '/edit/:id', component: Edit },
  { path: '/', component: Tasks },
];

const router = createRouter({ history: createWebHistory(), routes });
app.use(router);

app.mount('#app');
