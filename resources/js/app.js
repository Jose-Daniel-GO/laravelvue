import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

const app = createApp({});

import NavComponent from './components/NavComponent.vue';
import Auth from './views/AuthView.vue';
import ListTaskView from './views/Tasks/Lists.vue';
import FormTaskView from './views/Tasks/Form.vue';
import EditTaskView from './views/Tasks/Edit.vue';
import FooterComponent from './components/FooterComponent.vue';

app.component('nav-component', NavComponent);
app.component('auth-component', Auth);


app.component('List', ListTaskView);
app.component('Form', FormTaskView);
app.component('Edit', EditTaskView);

app.component('footer-component', FooterComponent);
// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('app-component', App);
// app.component('example-component', ExampleComponent);

const routes = [
  { path: '/form', component: FormTaskView },
  { path: '/edit/:id', component: EditTaskView },
  { path: '/', component: ListTaskView },
];

const router = createRouter({ history: createWebHistory(), routes });
app.use(router);

app.mount('#app');
