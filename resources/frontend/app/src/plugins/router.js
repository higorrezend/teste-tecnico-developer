import Vue from 'vue'
import Router from 'vue-router'
import { Auth } from '@/services/Auth'
import Login from '@/pages/Login/Login'
import Main from '@/components/Main/Main'
import Home from '@/pages/Home/Home'
import Users from '@/pages/Users/Users'

Vue.use(Router)

var routes = [
  {
    path: '*',
    redirect: '/main/home'
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false,
      title: 'Login'
    },
    beforeEnter: (to, from, next) => {
      Auth.check() ? next({ name: 'home' }) : next()
    }
  },
  {
    path: '/main',
    name: 'main',
    component: Main,
    redirect: '/home',
    meta: {
      auth: true
    },
    children: [
      {
        path: 'home',
        name: 'home',
        component: Home,
        meta: {
          auth: true,
          title: 'Home'
        }
      },
      {
        path: 'users',
        name: 'users',
        component: Users,
        meta: {
          auth: true,
          title: 'Usuários'
        }
      }
    ]
  }
]

const router = new Router({
  // mode: 'history',
  routes: routes
})

router.beforeEach((to, from, next) => {
  setDocumentTitle(to)
  userIsNotAuthenticated(to) ? next({ name: 'login' }) : next()
})

const setDocumentTitle = route => {
  document.title = `${route.meta.title || 'App'} - Dealer Sites`
}

const userIsNotAuthenticated = to => {
  return to.name !== 'login' && to.meta.auth && !Auth.check()
}

export default router
