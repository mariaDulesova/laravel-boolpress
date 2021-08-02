// 1. Importo le dipendenze
import Vue from 'vue'
import VueRouter from 'vue-router'

// 2. Inizializzo la Vue Router
Vue.use(VueRouter)

// 3. Importo i componenti delle rotte
import Home from './pages/Home';
import Blog from './pages/Blog';
import Contacts from './pages/Contacts';

// 4. Creo le rotte
const router = new VueRouter(
    {
        mode: 'history', //per non avere il # come chiusura dell'URL
        linkExactActiveClass:'active',
        routes:[
            {
                path:'/',
                name: 'home',
                component: Home
            },
            {
                path:'/blog',
                name:'blog',
                component: Blog
            },
            {
                path:'/contacts',
                name:'contacts',
                component: Contacts
            },

        ] 
    }
);

// 5. Esporto le rotte definite
export default router;

