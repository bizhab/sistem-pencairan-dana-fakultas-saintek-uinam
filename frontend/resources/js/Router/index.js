import { createRouter, createWebHistory } from 'vue-router'

// Import halaman
import Home from '@/Pages/Home.vue'
import Counter from '@/Pages/Counter.vue'

// Routes
const routes = [
  // Public
  {
    path: '/',
    name: 'home',
    component: Home,
  },

  {
    path: '/counter',
    name: 'counter',
    component: Counter,
  },

  {
    path: '/login',
    name: 'login',
    component: () => import('@/Pages/Auth/Login.vue'),
  },

  // Protected
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('@/Pages/Dashboard.vue'),
    meta: {
      title: 'Dashboard',
      requiresAuth: true,
    },
  },

  {
    path: '/pengajuan',
    name: 'pengajuan',
    component: () => import('@/Pages/Pengajuan/DaftarPengajuan.vue'),
    meta: {
      title: 'Pengajuan Dana',
      requiresAuth: true,
    },
  },

  {
    path: '/persetujuan',
    name: 'persetujuan',
    component: () => import('@/Pages/Persetujuan/ProsesPersetujuan.vue'),
    meta: {
      title: 'Proses Persetujuan',
      requiresAuth: true,
    },
  },
]

// Router
const router = createRouter({
  history: createWebHistory(),
  routes,
})

// Navigation Guard
router.beforeEach((to, from, next) => {
  const isAuth = Boolean(localStorage.getItem('token'))

  if (to.meta.requiresAuth && !isAuth) {
    next('/login')
  } else {
    next()
  }
})

export default router