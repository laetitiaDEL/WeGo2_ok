import { createWebHistory, createRouter } from "vue-router";
//! la ƒ° createWebHistory
//* très commun dans les app SPA (web-mobile-etc...)
//* Permet de créer un historique de navigation (VUE sait tjrs d'ou vous venez)
//* Exemple  : les boutons précèdent dans les app Mobile
// ! la ƒ° createRouter 
//* permet à VUE d'instancier une nouvelle instance router
const routes =  [
    {
        path: "/",
        component: () => import("./components/Home.vue"),
        alias: '/home'
    },
    {
        path: "/connexion",
        component: () => import("./components/Connexion.vue"),
    },
    {
        path: "/history",
        component: () => import("./components/History.vue"),
    },
    {
        path: "/settings",
        component: () => import("./components/Settings.vue"),
    },
    {
        path: "/createOuting",
        component: () => import("./components/CreateOuting.vue"),
    },
    {
        path: "/messaging",
        component: () => import("./components/Messaging.vue"),
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
    },
    {
        path: "/myAccount",
        component: () => import("./components/MyAccount.vue"),
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

    