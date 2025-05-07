import TokenService from '../services/local/token-service';
import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    component: () => import('../layouts/AppMain.vue'),
    children: [
        {
            path: 'auth',
            component: () => import('../layouts/AppAuth.vue'),
            children: [
                {
                    path: 'login',
                    name: 'login',
                    component: () => import('../views/auth/AppLogin.vue')
                },
                {
                    path: 'register',
                    name: 'register',
                    component: () => import('../views/auth/AppRegister.vue')
                }
            ]
        },
        {
            path: '',
            component: () => import('../layouts/AppDashboard.vue'),
            children: [
                {
                    path: '',
                    name: 'dashboard',
                    component: () => import('../views/dashboard/index.vue')
                },
                {
                    path: 'users',
                    component: () => import('../views/users/index.vue'),
                    children: [
                        {
                            path: '',
                            name: 'users',
                            component: () => import('../views/users/list.vue')
                        },
                        {
                            path: 'add',
                            name: 'users-add',
                            component: () => import('../views/users/create.vue')
                        }
                    ]
                }
            ]
        },
    ]
  },
  {
    path: "/:pathMatch(.*)*",
    name: "NotFound",
    component: () => import('../components/pages/common/NotFoundPage.vue'),
    meta: {
      requiresAuth: false
    }
  }
]

const router = createRouter({
  history: createWebHistory(''),
  routes
});

router.beforeEach((to, from, next) => {
  const token: string|null = TokenService.getToken();
  if (token) {
    if (to.path === '/auth/login' || to.path === '/auth/register') {
      next('');
    } else {
      next();
    }
  } else {
    if (to.path === '' || to.path === '/') {
      next('/auth/login');
    } else {
      next();
    }
  }
})

export default router
