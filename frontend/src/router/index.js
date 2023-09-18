import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/HomeView.vue';
import NotFoundView from '@/views/NotFoundView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/estimations',
    name: 'estimations',
    component: () => import('@/views/EstimateListView.vue')
  },
  {
    path: '/estimation/:id',
    name: 'estimation',
    component: () => import('@/views/EstimateView.vue')
  },
  {
    path: '/:match(.*)',
    name: 'notfound',
    component: NotFoundView
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router;
