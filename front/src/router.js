import { createWebHistory, createRouter } from "vue-router";
import tokenGuard from "./services/TokenGuardService";

const routes =  [
    {
        path: "/",
        component: () => import("./components/Home.vue"),
        alias: '/home',
        beforeEnter: tokenGuard 
    },
    {
        path: "/connexion",
        component: () => import("./components/Connexion.vue"),
    },
    {
        path: "/history",
        component: () => import("./components/History.vue"),
        beforeEnter: tokenGuard 
    },
    {
        path: "/settings",
        component: () => import("./components/Settings.vue"),
        beforeEnter: tokenGuard 
    },
    {
        path: "/createOuting",
        component: () => import("./components/CreateOuting.vue"),
        beforeEnter: tokenGuard
    },
    {
        path: "/messaging",
        component: () => import("./components/Messaging.vue"),
        beforeEnter: tokenGuard 
    },
    {
        path: "/terms",
        component: () => import("./components/Terms.vue"),
    },
    {
        path: "/privacy",
        component: () => import("./components/Privacy.vue"),
    },
    {
        path: "/contact",
        component: () => import("./components/Contact.vue"),
        beforeEnter: tokenGuard 
    },
    {
        path: "/myAccount",
        component: () => import("./components/MyAccount.vue"),
        beforeEnter: tokenGuard 

    },
    {
        path: "/users",
        component: () => import("./components/Users.vue"),
    },
    {
        path: "/:pathMatch(.*)*",
        name: "error404",
        component: () => import("/src/components/Error404.vue")
    }
    ];
    
    const router = createRouter({
    history: createWebHistory(),
    routes,
    });
    
    export default router;

    