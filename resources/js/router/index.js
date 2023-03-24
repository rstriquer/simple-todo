import { createRouter, createWebHistory } from 'vue-router';

import index from '../components/index.vue';
import edit from '../components/edit.vue';
import notFound from '../components/notFound.vue';

const routes = [
  {
    path: '/',
    component: index,
  },
  {
    path: '/edit',
    component: edit,
  },
  {
    path: '/:pathMath(.*)*',
    component: notFound,
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;